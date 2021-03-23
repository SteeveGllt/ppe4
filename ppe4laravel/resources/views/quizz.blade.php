@extends('welcome')
@section('content')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"/></script> 
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
        
      <!-- Modal Header -->
      <div id="score">
        
      </div>
      <div class="modal-header">
          <div id="titremodal">
          </div>
<!--        <button type="button" class="close" data-dismiss="modal">fhrd&times;</button>-->
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          <form id="form"> 
            <div class="form-group" >
              <label for="usr" id="lbl">Votre réponse :</label>
              <input type="text" class="form-control" id="reponse">
              <div id="rep">
              </div>
                <div id="eldiv">
                    
                </div>
            </div>  
          </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
          <button type="button" class="btn btn-success">Suivant</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<table>
    <thead>
    <th>Titre</th>
    <th>Jouer</th>
    </thead> 
    <tbody id="table">
        
    </tbody>
</table>
<script language='javascript'>
    $(document).ready(function()
    {
        var nbQuestion;
        var questions;
        var indice=0;
        var juste;
        var isEcran;
        var score=0;
        $.ajax({
            url:"http://localhost/public/api/allquestion",
            success:function(data){
               $.each(data, function(index, value) {
               $("#table").append('<tr> <td>'+value.titre+'</td><td><button type="button" id="'+value.id+'" class="btn btn-primary play" data-toggle="modal" data-target="#myModal" >Jouer</button></td></tr> ');
               });         
            }
        });
        $(document).on('click','.play',function(){
                   $.ajax({
                       
                       url:"http://localhost/public/api/question/"+$(this).attr('id'),
                       success:function(data){
                          questions=data;
                          nbQuestion=data.length;
                         $("#titremodal").html(data[0].libelle);
                         $("#score").html('<p>Votre Score : '+score+' </p>');
                         isEcran=true;
                         score=0;
                    
                   }
                   });
               });
               
                $(document).on('click','.btn-success',function(){
                    $("#rep").empty();
                if(isEcran==true)
                {
                    if (indice==nbQuestion-1)
                   {
                       $(".btn-success").hide();
                   }
                    $("#reponse").hide();
                    $("#lbl").hide();
                    isEcran=false;
                    $("#titremodal").empty();
                    $("#eldiv").empty();
                   $.ajax({
                       type:"POST",
                       url:"http://localhost/public/api/reponse/"+questions[indice].id,
                       data:{reponse: $("#reponse").val()},
                       success:function(data){
                          juste=data.success;
                          if(juste=="true")
                            {
                                $("#rep").html('<p class="text-success">Bonne réponse</p>');
                                score++;
                                $("#score").html('<p>Votre Score : '+score+' </p>');
                                
                            }
                            else
                            {
                                $("#rep").html('<p class="text-danger">Mauvaise réponse</p>');
                            }
                       }
                          
                   });
   
                   
                }
                else
                {
                    $("#reponse").show();
                    isEcran=true;
                    $("#lbl").show();
                    indice++;
                   if (indice==nbQuestion)
                   {
                       $(".btn-success").hide();
                   }
                   else
                   {
                       $("#titremodal").html(questions[indice].libelle);
                       $("#eldiv").html('');
                   }
                    
                }
                    
                   
               });
               

                $(document).on('click','.btn-danger',function(){
                    indice=0;
                    $(".btn-success").show();
                    $("#rep").empty();
                    $("#lbl").show();
                    $("#reponse").show();
                    $("#reponse").val('');
                    score=0;
                    $("#score").html('<p>Votre Score : '+score+' </p>');
               });
    });
</script>
@stop
