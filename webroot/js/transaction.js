var checkEmptyList = function() {
	if ($("#transaction-list>ul li").length == 0) {
		$("#transaction-list>ul").append('<span>No transaction. Add more!</span>');
	} else {
		$("#transaction-list>ul").find("span:first-child").remove();
	}
}

checkEmptyList();

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

// month array
var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

var addTransaction = function() {
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

	var currentMonth = $("#transaction-list>div>span").text().slice(0, 2);
	var currentYear = $("#transaction-list>div>span").text().slice(3, 7);
	$.post("/api/add-transaction", {money: money, unit: unit, category: category, wallet: wallet, note: note, date: date}, function(data, status) {
		if (data && (d.getMonth() + 1) == currentMonth && d.getFullYear() == currentYear) {
			// find insert location
			var lis = $("#transaction-list li");
			var last = true;
			for (i = 0; i < lis.length; i++) {
				if (lis.children("span")[i].innerHTML < d_date) {
					$(
						'<li id="trans-id-' + data +'" class="list-group-item" onclick="showDetails(' + data + ')"><span style="display:none">' + d_date + '</span><table><tr class="date"><td class="d">' + d_date + '</td><td class="my">' + months[d.getMonth()] + ' ' + d.getFullYear() + '</td><td class="wallet">' + wallet_name + '</td></tr><tr class="details"><td><img src="img/icon.png" alt="category image"/></td><td class="category">' + category_name + '</td><td class="money">' + money + ' ' + unit_name + '</td></tr></table></li>'
					).insertBefore("#" + lis[i].id);
					last = false;
					break;
				}
			}
			if (last) {
				$("#transaction-list>ul").append(
					'<li id="trans-id-' + data +'" class="list-group-item" onclick="showDetails(' + data + ')"><span style="display:none">' + d_date + '</span><table><tr class="date"><td class="d">' + d_date + '</td><td class="my">' + months[d.getMonth()] + ' ' + d.getFullYear() + '</td><td class="wallet">' + wallet_name + '</td></tr><tr class="details"><td><img src="img/icon.png" alt="category image"/></td><td class="category">' + category_name + '</td><td class="money">' + money + ' ' + unit_name + '</td></tr></table></li>'
				);
			}
		}
		checkEmptyList();
    });
	backToList();
	return false;
}

var prevMonth = function() {
	// get current month from html
	var date_string = $("#transaction-list>div>span").text();
	var d = new Date(date_string.slice(3, 7) + "-" + date_string.slice(0, 2) + "-01");
	// minus 1
	d.setMonth(d.getMonth() - 1); // previous month
	// send request to server
	$.get("/api/get-transaction/month/" + (d.getMonth() + 1) + "/" + d.getFullYear(), function (data) {
		// change month
		var month = d.getMonth() + 1;
		if (month < 10) month = "0" + month;
		$("#transaction-list>div>span").text(month + "-" + d.getFullYear());
		// delete current list
		$("#transaction-list>ul").empty();
		// write new list
		for (i = 0; i < data.length; i++) {
			var date = new Date(data[i]["transaction"]["time"]);
			var d_ = date.getDate();
			if (d_ < 10) {
				d_ = "0" + d_;
			}
			var m = months[date.getMonth()];
			var y = date.getFullYear();
			$("#transaction-list>ul").append('<li id="trans-id-' + data[i]["transaction"]["id"] + '" class="list-group-item" onclick="showDetails(' + data[i]["transaction"]["id"] + ')"><span style="display:none">' + d_ + '</span><table><tr class="date"><td class="d">' + d_ + '</td><td class="my">' + m + " " + y + '</td><td class="wallet">' + data[i]["wallet"]["name"] + '</td></tr><tr class="details"><td><img src="img/icon.png" alt="category image"/></td><td class="category">' + data[i]["category"]["name"] + '</td><td class="money">' + data[i]["transaction"]["amount"] + ' ' + data[i]["unit"]["name"] + '</td></tr></table></li>');
		}
		checkEmptyList();
	}, "json");
}

var nextMonth = function() {
	// get current month from html
	var date_string = $("#transaction-list>div>span").text();
	var d = new Date(date_string.slice(3, 7) + "-" + date_string.slice(0, 2) + "-01");
	// minus 1
	d.setMonth(d.getMonth() + 1); // next month
	// send request to server
	$.get("/api/get-transaction/month/" + (d.getMonth() + 1) + "/" + d.getFullYear(), function (data) {
		// change month
		var month = d.getMonth() + 1;
		if (month < 10) month = "0" + month;
		$("#transaction-list>div>span").text(month + "-" + d.getFullYear());
		// delete current list
		$("#transaction-list>ul").empty();
		// write new list
		for (i = 0; i < data.length; i++) {
			var date = new Date(data[i]["transaction"]["time"]);
			var d_ = date.getDate();
			if (d_ < 10) {
				d_ = "0" + d_;
			}
			var m = months[date.getMonth()];
			var y = date.getFullYear();
			$("#transaction-list>ul").append('<li id="trans-id-' + data[i]["transaction"]["id"] + '" class="list-group-item" onclick="showDetails(' + data[i]["transaction"]["id"] + ')"><span style="display:none">' + d_ + '</span><table><tr class="date"><td class="d">' + d_ + '</td><td class="my">' + m + " " + y + '</td><td class="wallet">' + data[i]["wallet"]["name"] + '</td></tr><tr class="details"><td><img src="img/icon.png" alt="category image"/></td><td class="category">' + data[i]["category"]["name"] + '</td><td class="money">' + data[i]["transaction"]["amount"] + ' ' + data[i]["unit"]["name"] + '</td></tr></table></li>');
		}
		checkEmptyList();
	}, "json");
}
