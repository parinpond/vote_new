$(document).ready(function(){
    $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#userTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    $(".text-thank-you").on("click", function() {
        var id =$(this).data("id");
        $("#comment"+id).append('Thank you.').css('textAlign', 'left');
    });
    $(".text-congratulation").on("click", function() {
        var id =$(this).data("id");
        $("#comment"+id).append('Congratulation.');
    });
    $(".text-no-resson").on("click", function() {
        var id =$(this).data("id");
        $("#comment"+id).append('No resson.');
    });
    $(".text-hard-work").on("click", function() {
        var id =$(this).data("id");
        $("#comment"+id).append('Hard work.');
    });
    $(".text-smart-work").on("click", function() {
        var id =$(this).data("id");
        $("#comment"+id).append('Smart work.');
    });
});