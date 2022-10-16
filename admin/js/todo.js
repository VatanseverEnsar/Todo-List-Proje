// Add Todo List
$(document).ready(function () {
    $('form.TodoList').on('submit', function(event) {
        event.preventDefault();
        var todo_content = $('input[name="todo_content"]').val();
        var user_id = $('input[name="user_id"]').val();
        $.ajax({
            url:location.origin+'/todo-list/add',
            method:'POST',
            data:{
                todo_content:todo_content,
                user_id:user_id
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType:'json',
            success:function(response){
                if( response.status == 1 ){
                    triggerToastrSuccess(response.msg);
                    $('#todoListModal').modal('hide');
                    setTimeout(function(){
                        location.reload();
                    },1000);
                }
            },
            error:function (response){
                var errors = response.responseJSON.errors;
                for( var key in errors ){
                    $('#'+key).append('<div class="invalid-feedback">Bu alan zorunludur</div>');
                }
            }
        });
        return false;
    });
});

// Update Todo List
$(document).ready(function () {
    $('form.TodoListUpdate').on('submit', function(event) {
        event.preventDefault();
        var todo_content = $('input[name="todo_content"]').val();
        var todo_id = $('input[name="todo_id"]').val();
        var user_id = $('input[name="user_id"]').val();
        $.ajax({
            url:location.origin+'/todo-list/update',
            method:'POST',
            data:{
                todo_content:todo_content,
                user_id:user_id,
                todo_id:todo_id
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType:'json',
            success:function(response){
                if( response.status == 1 ){
                    triggerToastrSuccess(response.msg);
                    $('#todoListModal').modal('hide');
                    setTimeout(function(){
                        location.reload();
                    },1000);
                }
            },
            error:function (response){
                var errors = response.responseJSON.errors;
                for( var key in errors ){
                    $('#'+key).append('<div class="invalid-feedback">Bu alan zorunludur</div>');
                }
            }
        });
        return false;
    });
});

//Delete Todo List

$(document).on('click', 'a.delTodo', function () {
    var todo_id = $(this).attr('data-id');
    Swal.fire({
        title: 'Emin misiniz?',
        text: "Bu todo listi kalıcı olarak siliyorsunuz.İşlemi onaylıyor musunuz?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Evet! Onaylıyorum',
        cancelButtonText: "Vazgeç",
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: Adminurl + "/delete-todo-list",
                type: "GET",
                data: {
                    todo_id: todo_id
                },
                dataType: "json",
                success: function (result) {
                    if (result.status == 1) {
                        Swal.fire(
                            'İşlem Tamamlandı!',
                            result.msg,
                            'success'
                        ).then(function (result) {
                            if (result.value) {
                                window.location.reload();
                            }
                        });
                    } else {
                        Swal.fire('Hata!', result.msg, 'error');
                    }
                }
            });

        }
    });
});
