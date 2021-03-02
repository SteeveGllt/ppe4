
@extends ('welcome')
@section('content')
<form>
  <input type="button" value="Retour" onclick="history.go(-1)">
</form>

<form action="{{route('categorie.update',[$c->id])}}" method="post" class="form-example">
     @csrf
     @method('put')
  <fieldset>
    <legend>Modifier la catégorie </legend>
    <div class="form-group">
      <label for="exampleInputEmail1">Modifier le libelle:</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="libelle"  aria-describedby="emailHelp" placeholder="Entrez le nouveau libelle" value="{{ old('libelle') }}">
    </div>
    
   
  </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
  </fieldset>
</form>
@stop




