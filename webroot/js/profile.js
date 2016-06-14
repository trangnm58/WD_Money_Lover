function saveEditBasic() {
    form = document.getElementById('editBasicInformationForm');
    fName = form.elements.namedItem('fullname').value;
    dob = form.elements.namedItem('dob').value;
    gender = form.elements.namedItem('gender').value;

    data = {name: fName, dob: dob, gender:gender};
    $.post('/api/update-basic-information', data, function (data) {
        if (data == "SUCCESS") {
            $('#alert-success').addClass('alert-show');
            $('#alert-success').text('Update successfully!');
            $('#info-fname').text(fName);
            $('#info-dob').text(dob);

            if (gender == 1) genderT = 'Male';
            else if (gender == 2) genderT = 'Female';
            else genderT = 'Others';
            $('#info-gender').text(genderT);

            setTimeout(function(){
                $('#alert-success').removeClass('alert-show');
            }, 5000);
        } else {

        }
    });
}