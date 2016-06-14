<div id="transaction-list">
	<div>
		<i class="fa fa-chevron-left" aria-hidden="true" onclick="prevMonth()"></i>
		<span><?php echo $currentDate->format("m") . '-' . $currentDate->format("Y"); ?></span>
		<i class="fa fa-chevron-right" aria-hidden="true" onclick="nextMonth()"></i>
	</div>

	<button id="new-transaction" type="button" onclick="openTransactionForm()">+</button>

	<ul class="list-group">
		<?php
			foreach ($transactions as $t) {
				$date = new DateTime($t["transaction"]["time"]);
				echo '<li id="trans-id-' . $t["transaction"]["id"] . '" class="list-group-item" onclick="showDetails(' . $t["transaction"]["id"] . ')">
						<span style="display:none">' . $date->format("d") . '</span>
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
					</li>';
			}
		?>
	</ul>
</div>


<form id="transaction-form" method="post" onsubmit="return false;" style="display:none">
	<label for="money">Money</label>
	<input type="number" value="0" id="money" name="money" />
	
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

	<label for="date">Date</label>
	<input type="date" id="date" name="date" />

	<button type="submit" onclick="addTransaction()">CREATE</button>
	<button type="button" onclick="backToList()">CANCEL</button>
</form>
