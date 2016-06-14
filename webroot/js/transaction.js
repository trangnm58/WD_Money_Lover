// months array
var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

var checkEmptyList = function() {
	if ($("#transaction-list>ul button").length == 0) {
		if ($("#transaction-list>ul span").length == 0) {
			$("#transaction-list>ul").append('<span>No transaction. Add more!</span>');
		}
	} else {
		$("#transaction-list>ul").find("span:first-child").remove();
	}
}

// create a single button list item template for all functions to use
var itemButtonTemplate = function(t) {
	var m_str = t['m'] + 1;
	if (m_str < 10) {
		m_str = "0" + m_str;
	}
	return '<button type="button" id="trans-id-' + t['id'] +
		'" class="list-group-item" data-toggle="modal" data-target="#transaction-detail" data-id="' +
		t['id'] + '" data-money="' + t['money'] + '" data-unit="' + t['u_id'] +
		'" data-category="' + t['c_id'] + '" data-wallet="' + t['w_id'] +
		'" data-time="' + t['y'] + '-' + m_str + '-' + t['d'] +
		'" data-description="' + t['description'] + '"><table><tr class="date"><td class="d">' + t['d'] +
		'</td><td class="my">' + MONTHS[t['m']] + ' ' + t['y'] +
		'</td><td class="wallet">' + t['w_name'] +
		'</td></tr><tr class="details"><td><img src="img/icon.png" alt="category image"/></td><td class="category">' +
		t['c_name'] + '</td><td class="money">' + t['money'] + ' ' + t['u_name'] +
		'</td></tr></table></button>';
}

checkEmptyList();

check = [false, false];

function checkMoney(myself) {
    check[0] = false;
    if (myself.value == '') {
		$(myself.parentNode).find("#money-error").text('Money is required!');
    } else if (myself.value <= 0) {
        $(myself.parentNode).find("#money-error").text('Money must be greater than 0!');
    } else {
        $(myself.parentNode).find("#money-error").text('');
        check[0] = true;
    }
}

function checkDate(myself) {
    check[1] = false;
    if (myself.value == '') {
		$(myself.parentNode).find("#date-error").text('Date is required!');
    } else {
        $(myself.parentNode).find("#date-error").text('');
        check[1] = true;
    }
}

function clearErrorMessage(myself) {
    $(myself).text("");
}

function resetForm() {
	$('#transaction-form').trigger("reset");
}

function onTransactionDetailOpen() {
	$('#transaction-detail').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget); // Button that triggered the modal
		var id = button.data('id');
		var money = button.data('money');
		var unit = button.data('unit');
		var category = button.data('category');
		var wallet = button.data('wallet');
		var time = button.data('time');
		var description = button.data('description');
		
		var modal = $(this);
		modal.find('#trans-id').val(id);
		modal.find('#money').val(money);
		
		// find the options matched and select it
		modal.find('#unit').children().removeAttr("selected");
		$("#transaction-detail #unit option[value='" + unit + "']").attr("selected", true);
		
		modal.find('#category').children().removeAttr("selected");
		$("#transaction-detail #category option[value='" + category + "']").attr("selected", true);
		
		modal.find('#wallet').children().removeAttr("selected");
		$("#transaction-detail #wallet option[value='" + wallet + "']").attr("selected", true);
		
		modal.find('#date').val(time);
		modal.find('#note').val(description);
	});
}

onTransactionDetailOpen();


/**
 * Use Ajax to add new transaction
 */
var addTransaction = function() {
	if (!check[0]) {
        $("#transaction-form #money-error").text('Money is invalid!');
    } else if (!check[1]) {
        $("#transaction-form #date-error").text('Date is invalid!');
    } else {
        var money = $("#transaction-form #money").val();
		var unit  = $("#transaction-form #unit").val();
		var unit_name = $("#transaction-form #unit option:selected").text();
		var category = $("#transaction-form #category option:selected").val();
		var category_name = $("#transaction-form #category option:selected").text();
		var wallet = $("#transaction-form #wallet option:selected").val();
		var wallet_name = $("#transaction-form #wallet option:selected").text();
		var note = $("#transaction-form #note").val();
		var date = $("#transaction-form #date").val();
		var d = new Date(date);
		var d_date = d.getDate();
		if (d_date < 10) {
			d_date = "0" + d_date;
		}
		
		var currentMonth = $("#transaction-list>div>span").text().slice(0, 2);
		var currentYear = $("#transaction-list>div>span").text().slice(3, 7);
		$.post("/api/add-transaction", {money: money, unit: unit, category: category, wallet: wallet, note: note, date: date}, function(data, status) {
			if (data != 0 && (d.getMonth() + 1) == currentMonth && d.getFullYear() == currentYear) {
				// find insert location
				var btns = $("#transaction-list .list-group-item");
				var last = true;
				for (i = 0; i < btns.length; i++) {
					if (btns[i].innerText.slice(0, 2) < d_date) {
						$(itemButtonTemplate({
							id: data["id"],
							d: d_date,
							m: d.getMonth(),
							y: d.getFullYear(),
							w_name: wallet_name,
							c_name: category_name,
							u_name: unit_name,
							money: money,
							w_id: data['wallet_id'],
							c_id: data['category_id'],
							u_id: data['u_id'],
							description: data['description']
						})).insertBefore("#" + btns[i].id);
						last = false;
						break;
					}
				}
				if (last) {
					$("#transaction-list>ul").append(
						itemButtonTemplate({
							id: data["id"],
							d: d_date,
							m: d.getMonth(),
							y: d.getFullYear(),
							w_name: wallet_name,
							c_name: category_name,
							u_name: unit_name,
							money: money,
							w_id: data['wallet_id'],
							c_id: data['category_id'],
							u_id: data['u_id'],
							description: data['description']
						})
					);
				}
			}
			checkEmptyList();
		}, "json");
		resetForm();
    }
}

var deleteTransaction = function() {
	// use Ajax to delete transaction with "id"
	// find id
	var id = $("#transaction-detail #trans-id").val();
	$.post("/api/delete-transaction", {id: id}, function(data, status) {
		if (data) {
			$("#trans-id-" + id).remove();
		}
		checkEmptyList();
    });
}

var saveTransaction = function() {
	if (!check[0]) {
        $("#transaction-detail #money-error").text('Money is invalid!');
    } else if (!check[1]) {
        $("#transaction-detail #date-error").text('Date is invalid!');
    } else {
		// no errors at all
		// delete the old one
		deleteTransaction();
		// create the new one
        var money = $("#transaction-detail #money").val();
		var unit  = $("#transaction-detail #unit").val();
		var unit_name = $("#transaction-detail #unit option:selected").text();
		var category = $("#transaction-detail #category option:selected").val();
		var category_name = $("#transaction-detail #category option:selected").text();
		var wallet = $("#transaction-detail #wallet option:selected").val();
		var wallet_name = $("#transaction-detail #wallet option:selected").text();
		var note = $("#transaction-detail #note").val();
		var date = $("#transaction-detail #date").val();
		var d = new Date(date);
		var d_date = d.getDate();
		if (d_date < 10) {
			d_date = "0" + d_date;
		}
		
		var currentMonth = $("#transaction-list>div>span").text().slice(0, 2);
		var currentYear = $("#transaction-list>div>span").text().slice(3, 7);
		
		$.post("/api/add-transaction", {money: money, unit: unit, category: category, wallet: wallet, note: note, date: date}, function(data, status) {
			if (data != 0 && (d.getMonth() + 1) == currentMonth && d.getFullYear() == currentYear) {
				// find insert location
				var btns = $("#transaction-list .list-group-item");
				var last = true;
				for (i = 0; i < btns.length; i++) {
					if (btns[i].innerText.slice(0, 2) < d_date) {
						$(itemButtonTemplate({
							id: data["id"],
							d: d_date,
							m: d.getMonth(),
							y: d.getFullYear(),
							w_name: wallet_name,
							c_name: category_name,
							u_name: unit_name,
							money: money,
							w_id: data['wallet_id'],
							c_id: data['category_id'],
							u_id: data['u_id'],
							description: data['description']
						})).insertBefore("#" + btns[i].id);
						last = false;
						break;
					}
				}
				if (last) {
					$("#transaction-list>ul").append(
						itemButtonTemplate({
							id: data["id"],
							d: d_date,
							m: d.getMonth(),
							y: d.getFullYear(),
							w_name: wallet_name,
							c_name: category_name,
							u_name: unit_name,
							money: money,
							w_id: data['wallet_id'],
							c_id: data['category_id'],
							u_id: data['u_id'],
							description: data['description']
						})
					);
				}
			}
			checkEmptyList();
		}, "json");
    }
}
/**
 * Use Ajax to load all transactions in the previous month
 */
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
			var y = date.getFullYear();
			$("#transaction-list>ul").append(
				itemButtonTemplate({
					id: data[i]["transaction"]["id"],
					d: d_,
					m: date.getMonth(),
					y: y,
					w_name: data[i]["wallet"]["name"],
					c_name: data[i]["category"]["name"],
					u_name: data[i]["unit"]["name"],
					money: data[i]["transaction"]["amount"],
					w_id: data[i]["transaction"]["wallet_id"],
					c_id: data[i]["transaction"]["category_id"],
					u_id: data[i]["transaction"]["unit_id"],
					description: data[i]["transaction"]["description"]
				})
			);
		}
		checkEmptyList();
	}, "json");
}

/**
 * Use Ajax to load all transactions in the next month
 */
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
			var y = date.getFullYear();
			$("#transaction-list>ul").append(
				itemButtonTemplate({
					id: data[i]["transaction"]["id"],
					d: d_,
					m: date.getMonth(),
					y: y,
					w_name: data[i]["wallet"]["name"],
					c_name: data[i]["category"]["name"],
					u_name: data[i]["unit"]["name"],
					money: data[i]["transaction"]["amount"],
					w_id: data[i]["transaction"]["wallet_id"],
					c_id: data[i]["transaction"]["category_id"],
					u_id: data[i]["transaction"]["unit_id"],
					description: data[i]["transaction"]["description"]
				})
			);
		}
		checkEmptyList();
	}, "json");
}
