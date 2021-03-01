
@extends ('welcome')
@section('content')
<form>
  <input type="button" value="Retour" onclick="history.go(-1)">
</form>

<form action="{{route('categorie.store')}}" method="post" class="form-example">
     @csrf

  <fieldset>
    <legend>Créer une catégorie </legend>
    <div class="form-group">
      <label for="exampleInputEmail1">Entrez le libelle:</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="libelle"  aria-describedby="emailHelp" placeholder="Entrez le libelle" value="{{ old('libelle') }}">
    </div>
    
   
  </div>
    <button type="submit" class="btn btn-primary">Créer</button>
  </fieldset>
</form>
@stop



