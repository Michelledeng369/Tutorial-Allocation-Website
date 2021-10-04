$(document).ready(function () {
    $('#tableedit').Tabledit({
        //Connect with tutorial_edit.php
        url:'tutorial_edit.php',
        toolbarClass:'d-inline',
        buttons: {
            //edit button
            edit:{
                class:'btn btn-sm btn-light',
                html:'<span class="fas fa-pencil-alt"></span>',
                action:'edit'
            },
            //delete button
            delete:{
                class:'btn btn-sm btn-light',
                html:'<span class="fas fa-trash"></span>',
                action:'delete'
            }
        },
        columns:{
            identifier:[0,'id'],
            //edit the choosen row with identifier
            editable:[[2, 'tutor'],[3, 'time'],[4, 'location'],[5, 'maxnumber']]
        },
        restoreButton:false,
        onSuccess:function(data,textStatus,jqXHR){
            if(data.action=='delete'){
                $('#'+data.id).remove();
            }
        }
    });
});