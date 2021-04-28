@extends('welcome')
@section('content')

<div class="leading-loose flex justify-center">
{!! Form::open(['url' => route('poste.store'),'method' => 'post', 'class' => 'w-75  p-10 bg-white rounded shadow-xl ', 'enctype' => 'multipart/form-data']) !!}


    <p class="text-gray-800 font-bold">Publication d'un poste</p>
    <div class="">
      <label class="block text-sm text-gray-00" for="cus_name">Nom de l'entreprise</label>
      <input class="w-full px-3 py-1 text-gray-700 bg-gray-200 rounded" id="cus_name" name="nomEntreprise" type="text" placeholder="Nom" value="{{ old('nomEntreprise') }}">
      @error('nom')
        <div class="alert alert-danger"> {{ $message }} </div>
      @enderror
    </div>
    <div class="mt-2">
      <label class="block text-sm block text-gray-600" for="cus_email">Ville</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="ville" type="text" required="" placeholder="City" aria-label="Email" value="{{ old('ville') }}" >
    </div>
    <div class="mt-2">
      <label class="block text-sm text-gray-600" for="cus_email">Intitulé du poste</label>
      <input class="w-full px-3 py-1 text-gray-700 bg-gray-200 rounded" id="cus_email" name="intitule" type="text" required="" placeholder="Intitulé" value="{{ old('intitule') }}">
    </div>
    <div class="mt-2">
      <label class=" block text-sm text-gray-600" for="editor">Description</label>
      <textarea id="editor" class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded"  name="description" type="text" value="{{ old('description') }}"></textarea>
    </div>
    <div>
    <p class="text-gray-800 font-bold">Catégorie</p>
    </div>
    <fieldset>
    @foreach($categorie as $ligne)
        <div class="mt-2 space-y-4">
            <div class="flex items-center">
                <input id="" name="categorie" type="radio" value="{{$ligne->id}}" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" >
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
                <input id="" name="type" type="radio" value="{{$ligne->id}}"  class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                <label for="" class="ml-3 block text-sm font-medium text-gray-700">{{$ligne->libelle}}</label>
            </div>
        </div>
    @endforeach
    </fieldset>
    
    <div class="mt-2">
        <label class=" block text-sm text-gray-600" for="cus_email">Upload</label>
        <input class="px-2 py-2 text-gray-700 rounded" type="file" name="profile_image" id="exampleInputFile">
    </div>
    {{ csrf_field() }}

    <div class="mt-4">
      <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Publier</button>
    </div>

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
