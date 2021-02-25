@extends('welcome')
@section('content')
@foreach($tab as $ligne)
<div class="grid justify-items-stretch">
    <div class="max-w-5xl px-10 my-4 py-6 bg-white rounded-lg shadow-md justify-self-center">
        <div class="flex justify-between items-center ">
            <span class="font-light text-gray-600">mar 10, 2019</span>
        </div>
        <div class="mt-2">
            <a class="text-2xl text-gray-700 font-bold hover:text-gray-600" href="#">{{$ligne->nomEntreprise}}</a>
            <p class="mt-2 text-gray-600">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!</p>
        </div>
        <div class="flex justify-between items-center mt-4"></div>
        </div>
    </div>

    <div class="absolute bottom-1 right-0 mb-4 mr-4">
        <a href="#">
            <div class="shadow-xl rounded-full place-self-center h-12 w-12 flex items-center justify-center bg-purple-400 text-2xl hover:bg-purple-500 duration-200 text-white">+</div>
        </a>
    </div>
<div>


@endforeach
@stop