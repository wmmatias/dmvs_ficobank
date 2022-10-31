$(document).ready( function () {
    $('#userlist').DataTable();
    $('#docslist').DataTable();
    $('.movement_form').hide();
    $('#hide_form').hide();

    $("#show_form").click(function(){
        $('.movement_form').show();
        $('#hide_form').show();
        $('#show_form').hide();
        $('.loc_rule').hide();
    });

    $("#hide_form").click(function(){
        $('.movement_form').hide();
        $('#hide_form').hide();
        $('#show_form').show();
    });
     
} );
