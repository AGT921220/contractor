$(document).ready(function() {
  changeProyect()
});


$('#proyect_id_select').on('change', function() {
  changeProyect();
});  

function changeProyect(){
  var token = $('[name="_token"]').val();
  var proyect = $('#proyect_id_select').val();
  var subcontractor = $('#subcontractor_id').val();
  $('#contest_id_select').html('');

  $.ajax('/api/proyectos/'+proyect+'/contests-available/'+subcontractor, {
    data: { "_token": token },
    type: 'post',
    async: false,
    dataType: 'json', // type of response data
    success: function(response, status, xhr) { // success callback function
      response.success.map(function(contest) {
        $('#contest_id_select').append('<option value="'+contest.id+'">'+contest.name+'</option>');
      });
    },
    error: function(jqXhr, textStatus, errorMessage) { // error callback

    }
});
}