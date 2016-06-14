check = [false, false, false];

function changePassword(myself) {
    if (!check[0]) {
        myself.childNodes[1].childNodes[1].innerText = 'Old password is invalid!';
    } else if (!check[1]) {
        myself.childNodes[3].childNodes[1].innerText = 'Password is invalid!';
    } else if (!check[2]) {
        myself.childNodes[5].childNodes[1].innerText = 'Repassword is invalid!';
    } else {
        newPassword = myself.elements.namedItem("new-password").value;
        oldPaddword = myself.elements.namedItem("old-password").value;

        data = {oldPassword: oldPaddword, newPassword: newPassword};

        $.post('/api/change-password', data, function(data) {
            if (data == 'SUCCESS') {
                $('#alert-success').addClass('alert-show');
                $('#alert-success').text('Update successfully!');

                setTimeout(function(){
                    $('#alert-success').removeClass('alert-show');
                }, 5000);
                myself.elements.namedItem("old-password").value = '';
                myself.elements.namedItem("new-password").value = '';
                myself.elements.namedItem("re-password").value = '';
            } else if (data == 'WRONG PASSWORD') {
                myself.elements.namedItem("new-password").value = '';
                myself.elements.namedItem("re-password").value = '';

                myself.childNodes[1].childNodes[1].innerText = 'Wrong password! Please try again!';
            } else {
                $('#alert-danger').addClass('alert-show');
                $('#alert-danger').text('Update failed!');

                setTimeout(function(){
                    $('#alert-danger').removeClass('alert-show');
                }, 5000);
            }
        });
    }
    return false;
}

function checkOldPassword(myself) {
    check[0] = false;
    var passwordRegex = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,50}/;
    if (myself.value == '') {
        myself.parentNode.childNodes[1].innerText = 'Old password is required!';
    } else if (!passwordRegex.test(myself.value)) {
        myself.parentNode.childNodes[1].innerText = 'Old password is invalid!';
    } else {
        check[0] = true;
    }
    repassInput = document.getElementById('changePasswordForm').elements.namedItem("re-password");
    if (repassInput.value != '') {
        checkRetypePassword(repassInput);
    }
}

function checkNewPassword(myself) {
    check[1] = false;
    var passwordRegex = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,50}/;
    if (myself.value == '') {
        myself.parentNode.childNodes[1].innerText = 'Password is required!';
    } else if (!passwordRegex.test(myself.value)) {
        myself.parentNode.childNodes[1].innerText = 'Password is invalid!';
    } else {
        check[1] = true;
    }
    repassInput = document.getElementById('changePasswordForm').elements.namedItem("re-password");
    if (repassInput.value != '') {
        checkRetypePassword(repassInput);
    }
}

function checkRetypePassword(myself) {
    check[2] = false;
    password = document.getElementById('changePasswordForm').elements.namedItem("new-password").value;
    if (myself.value == '') {
        myself.parentNode.childNodes[1].innerText = 'Repassword is required!';
    } else if (myself.value != password) {
        myself.parentNode.childNodes[1].innerText = 'Repassword is not match!';
    } else {
        myself.parentNode.childNodes[1].innerText = '';
        check[2] = true;
    }
}

function clearErrorMessage(myself) {
    myself.parentNode.childNodes[1].innerText = '';
}