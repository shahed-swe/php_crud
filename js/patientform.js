$(function() {
    $("#submit").attr("disabled", true);
    $("#f_name").attr("disabled", true);
    $("#email").attr("disabled", true);
    $("#phone").attr("disabled", true);
    $("#bed_no").attr("disabled", true);
    $("#pr_address").attr("disabled", true);
    $("#pe_address").attr("disabled", true);
    $("#user_image").attr("disabled", true);


    $("#patient_id").on('input', function() {
        var input = $("#patient_id").val();
        if (input) {
            $("#f_name").attr("disabled", false);
        } else {
            $("#submit").attr("disabled", true);
            $("#f_name").attr("disabled", true);
            $("#email").attr("disabled", true);
            $("#phone").attr("disabled", true);
            $("#bed_no").attr("disabled", true);
            $("#pr_address").attr("disabled", true);
            $("#pe_address").attr("disabled", true);
            $("#user_image").attr("disabled", true);
        }
    });

    $("#f_name").on('input', function() {
        var input = $("#f_name").val();
        if (input) {
            $("#email").attr("disabled", false);
        } else {
            $("#email").attr("disabled", true);
            $("#phone").attr("disabled", true);
            $("#bed_no").attr("disabled", true);
            $("#pr_address").attr("disabled", true);
            $("#pe_address").attr("disabled", true);
            $("#submit").attr("disabled", true);
            $("#user_image").attr("disabled", true);
        }
    });
    $("#email").on('input', function() {
        var input = $("#email").val();
        if (input) {
            $("#phone").attr("disabled", false);
        } else {
            $("#phone").attr("disabled", true);
            $("#bed_no").attr("disabled", true);
            $("#pr_address").attr("disabled", true);
            $("#pe_address").attr("disabled", true);
            $("#submit").attr("disabled", true);
            $("#user_image").attr("disabled", true);
        }
    });
    $("#phone").on('input', function() {
        var input = $("#phone").val();
        if (input) {
            $("#bed_no").attr("disabled", false);
        } else {
            $("#bed_no").attr("disabled", true);
            $("#pr_address").attr("disabled", true);
            $("#pe_address").attr("disabled", true);
            $("#submit").attr("disabled", true);
            $("#user_image").attr("disabled", true);
        }
    });
    $("#bed_no").on('input', function() {
        var input = $("#bed_no").val();
        if (input) {
            $("#pr_address").attr("disabled", false);
        } else {
            $("#pr_address").attr("disabled", true);
            $("#pe_address").attr("disabled", true);
            $("#submit").attr("disabled", true);
            $("#user_image").attr("disabled", true);
        }
    });
    $("#pr_address").on('input', function() {
        var input = $("#pr_address").val();
        if (input) {
            $("#pe_address").attr("disabled", false);
        } else {
            $("#pe_address").attr("disabled", true);
            $("#submit").attr("disabled", true);
            $("#user_image").attr("disabled", true);
        }
    });
    $("#pe_address").on('input', function() {
        var input = $("#pe_address").val();
        if (input) {
            $("#user_image").attr("disabled", false);
        } else {
            $("#user_image").attr("disabled", true);
            $("#submit").attr("disabled", true);
        }
    });
    $("#user_image").on('input', function() {
        var input = $("#user_image").val();
        if (input) {
            $("#submit").attr("disabled", false);
        } else {

            $("#submit").attr("disabled", true);
        }
    });

})