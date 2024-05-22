<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;

class SportController extends Controller
{
    public function index(Request $request)
    {
      
        $searchTerm=$request->input('searchTerm');

        if($searchTerm){
            $sports = Sport::where('title', 'LIKE', '%' . $searchTerm . '%')->paginate(8);
        } else {
            $sports = Sport::paginate(8);
        }

        return view('sports.index',
        ["sports"=>$sports]
    );
    }

    public function create()
    {
        return view('sports.create');
    }

  
    public function store(Request $request)
    {
        $date= $request->all();

        $newSport= new Sport();
        $newSport->title=$date["title"];
        $newSport->description=$date["description"];
        $newSport->img=$date["img"];
        $newSport->user_id=$request->user()->id;
        $newSport->save();

        
        return  redirect()->route("sports.index")->with('create_successer', $newSport);
       
    }

    
    public function show(Sport $sport)
    {
        
        return view('sports.show', ['sport'=>$sport]);
    }

    
    public function edit(Request $request, Sport $sport)
    {
        if($request->user()->id !== $sport->user_id) abort(401);
        return view('sports.edit', ['sport'=>$sport]);
    }

   
    public function update(Request $request, Sport $sport)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'img' => 'nullable|string|max:255',
        ]);
    
        if($request->user()->id !== $sport->user_id) abort(401);
    
        
        $sport->title = $validatedData['title'];
        $sport->price = $validatedData['description'];
        $sport->img = $validatedData['img'];
        $sport->update();
    
            
            return  redirect()->route("sports.show", ['sport'=> $sport])->with('update_successer', $sport);
    }

    
    public function destroy(Request $request, Sport $sport)
    {
        
        if($request->user()->id !== $sport->user_id) abort(401);
        $sport->delete();

        return  redirect()->route("sports.index")->with('delete_successer', $sport);
      
    }
}
