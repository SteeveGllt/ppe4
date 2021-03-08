@extends('welcome')
@section('content')

<div class="leading-loose flex justify-center">
{!! Form::open(['url' => route('poste.store'),'method' => 'post', 'class' => 'w-75  p-10 bg-white rounded shadow-xl ']) !!}

  <form class="w-75  p-10 bg-white rounded shadow-xl">
    <p class="text-gray-800 font-bold">Publication d'un poste</p>
    <div class="">
      <label class="block text-sm text-gray-00" for="cus_name">Nom de l'entreprise</label>
      <input class="w-full px-3 py-1 text-gray-700 bg-gray-200 rounded" id="cus_name" name="nomEntreprise" type="text" placeholder="Nom">
    </div>
    <div class="mt-2">
      <label class="block text-sm block text-gray-600" for="cus_email">City</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="ville" type="text" required="" placeholder="City" aria-label="Email">
    </div>
    <div class="mt-2">
      <label class="block text-sm text-gray-600" for="cus_email">Intitulé du poste</label>
      <input class="w-full px-3 py-1 text-gray-700 bg-gray-200 rounded" id="cus_email" name="intitule" type="text" required="" placeholder="Intitulé">
    </div>
    <div class="mt-2">
      <label class=" block text-sm text-gray-600" for="cus_email">Description</label>
      <textarea class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="description" type="text" required="" placeholder="Description"></textarea>
    </div>
    <div>
    <p class="text-gray-800 font-bold">Catégorie</p>
    </div>
    <fieldset>
    @foreach($categorie as $ligne)
        <div class="mt-2 space-y-4">
            <div class="flex items-center">
                <input id="" name="categorie" type="radio" value="{{$ligne->id}}" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
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
    <div class="flex h-screen items-center justify-center bg-grey-lighter">
      <label class="w-15 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-gray">
        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
        </svg>
        <span class="mt-2 text-base leading-normal">Select a file</span>
        <input type='file' class="hidden" />
      </label>
    </div>
    <div class="mt-4">
      <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Publier</button>
    </div>
  </form>
</div>
{!! Form::close() !!}
@stop
