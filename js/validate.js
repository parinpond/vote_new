$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $("#start_date").change(function(){
        $("#end_date").val($("#start_date").val());
        $("#end_date"). attr("min",$("#start_date").val());
    });
    $("#end_date").change(function(){
    });
    $(".search_transaction").click(function(){
        var start_date =$("#start_date").val();
        var end_date   =$("#end_date").val();
        if(start_date == ''){
            $("#start_date").focus();
            return false;
        }
        if(end_date == ''){
            $("#end_date").focus();
            return false;
        }
        return true;
    });
    $(".submit_login").click(function(){
        var username =$("#username").val();
        var password =$("#password").val();
        if(username == ''){
            $("#username").focus();
            return false;
        }
        if(password == ''){
            $("#password").focus();
            return false;
        }
        return true;
    });
    $(".submit_create_user").click(function(){
        var firstname =$("#firstname").val().trim();
        var lastname  =$("#lastname").val().trim();
        var nickname  =$("#nickname").val().trim();
        var username  =$("#username").val().trim();
        var user_type =$("#user_type_id").val();
        if(firstname == ''){
            $("#firstname").focus();
            return false;
        }
        if(lastname == ''){
            $("#lastname").focus();
            return false;
        }
        if(nickname == ''){
            $("#nickname").focus();
            return false;
        }
         if(username==''){
            $("#username").focus();
            return false;
        }
        if(user_type == null){
            $("#user_type_id").focus();
            return false;
        }
        return true;
    });
    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
           return false;
        }else{
           return true;
        }
      }
    $(".submit_vote").click(function(){
        var id =$(this).data("id");
        var comment =$("#comment"+id).val().trim();
        if(comment == ''){
            $("textarea#comment"+id).focus();
            $("#textarea_empty"+id).text('Please input comment.').css("color", "red");
            return false;
        }
        return true;
    });
    $('.modal').on('shown.bs.modal', function() {
    $(this).find('textarea').focus();
	});
});


