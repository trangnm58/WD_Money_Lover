<div id="wallet-container" style="">

        <div id="side-menu-item-list" class="list-group">
            <h4>
                <strong>Included in total</strong>
            </h4>
            <div class ="included-in-total">  
                <?php foreach ($listWallet as $row=>$wallet):?>             
                <a class="list-group-item total each-wallet" id = <?php echo $wallet['id']; ?> data-toggle="modal" data-target="#editWallet" href="#" onclick="getWalletInfo(<?php echo $wallet['id']; ?>)"> 
                    <?php echo '<i class=" fa '.$wallet['type'].' fa-2x " aria-hidden="true" > '  ;?> </i>
                    <div class="each-wallet-info">
                        <strong>                        
                            <?php 
                                echo $wallet['name'];
                            ?>                            
                        </strong>
                        <p>
                            <?php 
                                echo $wallet['unit_name'].' '.$wallet['amount'];
                            ?>
                        </p>
                    </div>
                </a>                
            <?php endforeach;?>
            </div>

        </div>
		<button id="new-transaction"  data-toggle="modal" data-target="#createWallet">+</button>

    </div>
    
    
    <div class="modal fade" id="createWallet" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style=" margin-top: 50px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Wallet</h4>
                </div>
                <div class="modal-body">
                    <form onsubmit= "addWallet(this);" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                            <br>
                            <input type="text" class="form-control" name = "amount" placeholder="Amount (*)">
                            <br>
                            <input type="text" class="form-control" name = "unitId" placeholder="Unit (*)">
                            <br>
                            <input type="text" class="form-control" name = "unitId" placeholder="Description">
                            <br>                                                                            
                            <select class="form-control" name = "icon"namespace = "Type">
                                <option value="fa-money">Cash</option>
                                <option value="fa-credit-card-alt">Card</option>
                                <option value="fa-google-wallet">Other</option>                               
                            </select>
                        </li>
                        </div>                        
                    </form>
                </div>
                <div class="modal-footer">                    
                    <button type="button" class="btn btn-default" data-dismiss="modal"><strong>ADD</strong></button>
                </div>
            </div>
        </div>
    </div>
</div>