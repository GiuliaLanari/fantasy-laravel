@extends("template.base")

@section("title", "Dettaglio")

@section("content")

<div class="row justify-content-center">
    <div class="col-12 col-md-9 mx-auto">
        
        <h1 class="mb-5 text-center display-5">{{$sport["title"]}}</h1>

        @session('update_successer')
    
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong> {{session('update_successer')->title}} è stato modificato!</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    
        @endsession

        <div class="row my-5">
            <div class="col-12 col-md-7  index-img">
                
                <img src="{{$sport["img"]}}"  alt="sport">
            </div>
            <div class="col-12 col-md-4">
                <p> {{$sport["description"]}}</p>
                <p><small class="text-muted">Pubblicazione: {{$sport["created_at"] }}</small></p>

                @auth
                @if (Auth::user()->id === $sport->user_id)
         
                <div class="d-flex justify-content-end">
         
                 <a href="{{route ('sports.edit', ['sport'=>$sport] )}}" class="btn btn-warning mb-3 me-2 "><i class="bi bi-pencil-square"></i></a>
                
                 <form action="{{route ('sports.destroy', ['sport'=>$sport])}}" method="POST">
                  @method('DELETE')
                  @csrf
          
                  <button class="btn btn-danger"><i class="bi bi-trash text-black"></i></button>
                
                </form>
         
         
                </div>
         
               
               @endif
               @endauth

            </div>




        </div>














    </div>
    


</div>

@endsection