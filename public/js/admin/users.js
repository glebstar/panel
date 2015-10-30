$(document).ready(function () {
    $('.icol-pencil').click(function () {
        var userId = $(this).attr('user_id');
        $('#u-m-id').html(userId);
        $('#u-m-login').val($('#tr-u-id-' + userId + ' .td-login').html());
        $('#u-m-name').val($('#tr-u-id-' + userId + ' .td-name').html());
        var userRole = $('#tr-u-id-' + userId + ' .td-role').html() == 'Администратор' ? 1 : 2;
        $("#u-m-role [value='" + userRole + "']").attr("selected", "selected");
        $('#u-m-pass').val('');

        $('#editModal').modal();
    });

    $('#editModal-close').click(function () {
        $('#editModal').modal('hide');
    });

    $('#u-m-save').click(function () {
        var uData = {
            _token: $('#csrf-token').val(),
            id: $('#u-m-id').html(),
            login: $('#u-m-login').val(),
            name: $('#u-m-name').val(),
            role: $('#u-m-role option:selected').val()
        };

        $.post('/admin/users/edit', uData, function (data) {
            if (data.result === 'ok') {
                // обновить данные в таблице
                $('#tr-u-id-' + uData.id + ' .td-login').html(uData.login);
                $('#tr-u-id-' + uData.id + ' .td-name').html(uData.name);
                var roleLbl = uData.role == 1 ? 'Администратор' : 'Оператор';
                $('#tr-u-id-' + uData.id + ' .td-role').html(roleLbl);

                $('#editModal').modal('hide');

                $.pnotify({
                    title: 'Успешно!',
                    text: 'Данные изменены',
                    type: 'success'
                });
            } else {
                var eText = '';
                for (var i = 0; i < data.errors.length; i++) {
                    eText += data.errors[i] + '<br />';
                }

                $.pnotify({
                    title: 'Ошибка!',
                    text: eText,
                    type: 'error'
                });
            }
        }, 'json');
    });

    $('#u-m-save-pass').click(function () {
        var uData = {
            _token: $('#csrf-token').val(),
            id: $('#u-m-id').html(),
            password: $('#u-m-pass').val()
        };

        $.post('/admin/users/editpass', uData, function (data) {
            if (data.result === 'ok') {
                $('#editModal').modal('hide');

                $.pnotify({
                    title: 'Успешно!',
                    text: 'Пароль изменен',
                    type: 'success'
                });
            } else {
                var eText = '';
                for (var i = 0; i < data.errors.length; i++) {
                    eText += data.errors[i] + '<br />';
                }

                $.pnotify({
                    title: 'Ошибка!',
                    text: eText,
                    type: 'error'
                });
            }
        }, 'json');
    });

    $('.icol-cross').click(function () {
        var userId = $(this).attr('user_id');
        
        $.msgbox("Удалить пользователя " + $('#tr-u-id-' + userId + ' .td-name').html() + "?", {
            type: "confirm",
            buttons: [
                {type: "submit", value: "Да"},
                {type: "cancel", value: "Отмена"}
            ]
        }, function (result) {
            if (result) {
                var delData = {
                    _token: $('#csrf-token').val(),
                    id: userId
                };
                $.post('/admin/users/del', delData, function(data){
                    if (data.result === 'ok') {
                        $('#tr-u-id-' + userId).remove();
                        $.pnotify({
                            title: 'Успешно!',
                            text: 'Пользователь удален',
                            type: 'success'
                        });
                    } else {
                        var eText = '';
                        for (var i = 0; i < data.errors.length; i++) {
                            eText += data.errors[i] + '<br />';
                        }

                        $.pnotify({
                            title: 'Ошибка!',
                            text: eText,
                            type: 'error'
                        });
                    }
                }, 'json');
            }
        }
        );
    });
});