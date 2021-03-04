@extends('welcome')
@section('content')
@foreach($tab as $ligne)
<div class="flex justify-center">
    <div class="lg:w-9/12 px-10 my-3 pt-4 bg-white rounded-lg shadow-md  2xl:max-w-7xl">

        <div class="flex justify-between items-center">
            <span class="font-light text-gray-600">mar 10, 2019</span>

            <div class="flex justify-center">
            <a href="{{route('poste.edit', $ligne)}}">       
            <button class="bg-transparent text-green-600 font-semibold hover:text-green-700 py-2 px-2 border rounded ml-auto mr-1">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                </svg> 
            </button>   
            </a>

            <form action="{{route('poste.destroy', ['poste'=>$ligne->id])}}" method="post">
			@csrf
			@method('delete')
            <button class="bg-transparent text-red-600 font-semibold hover:text-red-700 py-2 px-2 border rounded">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </button>
            </form>
            </div>
        </div>
        <div class="mt-2">
            <a class="text-2xl text-gray-700 font-bold hover:text-gray-600" href="#">{{$ligne->nomEntreprise}} / {{$ligne->categorie->libelle}} / {{$ligne->type->libelle}}</a>
            <p class="mt-2 text-gray-600">{{$ligne->description}}</p>
        </div>
        <div class="flex justify-between items-center mt-4"></div>
    </div>
</div>
@endforeach
<div class="fixed bottom-1 right-0 mb-4 mr-4">
        <a href="{{route('poste.create')}}">
            <div class="shadow-xl rounded-full place-self-center h-12 w-12 flex items-center justify-center bg-purple-400 text-2xl hover:bg-purple-500 duration-200 text-white">+</div>
        </a>
</div>

@stop