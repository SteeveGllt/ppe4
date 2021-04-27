@extends('welcome')
@section('content')
@foreach($test as $ligne)
@php 
$aPostuler = 0; 

@endphp

@php

$lesPostulations = Auth::user()->postesPostuler;
@endphp

<div class="flex justify-center">
    <div class="lg:w-9/12 px-10 my-3 pt-4 bg-white rounded-lg shadow-md  2xl:max-w-7xl">
        <div class="flex justify-between items-center">
            <span class="font-light text-gray-600">{{ $ligne->created_at}}</span>

            <div class="flex justify-center">

            </div>
        </div>
        <div class="mt-2">
            <a class="text-2xl text-gray-700 font-bold hover:text-gray-600" href="#">{{$ligne->nomEntreprise}} / {{$ligne->categorie->libelle}} / {{$ligne->type->libelle}}</a>
            <p class="mt-2 text-gray-600">{!!$ligne->description!!}</p>
        </div>
        @if($ligne->pdf == true)
        <div class="flex mb-2">
            <a href="{{asset('storage/profile_images/'.$ligne->pdf)}}" download>
                <button class="bg-grey-light hover:bg-grey text-grey-darkest font-bold py-2 px-1 rounded inline-flex items-center">
                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                    <span>Télécharger le PDF</span>
                </button>
            </a>
            @endif
            @foreach($lesPostulations as $postulation)
                @if($ligne->id == $postulation->id)
                    @php
                        $aPostuler = 1
                    @endphp
                @endif
            @endforeach
            <div class="ml-auto mr-1">
                @if($aPostuler == 1)
                <div class="flex justify-end mb-2">
                    <button type="submit" class="mb-3"> 
                       <a href="{{route('poste.unPostuler', ['id'=>$ligne->id])}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                            </svg>
                       </a>
                    </button>
                </div>
               
                @else
                <a href="{{route('poste.postuler', ['id'=>$ligne->id])}}">
                    <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                            </svg>
                    </button> 
                </a>
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