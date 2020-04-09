$(document).ready(function() {
    $("#last_name").attr("disabled", true);
    $("#father_name").attr("disabled", true);
    $("#mother_name").attr("disabled", true);
    $("#age").attr("disabled", true);
    $("#gender").attr("disabled", true);
    $("#email").attr("disabled", true);
    $("#password_first").attr("disabled", true);
    $("#password_last").attr("disabled", true);
    $("#sub_button").attr("disabled", true);


    $("#first_name").on('input', function() {
        var input = $("#first_name").val();
        if (input) {
            $("#last_name").attr("disabled", false);
        } else {
            $("#last_name").attr("disabled", true);
            $("#father_name").attr("disabled", true);
            $("#mother_name").attr("disabled", true);
            $("#age").attr("disabled", true);
            $("#gender").attr("disabled", true);
            $("#email").attr("disabled", true);
            $("#password_first").attr("disabled", true);
            $("#password_last").attr("disabled", true);
            $("#sub_button").attr("disabled", true);
        }
    });

    $("#last_name").on('input', function() {
        var input = $("#last_name").val();
        if (input) {
            $("#father_name").attr("disabled", false);
        } else {
            $("#father_name").attr("disabled", true);
            $("#mother_name").attr("disabled", true);
            $("#age").attr("disabled", true);
            $("#gender").attr("disabled", true);
            $("#email").attr("disabled", true);
            $("#password_first").attr("disabled", true);
            $("#password_last").attr("disabled", true);
            $("#sub_button").attr("disabled", true);
        }
    });

    $("#father_name").on('input', function() {
        var input = $("#father_name").val();
        if (input) {
            $("#mother_name").attr("disabled", false);
        } else {
            $("#mother_name").attr("disabled", true);
            $("#age").attr("disabled", true);
            $("#gender").attr("disabled", true);
            $("#email").attr("disabled", true);
            $("#password_first").attr("disabled", true);
            $("#password_last").attr("disabled", true);
            $("#sub_button").attr("disabled", true);
        }
    });

    $("#mother_name").on('input', function() {
        var input = $("#mother_name").val();
        if (input) {
            $("#age").attr("disabled", false);
        } else {
            $("#age").attr("disabled", true);
            $("#gender").attr("disabled", true);
            $("#email").attr("disabled", true);
            $("#password_first").attr("disabled", true);
            $("#password_last").attr("disabled", true);
            $("#sub_button").attr("disabled", true);
        }
    });

    $("#age").on('input', function() {
        var input = $("#age").val();
        if (input) {
            $("#gender").attr("disabled", false);
        } else {
            $("#gender").attr("disabled", true);
            $("#email").attr("disabled", true);
            $("#password_first").attr("disabled", true);
            $("#password_last").attr("disabled", true);
            $("#sub_button").attr("disabled", true);
        }
    });


    $("#gender").on('input', function() {
        var input = $("#gender").val();
        if (input) {
            $("#email").attr("disabled", false);
        } else {
            $("#email").attr("disabled", true);
            $("#password_first").attr("disabled", true);
            $("#password_last").attr("disabled", true);
            $("#sub_button").attr("disabled", true);
        }
    });


    $("#email").on('input', function() {
        var input = $("#email").val();
        if (input) {
            $("#password_first").attr("disabled", false);
        } else {
            $("#password_first").attr("disabled", true);
            $("#password_last").attr("disabled", true);
            $("#sub_button").attr("disabled", true);
        }
    });


    $("#password_first").on('input', function() {
        var input = $("#password_first").val();
        if (input) {
            $("#password_last").attr("disabled", false);
        } else {
            $("#password_last").attr("disabled", true);
            $("#sub_button").attr("disabled", true);
        }
    });


    $("#password_last").on('input', function() {
        var input = $("#password_last").val();
        if (input) {
            $("#sub_button").attr("disabled", false);
        } else {
            $("#sub_button").attr("disabled", true);
        }
    });
});