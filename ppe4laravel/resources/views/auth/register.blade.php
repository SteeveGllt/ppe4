@extends('welcome')

@section('content')
<button type="button" class="btn btn-primary" onclick="history.go(-1)">
     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
     <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
    </svg>
</button>
<div class="leading-loose flex justify-center">
     <form name="inscription" class="w-75  p-10 bg-white rounded shadow-xl" method="POST" action="{{ route('user.store') }}">
        <p class="text-gray-800 font-bold">Inscription</p>
         @csrf
                            <div class="">
                                <label class="block text-sm text-gray-00" for="cus_name">Nom</label>
                                <input class="w-full px-3 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Nom">
                                 @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        <div class="">
                                <label class="block text-sm text-gray-00" for="cus_name">Prénom</label>
                                <input class="w-full px-3 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="prenom" type="text" required="" placeholder="Prénom">
                                 @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        

                        <div class="">
                           <label class="block text-sm text-gray-00" for="cus_name">Code Postal</label>
                             
                        <div class="">
                          <input class="w-full px-3 py-1 text-gray-700 bg-gray-200 rounded" id="code" name="cp" type="text" required="" placeholder="Code Postal">
                          <br>
                          <label class="block text-sm text-gray-00" for="cus_name">Ville</label>
                          <input readonly="readonly" id="ville" name="ville" class="w-full px-3 py-1 text-gray-700 bg-gray-200 rounded" placeholder="Ville">
                          <ul class="list-group">
                          <li class="list-group-item"data-vicopo="#ville, #code" data-vicopo-click='{"#code": "code", "#ville": "ville"}'>
                            <strong data-vicopo-code-postal></strong>
                            <span data-vicopo-ville></span><p></p>
                          </li>
                        </ul>
                        </div>
                        </div>
                        <div class="">
                                <label class="block text-sm text-gray-00" for="cus_name">Adresse Mél</label>
                                <input class="w-full px-3 py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="email" required="" placeholder="Adresse Mél">
                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        
                            <div class="">
                                <label for="password-confirm" class="block text-sm text-gray-00">{{ __('Numéro de téléphone') }}</label>
                                <input id="tel" type="tel" class="w-full px-3 py-1 text-gray-700 bg-gray-200 rounded" name="tel" required autocomplete="new-password" placeHolder="Numéro de téléphone">
                        </div>
                        
                            <br>
                           <label class="flex justify-start items-start">
                                <div class="bg-white border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                                <input type="checkbox" name="notifications" class="opacity-0 absolute">
                                <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                              </div>
                              <div class="select-none">Notifications</div>
                            </label>
                            <style>
                              input:checked + svg {
                                    display: block;
                              }
                            </style> 
                            <div class="mt-4">
             <center><button type="submit" class="btn btn-primary">
                                    {{ __('zu registrieren ') }}
                 </button></center>
                            </div>
                            </div>                     
         
   


                            
                      
                    </form>
</div>
<script>
    var validator = new FormValidator('inscription', [{
    name:'name',
    display:'required',
    rules:'required'
    },
    });
</script>
@endsection
