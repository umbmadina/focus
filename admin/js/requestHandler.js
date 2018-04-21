function sendRequest(url, data, callback) {
    $.ajax({
        method: "POST",
        url: url,
        data: data
    }).done(function(data) {
        callback(data);
    });
}

$(function(){

    $('.login-submit').click(function(){
        var login = $("#login").val();
        var password = $("#login-password").val();
        var remember = $("#login-remember-me").val();

        if(login.length == 0 || password.length == 0){
            alert("Enter something");
            return;
        }

        sendRequest(
            "cfg/request.php",
            {
                login: true,
                name: login,
                pass: password
            },
            function (data) {
                console.log(data);
                if(data == true){
                    window.location.replace("admin/clients");
                } else {
                    alert("Invalid data");
                }
            }
        );
    });

    $('.edit-client').click(function () {
        var id = $('#id').val();
        var name = $('#name').val();
        var packageID = $('#package').val();
        var email = $('#email').val();

        sendRequest(
            "../cfg/request.php",
            {
                'update-client': true,
                id: id,
                name: name,
                package: packageID,
                email: email
            },
            function (data) {
                location.reload(true);
            }
        );
    });

    $('.delete-client').click(function () {
        var id = $(this).attr('data-id');

        sendRequest(
            "../cfg/request.php",
            {
                'delete-client': true,
                id: id
            },
            function (data) {
                location.reload(true);
            }
        );
    });

    $('.add-class').click(function(){
        var name = $('#add-class-name').val();
        var time = $('#add-class-time').val();
        var day = $('#add-class-day').val();
        var teacher_id = $('#add-class-teacher-id').val();

        sendRequest(
            "../cfg/request.php",
            {
                'add-class': true,
                name: name,
                time: time,
                day: day,
                teacher_id: teacher_id
            },
            function (data) {
                location.reload(true);
            }
        );
    });

    $('.edit-class').click(function () {
        var id = $('#cid').val();
        var name = $('#cname').val();
        var time = $('#ctime').val();
        var day = $('#cday').val();
        var teacher_id = $('#cteacher-id').val();

        sendRequest(
            "../cfg/request.php",
            {
                'update-class': true,
                id: id,
                name: name,
                time: time,
                day: day,
                teacher_id: teacher_id
            },
            function (data) {
                location.reload(true);
            }
        );
    });

    $('.delete-class').click(function(){
        var id = $(this).attr('data-id');

        sendRequest(
            "../cfg/request.php",
            {
                'delete-class': true,
                id: id
            },
            function (data) {
                location.reload(true);
            }
        );
    });

    $('.add-teacher').click(function(){
        var name = $('#name').val();
        var surname = $('#surname').val();
        var email = $('#email').val();
        var phone = $('#phone').val();

        console.log(name + surname + email + phone)

        sendRequest(
            "../cfg/request.php",
            {
                'add-teacher': true,
                name: name,
                surname: surname,
                email: email,
                phone: phone
            },
            function (data) {
                location.reload(true);
            }
        );
    });


    $('.edit-teacher').click(function () {
        var id = $('#tid').val();
        var name = $('#tname').val();
        var surname = $('#tsurname').val();
        var email = $('#temail').val();
        var phone = $('#tphone').val();

        sendRequest(
            "../cfg/request.php",
            {
                'update-teacher': true,
                id: id,
                name: name,
                surname: surname,
                email: email,
                phone: phone
            },
            function (data) {
                location.reload(true);
            }
        );
    });

    $('.delete-teacher').click(function(){
        var id = $(this).attr('data-id');

        sendRequest(
            "../cfg/request.php",
            {
                'delete-teacher': true,
                id: id
            },
            function (data) {
                location.reload(true);
            }
        );
    });

    $('.logout').click(function () {
        sendRequest(
            "../cfg/request.php",
            { logout: true },
            function () {
                location.replace('/admin');
            }
        );
    })
});