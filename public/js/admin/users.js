$(document).ready(function(){
    $('.icol-pencil').click(function(){
        $('#editModal').modal();
    });
    
    $('#editModal-close').click(function(){
        $('#editModal').modal('hide');
    });
});