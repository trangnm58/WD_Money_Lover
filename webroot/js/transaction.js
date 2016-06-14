if ($("#transaction-list>ul li").length == 0) {
	$("#transaction-list>ul").append('<span>No transaction. Add more!</span>');
}

var openTransactionForm = function() {
	// show form
	$("#transaction-form").toggle();
	// hide list
	$("#transaction-list").toggle();
}

var backToList = function() {
	// hide form
	$("#transaction-form").toggle();
	
	// clear all form fields
	$('#transaction-form').trigger("reset");
	
	// show list
	$("#transaction-list").toggle();
}

var showDetails = function() {
	
}

var addTransaction = function() {
	// month array
	var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	
	// use Ajax to delete notification with "id"
	var money = $("#money").val();
	var unit  = $("#unit").val();
	var unit_name = $("#unit option:selected").text();
	var category = $("#category option:selected").val();
	var category_name = $("#category option:selected").text();
	var wallet = $("#wallet option:selected").val();
	var wallet_name = $("#wallet option:selected").text();
	var note = $("#note").val();
	var date = $("#date").val();
	var d = new Date(date);
	var d_date = d.getDate();
	if (d_date < 10) {
		d_date = "0" + d_date;
	}

	$.post("/api/add-transaction", {money: money, unit: unit, category: category, wallet: wallet, note: note, date: date}, function(data, status) {
		if (data) {
			$("#transaction-list ul").append(
				'<li id="trans-id-' + data + '" class="list-group-item" onclick="showDetails(' + data + ')"><table><tr class="date"><td class="d">' + d_date + '</td><td class="my">' + months[d.getMonth()] + ' ' + d.getFullYear() + '</td><td class="wallet">' + wallet_name + '</td></tr><tr class="details"><td><img src="img/icon.png" alt="category image"/></td><td class="category">' + category_name + '</td><td class="money">' + money + ' ' + unit_name + '</td></tr></table></li>'
			);
		}
    });
	
	backToList();
	return false;
}

var prevMonth = function() {
	console.log(true);
}

var nextMonth = function() {
	console.log(true);
}