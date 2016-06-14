<div id="wallet-container" style="">        
            <h4>
                <strong>Included in total</strong>
            </h4>
            
                <?php foreach ($listWallet as $wallet) {
                    echo '<a class="list-group-item total each-wallet" id ="' . $wallet['id'] . '"  data-toggle="modal" data-target="#editWallet"> <i class=" fa ' . $wallet['type'] .  ' fa-2x " aria-hidden="true" > </i> <div class="each-wallet-info"> <strong>' . $wallet['name'] . '</strong> <p>' . $wallet['unit_name'].' '. $wallet['amount'] . ' </p>  </div> </a>';

                } ?>               
        <button id="new-transaction"  data-toggle="modal" data-target="#createWallet">+</button>
    
    
    
    <div class="modal fade" id="createWallet" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style=" margin-top: 50px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Wallet</h4>
                </div>
                <div class="modal-body">
                    <form onsubmit= "addWallet(this);" method="post" class="edit-form" id ="add-wallet">
                    	<label for="name">Name</label>
                        <input type="text" id="name" name="name"/>
                        <label for="unit">Unit</label>
                         <select id="unit" name="unit">
							<?php
								foreach($units as $u) {
									echo '<option value="'.$u->getId().'">'.$u->getName()."</option>";
								}
                                
							?>	
						</select>
                       	<label for="amount">Amount</label>
						<input type="number" value="0" id="amount" name="amount" />
						<label for="description">Description</label>
                        <input type="text" id="description" name="description"/>
                        <label for="type">Type</label>
                        <select class="form-control" id ="type" name = "type">
                            <option value="fa-money">Cash</option>
                            <option value="fa-credit-card-alt">Card</option>
                            <option value="fa-google-wallet">Other</option>                               
                        </select>
                    </form>
                </div>
                <div class="modal-footer">                    
                    <button class="cancel-btn" data-dismiss="modal">Cancel</button>
                    <button class="save-btn" onclick="addWallet()"  data-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>

    
</div>