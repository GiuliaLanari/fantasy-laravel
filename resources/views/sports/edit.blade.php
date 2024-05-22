
@extends("template.base")

@section("title", "Edit activity" )


 
@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="mt-5 mb-4 display-5 text-info-emphasis text-center ">Modifica Sport</h2>

        <form method="POST" action="{{route ('sports.update')}}">
            @method("PUT")
            @csrf
            <div class="form-group">
                <label for="title">Nome sport:</label>
                <input type="text" class="form-control" id="title" placeholder="Inserisci il titolo dell'attività" name="title" value="{{ $sport->title }}">
            </div>
            <div class="form-group">
                <label for="description">Descrizione dello sport:</label>
                <input type="text-area" class="form-control" id="description" placeholder="Description" name="description" value="{{ $sport->description }}"></input>
            </div>
           
            <div class="form-group">
                <label for="img">Image</label>
                <input type="text" class="form-control" id="img" placeholder="Indirizzo dell'immagine" name="img" value="{{ $sport->img }}"></input>
            </div>
            <button type="submit" class="btn btn-secondary mt-3">Aggiungi Sport</button>
        </form>

        
        


    </div>
</div>
    
@endsection