function changePassword(myself) {
    newPassword = myself.elements.namedItem("newpassword").value;
    $.post("/api/change-password", function(data) {
        alert(data);
    });
    return false;
}