$(function(){

    $('input[name="select_status"]').click(function() {
        const result = $(this).attr('id');
        if (result == 'everything') {
            document.getElementById('status_everything').style.display = 'block'
            document.getElementById('status_progressing').style.display = 'none'
            document.getElementById('status_done').style.display = 'none'
        }
        else if (result == 'progressing') {
            document.getElementById('status_everything').style.display = 'none'
            document.getElementById('status_progressing').style.display = 'block'
            document.getElementById('status_done').style.display = 'none'
        }
        else {
            document.getElementById('status_everything').style.display = 'none'
            document.getElementById('status_progressing').style.display = 'none'
            document.getElementById('status_done').style.display = 'block'
        }
    });

});