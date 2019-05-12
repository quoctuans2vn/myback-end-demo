$(document).ready(function (){
    /*
    $(".btn-menu").on('click',function(){
        $html = 'view/' + $(this).attr('id') + '.php';
        $("#data-returned").load($html);
    });
    $(document).on('submit','#main-form',function(event){
        event.preventDefault();
        var property = document.getElementById('file').files[0];
        var file_name = property.name;
        var file_extension = file_name.split('.').pop().toLowerCase();
        var file_size = property.size;
        var action = 'uploadForm';
        var form = {
            subject: $("#subject").val(),
            contract: $("#contract").val(),
            expire_time: $("#expire-time").val(),
            file_name: file_name,
            file_extension: file_extension,
            file_size: file_size,
        };
        $.ajax({
            url: 'index.php',
            type: 'POST',
            dataType: 'JSON',
            data: form,
        }).done(function(result){
            console.log(result);
        });

    });    
    */  
        
});