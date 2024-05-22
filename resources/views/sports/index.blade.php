@extends("template.base")

@section("title", "List" )


 
@section('content')

<h1 class="my-5 text-center display-5 text-info-emphasis">Articoli Sport</h1>
<div class="row justify-content-center mx-5">

  @session('create_successer')

  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> Il nuovo Sport è stato creato!</strong> 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  
  @endsession

  @session('delete_successer')

  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> {{session('delete_successer')->title}} è stato elliminato!</strong> 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  
  @endsession



    @forelse ($sports as $sport) 
        <div class="col-12 col-md-3 mb-3 ">
           
        <a href="{{route ('sports.show', ['sport'=>$sport] )}}" class="text-decoration-none">

           <div class="card h-100 card-index">
              <img src= {{$sport["img"]}} class="card-img-top card-img" alt="attivity cover">

          <div class="card-body d-flex flex-column ">
            <div class="mb-auto">
              <h5 class="card-title"> {{$sport["title"]}}</h5>
              <p class="card-text"><small class="text-muted">Pubblicazione: {{$sport["created_at"] }}</small></p>

            </div>
            
            </div>
          </div>

        </a>
        </div>
    
    

    @empty
       <h2>Non ci sono articoli sullo sport aggiunti</h2>
    @endforelse 

    <div class="my-5 ">
      {{ $sports->links() }} 
    </div>
    
   
</div>
    


@endsection

