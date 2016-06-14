<div id="change-password-container">
    <div id="alert-success" class="alert alert-success alert-dismissible" role="alert"></div>
    <div id="alert-danger" class="alert alert-danger alert-dismissible" role="alert"></div>
    <form id="changePasswordForm" class="edit-form" method="post" onsubmit="return changePassword(this)">
        <div class="edit-input">
            <span class="error-log" id="old-password-error"></span>
            <label for="old-password">Old Password</label>
            <input type="password" id="old-password" name="old-password" placeholder="Old Password" required onfocusout="checkOldPassword(this)" onfocus="clearErrorMessage(this)" autofocus="true" />
        </div>
        <div class="edit-input">
            <span class="error-log" id="new-password-error"></span>
            <label for="new-password">New Password</label>
            <input type="password" id="new-password" name="new-password" placeholder="New Password" required onfocusout="checkNewPassword(this)" onfocus="clearErrorMessage(this)"/>
        </div>
        <div class="edit-input">
            <span class="error-log" id="retype-password-error"></span>
            <label for="re-password">Retype Password</label>
            <input type="password" id="re-password" name="re-password" placeholder="Retype Password" required onkeyup="checkRetypePassword(this)" onfocus="clearErrorMessage(this)"/>
        </div>

        <input type="submit" class="save-btn" name="submit" value="Save" />
    </form>
</div>