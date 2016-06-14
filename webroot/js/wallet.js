function addWallet(myself) {
	$.post("/api/add-wallet", function( data ) {
         alert("Add Wallet Successfully");
    });
}