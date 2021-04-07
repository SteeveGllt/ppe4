@extends('welcome')
@section('content')
@foreach($tab as $ligne)
<div class="modal fade" id="idm{{$ligne->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment refuser l'offre ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <form action="{{route('poste.destroy', ['poste'=>$ligne->id])}}" method="post">
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
            <span class="font-light text-gray-600">{{ $ligne->created_at}}</span>

         

            <div class="flex justify-center">
            <a href="{{route('poste.editValid', $ligne)}}">       
            <button class="bg-transparent text-green-600 font-semibold hover:text-green-700 py-2 px-2 border rounded ml-auto mr-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                </svg>
            </button>   
            </a>

 
			@csrf
			@method('delete')
            <button class="bg-transparent text-red-600 font-semibold hover:text-red-700 py-2 px-2 border rounded" type="button" data-toggle="modal" data-target="#idm{{$ligne->id}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </button>
   
            </div>
        </div>
        <div class="mt-2">
            <a class="text-2xl text-gray-700 font-bold hover:text-gray-600" href="#">{{$ligne->nomEntreprise}} / {{$ligne->categorie->libelle}} / {{$ligne->type->libelle}}</a>
            <p class="mt-2 text-gray-600">{!!$ligne->description!!}</p>
        </div>
        @if($ligne->pdf == true)
        
        <a href="{{asset('storage/profile_images/'.$ligne->pdf)}}" download>
        <button class="bg-grey-light hover:bg-grey text-grey-darkest font-bold py-2 px-1 rounded inline-flex items-center">
            
            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
            <span>Télécharger le PDF</span>
            
        </button>
        </a>
        @endif

        <div class="flex justify-between items-center mt-4"></div>
    </div>
</div>
@endforeach
@stop