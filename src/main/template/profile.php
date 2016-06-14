<div id="profile-container">
    <div id="alert-success" class="alert alert-success alert-dismissible" role="alert"></div>
    <div id="alert-danger" class="alert alert-danger alert-dismissible" role="alert"></div>
    <div class="list card mp-info-card">
        <div class="item item-divider mp-card-divider">
            <h2><b>Basic Information</b></h2>
        </div>

        <a type="button" data-toggle="modal" data-target="#editBasicInformation">
            <i aria-hidden="true" class="fa fa-pencil-square"></i>
            Edit
        </a>

        <div class="item mp-card-first-item">
            Full name: <span id='info-fname' class="mp-right"><?php
                            echo $customer->getName();
                        ?></span>
        </div>
        <div class="item">
            Username: <span class="mp-right"><?php
                            echo $customer->getUsername();
                        ?></span>
        </div>
        <div class="item">
            Date of Birth: <span id='info-dob' class="mp-right"><?php
                            echo $customer->getDob();
                        ?></span>
        </div>
        <div class="item">
            Gender: <span id='info-gender' class="mp-right"><?php
                            if($customer->getGender() == 1) {
                                echo "Male";
                            } else if($customer->getGender() == 2) {
                                echo "Female";
                            } else{
                                echo "Others";
                            }
                        ?></span>
        </div>
        <div class="item">
            Default Wallet: <span class="mp-right"><?php
                            echo $customer->getDefaultWallet();
                        ?></span>
        </div>
    </div>

    <div class="modal fade" id="editBasicInformation" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Basic Informations</h4>
                </div>
                <div class="modal-body">
                        <form id="editBasicInformationForm" class="edit-form" method="post">
                            <label for="fullname">Fullname</label>
                            <input type="text" id="fullname" name="fullname" value=<?php
                                echo '"'.$customer->getName().'"';
                            ?>/>
                            
                            <label for="dob">Date of Birth</label>
                            <input type="date" id="dob" name="dob" value=<?php
                                echo '"'.$customer->getDob().'"';
                            ?>/>

                            <label for="gender">Gender</label>
                            <select id="gender" name="gender">
                                <option value="1" <?php
                                    if($customer->getGender() == 1) {
                                        echo 'selected';
                                    }
                                ?>>
                                    Male
                                </option>
                                <option value="2" <?php
                                    if($customer->getGender() == 2) {
                                        echo 'selected';
                                    }
                                ?>>
                                    Female
                                </option>
                                <option value="3" <?php
                                    if($customer->getGender() == 3) {
                                        echo 'selected';
                                    }
                                ?>>
                                    Others
                                </option>
                            </select>
                        </form>
                </div>
                <div class="modal-footer">
                    <button class="cancel-btn" data-dismiss="modal">Cancel</button>
                    <button class="save-btn" onclick="saveEditBasic()"  data-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="list card mp-info-card">
        <div class="item item-divider mp-card-divider">
            <h2><b>Contact Information</b></h2>
        </div>

        <a onclick="editBasicInformation()">
            <i aria-hidden="true" class="fa fa-pencil-square"></i>
            Edit
        </a>

        
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
            Email: <span class="mp-right"><?php
                            echo $customer->getEmail();
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

        <a onclick="editBasicInformation()">
            <i aria-hidden="true" class="fa fa-pencil-square"></i>
            Edit
        </a>

        
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