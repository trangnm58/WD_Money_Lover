check = [false, false, false, false];

function register() {
    form = document.getElementById('sign-up-form');
    if (!check[0]) {
        form.childNodes[1].childNodes[1].innerText = 'Username is invalid!'
    } else if (!check[1]) {
        form.childNodes[3].childNodes[1].innerText = 'Email is invalid!'
    } else if (!check[2]) {
        form.childNodes[5].childNodes[1].innerText = 'Password is invalid!'
    } else if (!check[3]) {
        form.childNodes[7].childNodes[1].innerText = 'Repassword is invalid!'
    } else {
        return true;
    }
    return false;
}

function checkUsername(myself) {
    check[0] = false;
    var usernameRegex = /^[a-zA-Z0-9]{6,50}$/;
    if (myself.value == '') {
        myself.parentNode.childNodes[1].innerText = 'Username is required!';
    } else if (!usernameRegex.test(myself.value)) {
        myself.parentNode.childNodes[1].innerText = 'Username is invalid!';
    } else {
        $.get('/api/test-username/' + myself.value, function(data) {
            if (data != 'VALID') {
                myself.parentNode.childNodes[1].innerText = 'This username is existed!';
            } else {
                check[0] = true;
            }
        });
    }
}

function checkEmail(myself) {
    check[1] = false;
    var emailRegex = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
    if (myself.value == '') {
        myself.parentNode.childNodes[1].innerText = 'Email is required!';
    } else if (!emailRegex.test(myself.value)) {
        myself.parentNode.childNodes[1].innerText = 'Email is invalid!';
    } else {
        $.get('/api/test-email/' + myself.value, function(data) {
            if (data != 'VALID') {
                myself.parentNode.childNodes[1].innerText = 'This email is existed!';
            } else {
                check[1] = true;
            }
        });
    }
}

function checkPassword(myself) {
    check[2] = false;
    var passwordRegex = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,50}/;
    if (myself.value == '') {
        myself.parentNode.childNodes[1].innerText = 'Password is required!';
    } else if (!passwordRegex.test(myself.value)) {
        myself.parentNode.childNodes[1].innerText = 'Password is invalid!';
    } else {
        check[2] = true;
    }
    repassInput = document.getElementById('sign-up-form').elements.namedItem("re-password");
    if (repassInput.value != '') {
        checkRePassword(repassInput);
    }
}

function checkRePassword(myself) {
    check[3] = false;
    password = document.getElementById('sign-up-form').elements.namedItem("password").value;
    if (myself.value == '') {
        myself.parentNode.childNodes[1].innerText = 'Repassword is required!';
    } else if (myself.value != password) {
        myself.parentNode.childNodes[1].innerText = 'Repassword is not match!';
    } else {
        myself.parentNode.childNodes[1].innerText = '';
        check[3] = true;
    }
}

function clearErrorMessage(myself) {
    myself.parentNode.childNodes[1].innerText = '';
}
