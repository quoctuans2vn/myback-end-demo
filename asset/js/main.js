$(document).ready(function (){
    
    $(document).on('click','.action',function(){
        var form_id = $(this).data('form_id');
        var form_state = $(this).data('form_state');
        if (!form_state){
            var state = $(this).parent().prev();
            var a = 'changeStatusForm';
            var c = 'Admin';
            if (confirm("Are you sure to change status of this form?")){
                $.ajax({
                    url: 'index.php',
                    method: 'GET',
                    data: {
                        a:a,
                        c:c,
                        form_id:form_id,
                        form_state:form_state
                    },
                    success: function(data){
                        state.html(data);
                    }
                });
            }
        }
    });
    $(document).on('click','.delete',function(){
        var user_id = $(this).data('user_id');
        var delete_tar = $(this).parent().parent().parent();
        if (confirm("Are you sure to delete this user?")){
            var a = 'deleteUser';
            var c = 'Admin';
            $.ajax({
                url: 'index.php',
                method: 'GET',
                data: {
                    a:a,
                    c:c,
                    user_id:user_id
                },
                success: function(){
                    delete_tar.remove();   
                }
            });

        }
    });
    $(document).on('click','.show-roles',function(){
        var a = 'getRoles';
        var c = 'Admin';
        $.ajax({
            url: 'index.php',
            method: 'GET',
            data: {
                a:a,
                c:c,
            },
            success: function(data){
                $('.roles_return').html(data);
            }
        });
    });
        
});