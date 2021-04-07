@extends('welcome')
@section('content')

<div class="leading-loose flex justify-center">
{!! Form::open(['url' => route('poste.update', $p), 'class' => 'w-75  p-10 bg-white rounded shadow-xl ', 'enctype' => 'multipart/form-data']) !!}
@method('put')

  <form class="w-75  p-10 bg-white rounded shadow-xl">
    <p class="text-gray-800 font-bold">Publication d'un poste</p>
    <div class="">
      <label class="block text-sm text-gray-00" for="cus_name">Nom de l'entreprise</label>
      <input class="w-full px-3 py-1 text-gray-700 bg-gray-200 rounded" id="cus_name" name="nomEntreprise" type="text" placeholder="Nom" value="{{$p->nomEntreprise}}">
    </div>
    <div class="mt-2">
      <label class="block text-sm block text-gray-600" for="cus_email">City</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="ville" type="text" required="" placeholder="City" aria-label="Email" value="{{$p->ville}}">
    </div>
    <div class="mt-2">
      <label class="block text-sm text-gray-600" for="cus_email">Intitulé du poste</label>
      <input class="w-full px-3 py-1 text-gray-700 bg-gray-200 rounded" id="cus_email" name="intitule" type="text" required="" placeholder="Intitulé" value="{{$p->intitule}}">
    </div>
    <div class="mt-2">
      <label class=" block text-sm text-gray-600" for="editor">Description</label>
      <textarea class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="editor" name="description" type="text" required="" placeholder="Description" value="">{!!$p->description!!}</textarea>
    </div>
    <div>
    <p class="text-gray-800 font-bold">Catégorie</p>
    </div>
    <fieldset>
    @foreach($categorie as $ligne)
        <div class="mt-2 space-y-4">
            <div class="flex items-center">
                <input id="" name="categorie" type="radio" value="{{$ligne->id}}" {{$ligne->id == $p->categorie_id ? 'checked' : ''}} class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                <label for="" class="ml-3 block text-sm font-medium text-gray-700">{{$ligne->libelle}}</label>
            </div>
        </div>   
    @endforeach
    </fieldset>
    <div>
    <p class="text-gray-800 font-bold mt-2">Type</p>
    </div>
    <fieldset>
    @foreach($tab as $ligne)
        <div class="mt-2 space-y-4">
            <div class="flex items-center">
                <input id="" name="type" type="radio" value="{{$ligne->id}}" {{$ligne->id == $p->type_id ? 'checked' : ''}}  class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                <label for="" class="ml-3 block text-sm font-medium text-gray-700">{{$ligne->libelle}}</label>
            </div>
        </div>
    @endforeach
    </fieldset>
       
    <div class="mt-2">
        <label class=" block text-sm text-gray-600" for="cus_email">Upload</label>
        <input class="px-2 py-2 text-gray-700 rounded" type="file" name="profile_image" id="exampleInputFile" value="{{$ligne->pdf}}">
        <p class="block text-sm text-gray-00">Fichier enregistré : {{$p->pdf}}</p>
    </div>
    {{ csrf_field() }}

    <div class="mt-4">
      <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Modifier</button>
    </div>
  </form>
</div>
{!! Form::close() !!}
@stop
@section('script')
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@stop