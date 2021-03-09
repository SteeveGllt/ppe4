@extends ('welcome')
@section('content')
<form>
  <input type="button" value="Retour" onclick="history.go(-1)">
</form>

<form action="{{route('type.store')}}" method="post" class="form-example">
     @csrf

  <fieldset>
    <legend>Créer un type </legend>
    <div class="form-group">
      <label for="exampleInputEmail1">Entrez le libellé:</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="libelle"  aria-describedby="emailHelp" placeholder="Entrez le libellé" value="{{ old('libelle') }}">
    </div>
    
   
  </div>
    <button type="submit" class="btn btn-primary">Créer</button>
  </fieldset>
</form>
@stop




