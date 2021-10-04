$(document).ready(function () {
    $('#tableedit').Tabledit({
        url:'edit.php',
        toolbarClass:'d-inline',
        buttons: {
            edit:{
                class:'btn btn-sm btn-light',
                html:'<span class="fas fa-pencil-alt"></span>',
                action:'edit'
            },
            delete:{
                class:'btn btn-sm btn-light',
                html:'<span class="fas fa-trash"></span>',
                action:'delete'
            }
        },
        columns:{
            identifier:[0,'id'],
            editable:[[1,'unit_code'], [2, 'unit_name'], [3, 'coordinator'], [4, 'semester'], [5, 'campus'], [6, 'description']]
        },
        restoreButton:false,
        onSuccess:function(data,textStatus,jqXHR){
            if(data.action=='delete'){
                $('#'+data.id).remove();
            }
        }
    });
});