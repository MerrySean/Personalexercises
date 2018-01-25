$(document).ready(function(){
  $(".pop").click(function(){
    var modalTitle = $(this).attr('mTitle');
    var modalOldValue = $(this).attr('mOldValue');
    $("#UpdateModal .modal-title").html(modalTitle);
    $("#UpdateModal .modal-body label#tb").html(modalTitle);
    $("#UpdateModal .modal-body h6#OldValue").html(modalOldValue);
    if(modalTitle === "gender"){
      $("#UpdateModal .modal-body input#textbox").toggle();
      $("#boxtext").append('<select id="textbox" type="text"></select>');
      $('#UpdateModal .modal-body select#textbox').append($('<option>', {
            value: 'male',
            text: 'Male'
        }));
      $('#UpdateModal .modal-body select#textbox').append($('<option>', {
            value: 'female',
            text: 'Female'
        }));
    }else{
      $("#UpdateModal .modal-body input#textbox").attr("placeholder","Enter new " + modalTitle);
    }
  });

  $("#UpdateModal").on("hidden.bs.modal", function () {
    $("#boxtext").html("<input type='text' id='textbox'>");
  });
})

  $("#modalUpdateBtn").click(function(){
    var newValue = $("#UpdateModal .modal-body #textbox").val();
    var whatToUpdate = $("#UpdateModal .modal-title").html();
    var oldValue = $("#UpdateModal .modal-body h6#OldValue").html();
    var password = $("#UpdateModal .modal-body input#password").val();
    if(newValue !== ""){
      $.ajax({
        url : "http://127.0.0.1/Personalexercises/api/User/Update",
        type: 'POST',
        data: {
          'whatToUpdate' : whatToUpdate,
          'ToUpdate' : newValue,
          'OldValue' : oldValue,
          'Password' : password
        },
        dataType:'json',
        success : function(result){
          if(result.Result){
            $('#UpdateModal').modal('hide');
            $('#resultAlert').append(`<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Update Success!</strong> Close this alert to update info below
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>`)
            $('.alert').alert();
            $('.alert').on('closed.bs.alert', function () {
              location.reload();
            })
          }
        },
        error : function(request, error){
          alert("request: " + JSON.stringify(request) + error);
        }
      })
    }
  })
