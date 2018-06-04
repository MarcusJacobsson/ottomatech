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
        errors[errors.length] = "namn";
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
        errors[errors.length] = "meddelande";
    } else {
        if (hasClass(message_fg_element, "has-error")) {
            message_fg_element.className = message_fg_element.className.replace(/\bhas-error\b/, ' has-success');
        } else {
            message_fg_element.className += ' has-success';
        }
    }

    if (errors.length > 0) {
        return displayError(errors);
    }else{
        return true;
    }
}

function hasClass(element, cls) {
    return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
}

function validateAddUser(){
    var password = document.getElementById("password").value;
    var email = document.getElementById("email").value;
    var username = document.getElementById("username").value;
    var errors = [];

    if(password == null || password == ""){
        errors[errors.length] = "lösenord";
    }

    if(email == null || email == ""){
        errors[errors.length] = "email";
    }

    if(username == null || username == ""){
        errors[errors.length] = "användarnamn";
    }

    if (errors.length > 0) {
        return displayError(errors);
    }else{
        return true;
    }
}

function validateUpdateAd(){
    var name = document.getElementById("update_ad_name").value;
    var price = document.getElementById("update_ad_price").value;
    var description = document.getElementById("update_ad_description").value;
    var errors = [];

    if(name == null || name == ""){
        errors[errors.length] = "namn";
    }

    if(price == null || price == ""){
        errors[errors.length] = "pris";
    }

    if(description == null || description == ""){
        errors[errors.length] = "beskrivning";
    }

    if (errors.length > 0) {
        return displayError(errors);
    }else{
        return true;
    }
}

function validateAddCategory(){
    var name = document.getElementById("add_new_category_name").value;
    var errors = [];

    if(name == null || name == ""){
        errors[errors.length] = "namn";
    }

    if (errors.length > 0) {
        return displayError(errors);
    }else{
        return true;
    }
}

function validateUpdateCategory(){
    var name = document.getElementById("update_category_new_name").value;
    var errors = [];

    if(name == null || name == ""){
        errors[errors.length] = "namn";
    }

    if (errors.length > 0) {
        return displayError(errors);
    }else{
        return true;
    }
}

function validateAddAd(){
    var name = document.getElementById("add_name").value;
    var price = document.getElementById("add_price").value;
    var description = document.getElementById("add_desc").value;
    var errors = [];

    if(name == null || name == ""){
        errors[errors.length] = "namn";
    }

    if(price == null || price == ""){
        errors[errors.length] = "pris";
    }

    if(description == null || description == ""){
        errors[errors.length] = "beskrivning";
    }

    if (errors.length > 0) {
        return displayError(errors);
    }else{
        return true;
    }
}

function displayError(errors){
    var i;
    var error_message = "Vänligen ange:\n\n";
    for (i = 0; i < errors.length; i++) {
        error_message += errors[i] + "\n";
    }
    alert(error_message);
    return false;
}