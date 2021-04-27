@extends ('welcome')
@section('content')
<button type="button" class="btn btn-primary" onclick="history.go(-1)">
     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
     <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
    </svg>
  </button>

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




