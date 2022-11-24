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

    $('#add_docs').submit(function() {
        $('#spin').show();
        $('#spin').css('visibility', 'visible');
    });

    $('#add_docs').submit(function() {
        if ($('#add_docsbtn').is(':disabled')) {
            $('#add_docsbtn').removeAttr('disabled');
        } else {
            $('#add_docsbtn').attr('disabled', 'disabled');
        }
    });

    $('#add_docs1').submit(function() {
        $('#spin1').show();
        $('#spin1').css('visibility', 'visible');
    });

    $('#add_docs1').submit(function() {
        if ($('#add_docsbtn1').is(':disabled')) {
            $('#add_docsbtn1').removeAttr('disabled');
        } else {
            $('#add_docsbtn1').attr('disabled', 'disabled');
            $('#cancel').hide();
        }
    });
     
} );
