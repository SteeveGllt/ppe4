
@extends ('welcome')
@section('content')
<button type="button" class="btn btn-primary" onclick="history.go(-1)">
     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
     <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
    </svg>
  </button>

<form action="{{route('user.update',[$u->id])}}" method="post" class="form-example">
     @csrf
     @method('put')
  <fieldset>
    <legend>Modifications des informations</legend>
    <div class="form-group">
      <label for="exampleInputEmail1">Modifier le Nom:</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="nom"  aria-describedby="emailHelp" placeholder="Entrez le nouveau nom" value="{{$u->nom}}">
    </div>
     <div class="form-group">
      <label for="exampleInputEmail1">Modifier le Prenom:</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="prenom"  aria-describedby="emailHelp" placeholder="Entrez le nouveau prenom" value="{{$u->prenom}}">
    </div>
     <div class="form-group">
      <label for="exampleInputEmail1">Modifier le mail:</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="mail"  aria-describedby="emailHelp" placeholder="Entrez le nouveau mail" value="{{$u->email}}">
    </div>
     <div class="form-group">
      <label for="exampleInputEmail1">Modifier la ville:</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="ville"  aria-describedby="emailHelp" placeholder="Entrez la nouvelle ville" value="{{$u->ville}}">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Modifier le code postal:</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="cp"  aria-describedby="emailHelp" placeholder="Entrez le nouveau code postal" value="{{$u->cp}}">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Modifier le numéro de téléphone:</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="tel"  aria-describedby="emailHelp" placeholder="Entrez le nouveau numéro de téléphone" value="{{$u->tel}}">
    </div>
    
   
  </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
  </fieldset>
</form>
@stop

