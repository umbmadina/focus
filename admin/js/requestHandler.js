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

		console.log("check: " + remember);

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
    })

    $('.delete-client').click(function () {
        var id = $(this).attr('data-id');
        console.log(id);
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
    })
});