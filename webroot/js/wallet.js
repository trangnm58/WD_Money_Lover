var checkEmptyList = function() {
    if ($("wallet-container > a").length == 0) {
        $("wallet-container").append(
            '<span>No transaction. Add more!</span>');
    } else {
        $("#wallet-container").find("span:first-child").remove();
    }
}

function addWallet() {
    form = document.getElementById('add-wallet');
    name = $("#name").val(); //van null
    amount = $("#amount").val();
    unit = $("#unit").val();
    unit_name = $("#unit option:selected").text();
    description = $("#description").val();
    unit_name = $("#unit_id option:selected").text()
    type = $("#type").val();
    $.post("/api/add-wallet", {
        type: type,
        name: name,
        amount: amount,
        unit: unit,
        description: description
    }, function(data, status) {
        $("#wallet-container").append(
            '<a class="list-group-item total each-wallet" id ="' +
            data["id"] +
            '"  data-toggle="modal" data-target="#manageWallet"> <i class=" fa ' +
            type +
            ' fa-2x " aria-hidden="true" > </i> <div class="each-wallet-info"> <strong>' +
            name + '</strong> <p>' + unit_name + ' ' + amount +
            ' </p>  </div> </a>');
    });
    backToList();
    return false;
}

function saveEditWallet() {
    form = document.getElementById('editWallet');
    name = form.elements.namedItem('_name').value;
    amount = form.elements.namedItem('_amount').value;
    unit_id = form.elements.namedItem('gender').value;
    description = form.elements.namedItem('_description').value;
    type = form.elements.namedItem('_type').value;
    data = {
        name: name,
        amount: amount,
        unit_id: unit_id,
        description: description,
        type: type
    };
    $.post('/api/update-wallet', data, function(data) {
        if (data == "SUCCESS") {
            alert("UPDATE SUCCESS");
        } else {
            alert("UPDATE FAILED");
        }
    });
}

function getWalletInfo(myself) {
    $.post("/api/get-wallet-Info", function(data) {});
}

function onclick() {}
var backToList = function() {
    // show list
    $(".included-in-total").toggle();
}
