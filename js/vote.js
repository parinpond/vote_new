$(document).ready(function(){
    $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#userTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    $(".text-thank-you").on("click", function() {
        var id =$(this).data("id");
        $("#comment"+id).html('Thank you.').css('text-align','left');
    });
    $(".text-congratulation").on("click", function() {
        var id =$(this).data("id");
        $("#comment"+id).html('Congratulation.').css('text-align','left');
    });
    $(".text-no-resson").on("click", function() {
        var id =$(this).data("id");
        $("#comment"+id).html('No resson.').css('text-align','left');
    });
    $(".text-hard-work").on("click", function() {
        var id =$(this).data("id");
        $("#comment"+id).html('Hard work.').css('text-align','left');
    });
    $(".text-smart-work").on("click", function() {
        var id =$(this).data("id");
        $("#comment"+id).html('Smart work.').css('text-align','left');
    });
});