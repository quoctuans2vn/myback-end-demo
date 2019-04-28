$(document).ready(function (){
    $(".btn-menu").on('click',function(){
        $html = 'view/' + $(this).attr('id') + '.php';
        $("#data-returned").load($html);
    });
    $(document).on('submit','#main-form',function(event){
        event.preventDefault();
        var subject = $("#subject").val();
        var contract = $("#contract").val();
        var expire_time = $("#expire-time").val();
        var property = document.getElementById('file').files[0];
        var file_name = property.name;
        var file_extension = file_name.split('.').pop().toLowerCase();
        var file_size = property.size;
        if (jQuery.inArray(file_extension,['pdf','jpg','jpeg','png','doc','docx','xlsx']) == -1){
            $("#error-type").show();
        }
        else{
            $("#error-type").hide();
        }
        if (file_size > 200000){
            $("#error-size").show();
        }
        else{
            $("#error-size").hide();
        }
        $(".form-message").load('index.php?a=uploadForm',{
            subject : subject,
            contract : contract,
            expire_time : expire_time,
            file_name : file_name,
            file_extension : file_extension,
            file_size : file_size
        });

    });    
        
        
});