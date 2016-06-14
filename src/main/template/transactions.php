<div id="transaction-list">
	<div>
		<i class="fa fa-chevron-left" aria-hidden="true" onclick="prevMonth()"></i>
		<span><?php echo $currentDate->format("m") . '-' . $currentDate->format("Y"); ?></span>
		<i class="fa fa-chevron-right" aria-hidden="true" onclick="nextMonth()"></i>
	</div>

	<button id="new-transaction" type="button" data-toggle="modal" data-target="#transaction-form">+</button>

	<ul class="list-group">
		<?php
			foreach ($transactions as $t) {
				$date = new DateTime($t["transaction"]["time"]);
				echo '<button type="button" id="trans-id-' . $t["transaction"]["id"] . '" class="list-group-item"  data-toggle="modal" data-target="#transaction-detail"
							data-id="' . $t["transaction"]["id"] . '"
							data-money="' . $t["transaction"]["amount"] . '"
							data-unit="' . $t["unit"]["id"] . '"
							data-category="' . $t["category"]["id"] . '"
							data-wallet="' . $t["wallet"]["id"] . '"
							data-time="' . $date->format("Y-m-d") . '"
							data-description="' . $t["transaction"]["description"] . '">
						<table>
							<tr class="date">
								<td class="d">' . $date->format("d") . '</td>
								<td class="my">' . $date->format("F Y") . '</td>
								<td class="wallet">' . $t["wallet"]["name"] . '</td>
							</tr>
							<tr class="details">
								<td><img src="img/icon.png" alt="category image"/></td>
								<td class="category">' . $t["category"]["name"] . '</td>
								<td class="money">' . $t["transaction"]["amount"] . ' ' . $t["unit"]["name"] . '</td>
							</tr>
						</table>
					</button>';
			}
		?>
	</ul>
</div>


<!-- Create new transaction modal -->
<form id="transaction-form" class="modal fade" method="post" onsubmit="return false;" style="display:none">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Create New Transaction</h4>
			</div>
			<div class="modal-body">
				<span class="error-log" id="money-error"></span>
				<label for="money">Money</label>
				<input type="number" value="" id="money" name="money" required onfocusout="checkMoney(this)" onfocus="clearErrorMessage(this)" autofocus="true" />
				
				<label for="unit">Unit</label>
				<select id="unit" name="unit">
					<?php
						foreach($units as $u) {
							echo "<option value='".$u->getId()."'>".$u->getName()."</option>";
						}
					?>	
				</select>

				<label for="category">Category</label>
				<select id="category" name="category">
					<?php
						foreach($categories as $c) {
							echo "<option value='".$c->getId()."'>".$c->getName()."</option>";
						}
					?>
				</select>

				<label for="wallet">Wallet</label>
				<select id="wallet" name="wallet">
					<?php
						foreach($wallets as $w) {
							echo "<option value='".$w->getId()."'>".$w->getName()."</option>";
						}
					?>
				</select>

				<label for="note">Note</label>
				<textarea id="note" name="note"></textarea>
				
				<span class="error-log" id="date-error"></span>
				<label for="date">Date</label>
				<input type="date" id="date" name="date" required onfocusout="checkDate(this)" onfocus="clearErrorMessage(this)"/>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" onclick="resetForm()">CANCEL</button>
				<button type="submit" onclick="addTransaction()" data-dismiss="modal">CREATE</button>
			</div>
		</div>
	</div>
</form>


<!-- Transaction's details modal -->
<form id="transaction-detail" class="modal fade" method="post" onsubmit="return false;" style="display:none">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" onclick="resetForm()">&times;</button>
				<h4 class="modal-title">Transaction Details</h4>
			</div>
			<div class="modal-body">
				<span class="error-log" id="money-error"></span>
				<label for="money">Money</label>
				<input type="number" value="" id="money" name="money" required onfocusout="checkMoney(this)" onfocus="clearErrorMessage(this)" autofocus="true" />
				
				<label for="unit">Unit</label>
				<select id="unit" name="unit">
					<?php
						foreach($units as $u) {
							echo "<option value='".$u->getId()."'>".$u->getName()."</option>";
						}
					?>	
				</select>

				<label for="category">Category</label>
				<select id="category" name="category">
					<?php
						foreach($categories as $c) {
							echo "<option value='".$c->getId()."'>".$c->getName()."</option>";
						}
					?>
				</select>

				<label for="wallet">Wallet</label>
				<select id="wallet" name="wallet">
					<?php
						foreach($wallets as $w) {
							echo "<option value='".$w->getId()."'>".$w->getName()."</option>";
						}
					?>
				</select>

				<label for="note">Note</label>
				<textarea id="note" name="note"></textarea>
				
				<span class="error-log" id="date-error"></span>
				<label for="date">Date</label>
				<input type="date" id="date" name="date" required onfocusout="checkDate(this)" onfocus="clearErrorMessage(this)"/>
			</div>
			<div class="modal-footer">
				<input type="hidden" id="trans-id"/>
				<button type="button" data-dismiss="modal" onclick="deleteTransaction()">DELETE</button>
				<button type="submit" onclick="saveTransaction()" data-dismiss="modal">SAVE</button>
			</div>
		</div>
	</div>
</form>
