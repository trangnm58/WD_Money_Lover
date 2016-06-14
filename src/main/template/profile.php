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

        <a type="button" data-toggle="modal" data-target="#editContactInformation">
            <i aria-hidden="true" class="fa fa-pencil-square"></i>
            Edit
        </a>

        <div class="item mp-card-first-item">
            Address: <span id='info-address' class="mp-right"><?php
                            echo $customer->getAddress();
                        ?></span>
        </div>
        <div class="item">
            City: <span id='info-city' class="mp-right"><?php
                            echo $customer->getCity();
                        ?></span>
        </div>
        <div class="item">
            Country: <span id='info-country' class="mp-right"><?php
                            echo $customer->getCountry();
                        ?></span>
        </div>
        <div class="item">
            Email: <span class="mp-right"><?php
                            echo $customer->getEmail();
                        ?></span>
        </div>
        <div class="item">
            Phone: <span id='info-phone' class="mp-right"><?php
                            echo $customer->getPhone();
                        ?></span>
        </div>
    </div>

    <div class="modal fade" id="editContactInformation" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Contact Informations</h4>
                </div>
                <div class="modal-body">
                        <form id="editContactInformationForm" class="edit-form" method="post">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" value=<?php
                                echo '"'.$customer->getAddress().'"';
                            ?>/>

                            <label for="city">City</label>
                            <input type="text" id="city" name="city" value=<?php
                                echo '"'.$customer->getCity().'"';
                            ?>/>

                            <label for="country">Country</label>
                            <input type="text" id="country" name="country" value=<?php
                                echo '"'.$customer->getCountry().'"';
                            ?>/>

                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" value=<?php
                                echo '"'.$customer->getPhone().'"';
                            ?>/>
                        </form>
                </div>
                <div class="modal-footer">
                    <button class="cancel-btn" data-dismiss="modal">Cancel</button>
                    <button class="save-btn" onclick="saveEditContact()"  data-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="list card mp-info-card">
        <div type="button" class="item item-divider mp-card-divider">
            <h2><b>Education</b></h2>
        </div>

        <a type="button" data-toggle="modal" data-target="#editEducationInformation">
            <i aria-hidden="true" class="fa fa-pencil-square"></i>
            Edit
        </a>
        
        <div class="item mp-card-first-item">
            University: <span id='info-university' class="mp-right"><?php
                            echo $customer->getUniversity();
                        ?></span>
        </div>
        <div class="item">
            Highschool: <span id='info-highschool' class="mp-right"><?php
                            echo $customer->getHighschool();
                        ?></span>
        </div>
        <div class="item">
            Job: <span id='info-job' class="mp-right"><?php
                            echo $customer->getJob();
                        ?></span>
        </div>
        <div class="item">
            Company: <span id='info-company' class="mp-right"><?php
                            echo $customer->getCompany();
                        ?></span>
        </div>
    </div>

    <div class="modal fade" id="editEducationInformation" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Education Informations</h4>
                </div>
                <div class="modal-body">
                        <form id="editEducationInformationForm" class="edit-form" method="post">
                            <label for="university">University</label>
                            <input type="text" id="university" name="university" value=<?php
                                echo '"'.$customer->getUniversity().'"';
                            ?>/>

                            <label for="highschool">Highschool</label>
                            <input type="text" id="highschool" name="highschool" value=<?php
                                echo '"'.$customer->getHighschool().'"';
                            ?>/>

                            <label for="job">Job</label>
                            <input type="text" id="job" name="job" value=<?php
                                echo '"'.$customer->getJob().'"';
                            ?>/>

                            <label for="company">Company</label>
                            <input type="text" id="company" name="company" value=<?php
                                echo '"'.$customer->getCompany().'"';
                            ?>/>
                        </form>
                </div>
                <div class="modal-footer">
                    <button class="cancel-btn" data-dismiss="modal">Cancel</button>
                    <button class="save-btn" onclick="saveEditEducation()"  data-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>