<div id="transaction-list">
	<div>
		<i class="fa fa-chevron-left" aria-hidden="true" onclick=""></i>
		<span><?php echo $month; ?></span>
		<i class="fa fa-chevron-right" aria-hidden="true" onclick=""></i>
	</div>

	<button id="new-transaction" type="button" onclick="openTransactionForm()">+</button>

	<ul class="list-group">
		<!-- Danh sach transactions o day -->
		<li class="list-group-item">
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
		<li class="list-group-item">
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
		<li class="list-group-item">
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
		<li class="list-group-item">
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
		<li class="list-group-item">
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
		<li class="list-group-item">
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
		<li class="list-group-item">
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
		<li class="list-group-item">
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
		<li class="list-group-item">
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


<form id="transaction-form" method="post" action="/api/create-transaction" style="display:none">
	<label for="money">Money</label>
	<input type="number" value="0" id="money" name="money" />
	
	<label for="unit">Unit</label>
	<input type="text" value="VND" id="unit" name="unit" />
	
	<label for="category">Category</label>
	<select id="category" name="category">
		<!-- Danh sach cac Category o day -->
		<option value="Expend">Expend</option>
	</select>
	
	<label for="wallet">Wallet</label>
	<select id="wallet" name="wallet">
		<!-- Danh sach cac Wallet o day -->
		<option value="Cash">Cash</option>
	</select>
	
	<label for="note">Note</label>
	<textarea id="note" name="note"></textarea>
	
	<label for="date">Date</label>
	<input type="date" id="date" name="date" />
	
	<button type="submit">CREATE</button>
	<button type="button" onclick="backToList()">CANCEL</button>
</form>
