//import './jquery';
//import './bootstrap';


$('#formLogin').on('submit', function(e){
    e.preventDefault();
    $('.form-control').removeClass('is-invalid');
    $('small.form-text').addClass('d-none');
    const email    = this['email'].value,
          password = this['password'].value;
    $.ajax({
        type: 'POST',
        url: '/api/v1/login',
        dataType: 'json',
        data: {email: email, password: password},
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if(data.status==200){
                $("#nav-auth").html(`<a href="${data.url}" class="btn btn-success btn-block">Перейти в профиль</a>`);
            }
        },
        error: function (msg) {
            for(let key in msg.responseJSON.errors){
                $(`#${key}Err`).text(msg.responseJSON.errors[key][0]).removeClass('d-none');
                $(`#${key}`).addClass('is-invalid');
            }
        }
    });
});

$('#formRegister').on('submit', function(e){
    e.preventDefault();
    $('.form-control').removeClass('is-invalid');
    $('small.form-text').addClass('d-none');
    const email = this['email'].value;
    $.ajax({
        type: 'POST',
        url: '/api/v1/register',
        dataType: 'json',
        data: {email: email},
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if(data.status==200){
                $("#nav-register").html(`<div class="alert alert-success">${data.message}</div>`);
            }
        },
        error: function (msg) {
            if(msg.status==422){
                $(`#emailRegErr`).text(msg.responseJSON.errors['email'][0]).removeClass('d-none');
                $(`#emailReg`).addClass('is-invalid');
            }
            $(`#emailRegErr`).text(msg.responseJSON.message).removeClass('d-none');
        }
    });
});
