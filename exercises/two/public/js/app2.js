var fname,lname,Address,email,gender,uname,pass,cpass,btnSubmit, ajaxRequestOutput;
var spans;

$(document).ready(function(){

    // initialize variables
    fname     = $("#fname");
    lname     = $("#lname");
    Address   = $("#Address");
    email     = $("#email");
    gender    = $("[name='gender']");
    uname     = $("#uname");
    pass      = $("#pass");
    cpass     = $("#cpass");
    btnSubmit = $("#btnSubmit");


    spans = {
        Firstname   : [$('#fnameIcon'), false],
        Lastname    : [$('#lnameIcon'), false],
        Address     : [$('#addressIcon'), false],
        email       : [$('#emailIcon'), false],
        Username    : [$('#unameIcon'), false],
        Password    : [$('#passIcon'), false],
        cpass       : [$('#cpassIcon'), false]
    };

    // Popover Error Messages
    $('[data-toggle="popover"]').popover({trigger: "hover"});

    // Modal for thoughts
    $('#exampleModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    });

    // submit button click
    btnSubmit.on('click', function(){
        Submitform();
    })


});

// clear the form
function clearForm(){
    fname.val('');
    lname.val('');
    Address.val('');
    email.val('');
    gender.prop('checked', false);
    uname.val('');
    pass.val('');
    cpass.val('');
}

// submit form to server
function Submitform(){
    var Data = {
        'fname'    : fname.val(),
        'lname'    : lname.val(),
        'Address'  : Address.val(),
        'email'    : email.val(),
        'gender'   : $("input[name='gender']:checked").val(),
        'uname'    : uname.val(),
        'pass'     : pass.val(),
        'cpass'    : cpass.val(),
        'btnSubmit': "FormSubmit",
    };

    $.ajax({
        url:"./controller/api/ajaxRequest.php",
        type:"POST",
        data: Data,
        success:function(payload){
            console.log(payload);
            ajaxRequestOutput = JSON.parse(payload);
            displayResult(ajaxRequestOutput);
        },
        error:function(e){
            alert(e);
        }
    });
}

function displayResult(payload){
    var haserror = false;
    if(payload.hasOwnProperty("validation_errors")){
        for(var span in spans){
            for(var load in payload.validation_errors){
                if(span === load){
                    if(payload.validation_errors[load].length !== 0) {
                        haserror = true;
                        if(!spans[span][1]){
                            spans[span][0].addClass( "bg-danger text-white" );
                            var list = createContent(payload.validation_errors[load]);
                            spans[span][0].popover({
                                'placement': 'left',
                                'trigger': 'hover',
                                'container': 'body',
                                'title': 'Error',
                                'html': true,
                                'content': list
                            });
                            spans[span][1] = true;
                        }else{
                            spans[span][0].popover('dispose');
                            spans[span][0].addClass( "bg-danger text-white" );
                            var list = createContent(payload.validation_errors[load]);
                            spans[span][0].popover({
                                'placement': 'left',
                                'trigger': 'hover',
                                'container': 'body',
                                'title': 'Error',
                                'html': true,
                                'content': list
                            });
                            spans[span][1] = true;
                        }
                    }else{
                        spans[span][0].popover('dispose');
                        spans[span][0].removeClass( "bg-danger text-white" );
                        spans[span][0].addClass( "bg-success text-white" );
                        spans[span][1] = false;
                    }
                }
            }
        }
    }

    if(payload.wasSubmitted === true){
        alert("Successfully Registered");
    }
}

function createContent(payload){
    var ul = document.createElement('ul');
    var textnode;
    ul.setAttribute("style", "margin:20px; padding:0px;");
    for(var value in payload){
        var li = document.createElement('li');
        textnode = document.createTextNode(payload[value]);
        li.appendChild(textnode);
        ul.append(li);
    }
    return ul;
}
