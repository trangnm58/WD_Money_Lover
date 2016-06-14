<div id="transaction-list">
	<div>
		<i class="fa fa-chevron-left" aria-hidden="true" onclick="prevMonth()"></i>
		<span><?php echo $currentMonth; ?></span>
		<i class="fa fa-chevron-right" aria-hidden="true" onclick="nextMonth()"></i>
	</div>

	<button id="new-transaction" type="button" onclick="openTransactionForm()">+</button>

	<ul class="list-group">
		<!-- Danh sach transactions o day -->
		<?php echo var_dump($transactions); ?>
		<li class="list-group-item" onclick="showDetails()">
			<table>
				<tr class="date">
					<td class="d">13</td>
					<td class="my">June 2016</td>
					<td class="wallet">Cash</td>
				</tr>
				<tr class="details">
					<td><img src="img/icon.png" alt="category image"/></td>
					<td class="category">Transportation</td>
					<td class="money">12.000 VND</td>
				</tr>
			</table>
		</li>
	</ul>
</div>


<form id="transaction-form" method="post" action="/api/add-transaction" onsubmit="return addTransaction()" style="display:none">
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

	<button type="submit">CREATE</button>
	<button type="button" onclick="backToList()">CANCEL</button>
</form>
