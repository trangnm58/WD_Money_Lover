<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <div id="edit-profile-container">
        <div class="list card mp-info-card">
            <div class="item item-divider mp-card-divider">
                <h2><b>Basic Information</b></h2>
            </div>
            <div class="item mp-card-first-item">
                Full name: <span class="mp-right"><?php
                                echo $customer->getName();
                            ?></span>
                <a onclick="">
                    <i class="fa fa-pencil-square" aria-hidden="true"></i>
                    Edit
                </a>
            </div>
            <div class="item">
                Date of Birth: <span class="mp-right"><?php
                                echo $customer->getDob();
                            ?></span>
            </div>
            <div class="item">
                Gender: <span class="mp-right"><?php
                                if($customer->getGender() == 1) {
                                    echo "Male";
                                } else {
                                    echo "Female";
                                }
                            ?></span>
            </div>
        </div>
        <div class="list card mp-info-card">
            <div class="item item-divider mp-card-divider">
                <h2><b>Contact Information</b></h2>
            </div>
            <div class="item mp-card-first-item">
                Address: <span class="mp-right"><?php
                                echo $customer->getAddress();
                            ?></span>
            </div>
            <div class="item">
                City: <span class="mp-right"><?php
                                echo $customer->getCity();
                            ?></span>
            </div>
            <div class="item">
                Country: <span class="mp-right"><?php
                                echo $customer->getCountry();
                            ?></span>
            </div>
            <div class="item">
                Phone: <span class="mp-right"><?php
                                echo $customer->getPhone();
                            ?></span>
            </div>
        </div>
        <div class="list card mp-info-card">
            <div class="item item-divider mp-card-divider">
                <h2><b>Education</b></h2>
            </div>
            <div class="item mp-card-first-item">
                University: <span class="mp-right"><?php
                                echo $customer->getUniversity();
                            ?></span>
            </div>
            <div class="item">
                Highschool: <span class="mp-right"><?php
                                echo $customer->getHighschool();
                            ?></span>
            </div>
            <div class="item">
                Job: <span class="mp-right"><?php
                                echo $customer->getJob();
                            ?></span>
            </div>
            <div class="item">
                Company: <span class="mp-right"><?php
                                echo $customer->getCompany();
                            ?></span>
            </div>
        </div>
    </div>
</body>
</html>