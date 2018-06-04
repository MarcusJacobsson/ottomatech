/**
 * Created by Marcus Jacobsson on 2015-01-13.
 */
/**
 * Created by Marcus Jacobsson on 2015-01-13.
 */
function validateContactForm() {
    var name = document.getElementById("name").value;
    var name_fg_element = document.getElementById("name_fg");
    var email = document.getElementById("email").value;
    var email_fg_element = document.getElementById("email_fg");
    var message = document.getElementById("message").value;
    var message_fg_element = document.getElementById("message_fg");
    var errors = [];

    if (name == null || name == "") {
        name_fg_element.className += ' has-error';
        errors[errors.length] = "name";
    } else {
        if (hasClass(name_fg_element, "has-error")) {
            name_fg_element.className = name_fg_element.className.replace(/\bhas-error\b/, ' has-success');
        } else {
            name_fg_element.className += ' has-success';
        }
    }

    if (email == null || email == "") {
        email_fg_element.className += ' has-error';
        errors[errors.length] = "email";
    } else {
        if (hasClass(email_fg_element, "has-error")) {
            email_fg_element.className = email_fg_element.className.replace(/\bhas-error\b/, ' has-success');
        } else {
            email_fg_element.className += ' has-success';
        }
    }

    if (message == null || message == "") {
        message_fg_element.className += ' has-error';
        errors[errors.length] = "message";
    } else {
        if (hasClass(message_fg_element, "has-error")) {
            message_fg_element.className = message_fg_element.className.replace(/\bhas-error\b/, ' has-success');
        } else {
            message_fg_element.className += ' has-success';
        }
    }

    if (errors.length > 0) {
        var i;
        var error_message = "Please provide:\n\n";
        for (i = 0; i < errors.length; i++) {
            error_message += errors[i] + "\n";
        }
        alert(error_message);
        return false;
    }
}

function hasClass(element, cls) {
    return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
}