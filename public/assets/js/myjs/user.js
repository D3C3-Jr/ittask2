var tableUser;
var tableGroupUsers;
$(document).ready(function () {
    $.ajax({
        url: "user/listUser",
        method: "GET",
        success: function (data) {
            $('#user_id').html(data)
        }
    });
    tableUser = $('#tableUser').DataTable({
        "ajax": {
            "url": '/user/read',
            "type": 'GET'
        },
        "deferRender": true,
        "serverSide": true,
        "processing": true,
        "bDestroy": true,
        "scrollY": 300,
        "scroller": true,
        // "dom": 'Bfrtip',
        // "buttons": [
        //     'pageLength',
        //     'excel',
        //     'print',
        // ]
    });

    tableGroupUsers = $('#tableGroupUsers').DataTable({
        "ajax": {
            "url": '/groupUsers/read',
            "type": 'GET'
        },
        "deferRender": true,
        "serverSide": true,
        "processing": true,
        "bDestroy": true,
        "scrollY": 300,
        "scroller": true,
        // "dom": 'Bfrtip',
        // "buttons": [
        //     'pageLength',
        //     'excel',
        //     'print',
        // ]
    });
});
function reloadUser() {
    tableUser.ajax.reload();
}
function reloadGroupUsers() {
    // tableGroupUsers.ajax.reload();
    location.reload();
}

function addUser() {
    method = 'save';
    $('.modal-footer').attr('hidden', false);
    $('#formUser')[0].reset();
    $('#modalUser').modal('show');
    $('input').attr('disabled', false);
    $('select').attr('disabled', false);
    $('.modal-title').text('Form Tambah Data User');
    $('#submit').text('Simpan');
}

function addGroupUsers() {
    method = 'save';
    $('.modal-footer').attr('hidden', false);
    $('#formGroupUsers')[0].reset();
    $('#modalGroupUsers').modal('show');
    $('input').attr('disabled', false);
    $('select').attr('disabled', false);
    $('.modal-title-group-users').text('Form Tambah Akses');
    $('#submitGroupUsers').text('Simpan');
}

function detailUser(id) {
    $.ajax({
        url: '/user/detail/' + id,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id"]').val(data.id).attr('disabled', true);
            $('[name="email"]').val(data.email).attr('disabled', true);
            $('[name="username"]').val(data.username).attr('disabled', true);
            $('[name="password_hash"]').val(data.password_hash).attr('disabled', true);

            $('#modalUser').modal('show');
            $('.modal-title').text('Detail Data User');
            $('.modal-footer').attr('hidden', true);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function editUser(id) {
    method = 'update';
    $.ajax({
        url: '/user/edit/' + id,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id"]').val(data.id).attr('disabled', false);
            $('[name="email"]').val(data.email).attr('disabled', false);
            $('[name="username"]').val(data.username).attr('disabled', false);
            $('[name="password_hash"]').val(data.password_hash).attr('disabled', false);

            $('.modal-footer').attr('hidden', false);
            $('#modalUser').modal('show');
            $('.modal-title').text('Form Edit Data User');
            $('#submit').text('Update');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}
function editGroupUsers(id) {
    method = 'update';
    $.ajax({
        url: '/groupUsers/edit/' + id,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            $('[name="id_group_users"]').val(data.id_group_users).attr('disabled', false);
            $('[name="group_id"]').val(data.group_id).attr('disabled', false);
            $('[name="user_id"]').val(data.user_id).attr('disabled', true);

            $('.modal-footer').attr('hidden', false);
            $('#modalGroupUsers').modal('show');
            $('.modal-title').text('Form Edit Akses');
            $('#submitGroupUsers').text('Update');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function deleteUser(id) {
    Swal.fire({
        title: 'Hapus Data?',
        text: "Anda yakin ingin menghapus Data ini",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/user/delete/' + id,
                type: "DELETE",
                dataType: "json",
                success: function (data) {
                    if (data.status) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        reloadUser();
                        reloadGroupUsers();
                    };
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error');
                }
            });
        };
    });
}


// SAVE
function saveUser() {
    if (method == 'save') {
        url = '/user/save';
        $text = 'Data berhasil di Ditambah';
    } else {
        url = '/user/update';
        $text = 'Data berhasil di Update';
    }

    $.ajax({
        url: url,
        type: 'POST',
        data: new FormData($('#formUser')[0]),
        dataType: 'JSON',
        contentType: false,
        processData: false,
        beforeSend: function (data) {
            $('#submit').html('<i class="fas fa-spinner fa-spin"></i>');
        },
        success: function (data) {
            if (data.status) {
                Swal.fire({
                    title: 'Berhasil',
                    text: $text,
                    icon: 'success',
                    toast: true,
                    position: 'bottom-start',
                    showConfirmButton: false,
                    timer: 3000
                });
                reloadUser();

                $('.help-block').empty();
                $('#modalUser').modal('hide');
                $('#formUser')[0].reset();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                    $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    $('#submit').text('Simpan');
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    });
}

function saveGroupUsers() {
    if (method == 'save') {
        url = '/groupUsers/save';
        $text = 'Data berhasil di Ditambah';
    } else {
        url = '/groupUsers/update';
        $text = 'Data berhasil di Update';
    }

    $.ajax({
        url: url,
        type: 'POST',
        data: new FormData($('#formGroupUsers')[0]),
        dataType: 'JSON',
        contentType: false,
        processData: false,
        beforeSend: function (data) {
            $('#submit').html('<i class="fas fa-spinner fa-spin"></i>');
        },
        success: function (data) {
            if (data.status) {
                Swal.fire({
                    title: 'Berhasil',
                    text: $text,
                    icon: 'success',
                    toast: true,
                    position: 'bottom-start',
                    showConfirmButton: false,
                    timer: 3000
                });
                reloadGroupUsers();

                $('.help-block').empty();
                $('#modalGroupUsers').modal('hide');
                $('#formGroupUsers')[0].reset();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                    $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    $('#submit').text('Simpan');
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    });
}