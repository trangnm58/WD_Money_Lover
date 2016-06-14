function addWallet(myself) {
	$.post("/api/add-wallet", function( data ) {
         alert("Add Wallet Successfully");
    });
}

function updateWalet(myself) {
	$.post("/api/add-wallet", function( data ) {
         alert("Edit Wallet Successfully");
    });
}

function getWalletInfo(myself) {
	$.post("/api/get-wallet-Info", function( data ) {
       
    });
}
function onclick() {
	
}