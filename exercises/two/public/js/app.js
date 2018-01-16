var fname,lname,address,email,gender,uname,pass,cpass;

$(document).ready(function(){
    $('[data-toggle="popover"]').popover({trigger: "hover"});
    $('#exampleModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })

    fname   = $("[name='fname']");
    lname   = $("[name='lname']");
    address = $("[name='Address']");
    email   = $("[name='email']");
    gender  = $("[name='gender']");
    uname   = $("[name='uname']");
    pass    = $("[name='pass']");
    cpass   = $("[name='cpass']");
});

function clearForm(){
    fname.val('');
    lname.val('');
    address.val('');
    email.val('');
    gender.prop('checked', false);
    uname.val('');
    pass.val('');
    cpass.val('');

}