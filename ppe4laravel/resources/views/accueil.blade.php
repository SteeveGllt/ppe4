@extends('welcome')
@section('content')
@foreach($poste as $element)
@php 
$aPostuler = 0; 

$lesPostulations = Auth::user()->postesPostuler;
@endphp

<div class="modal fade" id="idm{{$element->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment supprimer l'offre ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <form action="{{route('poste.destroy', ['poste'=>$element->id])}}" method="post">
			@csrf
			@method('delete')
      <button type="submit" class="btn btn-danger">Supprimer</button>
			</form>
       
      </div>
    </div>
  </div>
</div>

<div class="flex justify-center">
    <div class="lg:w-9/12 px-10 my-3 pt-4 bg-white rounded-lg shadow-md  2xl:max-w-7xl">
        <div class="flex justify-between items-center">
            <span class="font-light text-gray-600">{{ Carbon\Carbon::parse($element->created_at)->format('d/m/Y') }}</span>

            <div class="flex justify-center">
            <a href="{{route('poste.edit', $element)}}">       
            <button class="bg-transparent text-green-600 font-semibold hover:text-green-700 py-2 px-2 border rounded ml-auto mr-1">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                </svg> 
            </button>   
            </a>
			@csrf
			@method('delete')
            <button class="bg-transparent text-red-600 font-semibold hover:text-red-700 py-2 px-2 border rounded" type="button" data-toggle="modal" data-target="#idm{{$element->id}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </button>

            </div>
        </div>
        <div class="mt-2">
            <a class="text-2xl text-gray-700 font-bold hover:text-gray-600" href="#">{{$element->nomEntreprise}} / {{$element->categorie->libelle}} / {{$element->type->libelle}}</a>
            <p class="mt-2 text-gray-600">{!!$element->description!!}</p>
        </div>
        @if($element->pdf == true)
        <div class="flex mb-2">
            <a href="{{asset('storage/profile_images/'.$element->pdf)}}" download>
                <button class="bg-grey-light hover:bg-grey text-grey-darkest font-bold py-2 px-1 rounded inline-flex items-center">
                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                    <span>Télécharger le PDF</span>
                </button>
            </a>
            @endif
            @foreach($lesPostulations as $postulation)
                @if($element->id == $postulation->id)
                    @php
                        $aPostuler = 1
                    @endphp
                @endif
            @endforeach
            <div class="ml-auto mr-1">
                @if($aPostuler == 1)
                <div class="flex justify-end mb-2">
                    <button type="submit" class="mb-3"> 
                    <a href="{{route('poste.unPostuler', ['id'=>$element->id])}}" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                            </svg>
                    </a>
                    </button>
                </div>
                @else
                <div class="flex justify-end mb-2">
                
                    <button type="submit" class="mb-3">
                    <a href="{{route('poste.postuler', ['id'=>$element->id])}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                            </svg>
                            </a>
                    </button> 
               </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endforeach
<div class="fixed bottom-1 right-0 mb-4 mr-4">
        <a href="{{route('poste.create')}}">
            <div class="shadow-xl rounded-full place-self-center h-12 w-12 flex items-center justify-center bg-purple-400 text-2xl hover:bg-purple-500 duration-200 text-white test">+</div>
        </a>
</div>

@stop