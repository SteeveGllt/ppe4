
@extends ('welcome')
@section ('content')
<button type="button" class="btn btn-primary" onclick="history.go(-1)">
     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
     <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
    </svg>
</button>
 
<table class="table table-hover">
 <thead>
    <th>ID</th>
    <th>nom</th>
    <th>prenom </th>
    <th>email</th>
    <th>Mot De Passe</th>
    <th>Ville</th>
    <th>Code Postal</th>
    <th>isAdmin</th>
    <th>tel</th>
    <th>Notif</th>
    <th>Cv Consultable</th>
    <th>chemin du Cv</th>
    <th>premiere Connection</th>
 </thead>
 <tbody>
   <tr class="table-info">
    <tr>
    <td>{{$u ->id}}</td>
    <td>{{$u ->nom}}</td>
    <td> {{$u->prenom}} </td>
    <td>{{$u->email}} </td>
    <td>{{$u ->password}}</td>
    <td> {{$u->ville}} </td>
    <td>{{$u->cp}} </td>
    <td>{{$u ->isAdmin}}</td>
    <td> {{$u->tel}} </td>
    <td>{{$u->notif}} </td>
    <td>{{$u ->cvConsultable}}</td>
    <td> {{$u->cheminCv}} </td>
    <td>{{$u->premiereCo}} </td>
    </tr>
 </tbody>

</table>
@stop




