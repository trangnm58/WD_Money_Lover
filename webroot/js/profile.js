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

function saveEditContact() {
    form = document.getElementById('editContactInformationForm');
    address = form.elements.namedItem('address').value;
    city = form.elements.namedItem('city').value;
    country = form.elements.namedItem('country').value;
    phone = form.elements.namedItem('phone').value;

    data = {address: address, city: city, country:country, phone:phone};
    $.post('/api/update-contact-information', data, function (data) {
        if (data == "SUCCESS") {
            $('#alert-success').addClass('alert-show');
            $('#alert-success').text('Update successfully!');

            $('#info-address').text(address);
            $('#info-city').text(city);
            $('#info-country').text(country);
            $('#info-phone').text(phone);

            setTimeout(function(){
                $('#alert-success').removeClass('alert-show');
            }, 5000);
        } else {
            $('#alert-danger').addClass('alert-show');
            $('#alert-danger').text('Update failed!');

            setTimeout(function(){
                $('#alert-danger').removeClass('alert-show');
            }, 5000);
        }
    });
}

function saveEditEducation() {
    form = document.getElementById('editEducationInformationForm');
    university = form.elements.namedItem('university').value;
    highschool = form.elements.namedItem('highschool').value;
    job = form.elements.namedItem('job').value;
    company = form.elements.namedItem('company').value;

    data = {university: university, highschool: highschool, job:job, company:company};
    $.post('/api/update-education-information', data, function (data) {
        if (data == "SUCCESS") {
            $('#alert-success').addClass('alert-show');
            $('#alert-success').text('Update successfully!');

            $('#info-university').text(university);
            $('#info-highschool').text(highschool);
            $('#info-job').text(job);
            $('#info-company').text(company);

            setTimeout(function(){
                $('#alert-success').removeClass('alert-show');
            }, 5000);
        } else {
            $('#alert-danger').addClass('alert-show');
            $('#alert-danger').text('Update failed!');

            setTimeout(function(){
                $('#alert-danger').removeClass('alert-show');
            }, 5000);
        }
    });
}
