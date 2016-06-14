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
	return true;
}

var prevMonth = function() {
	
}

var nextMonth = function() {
	
}