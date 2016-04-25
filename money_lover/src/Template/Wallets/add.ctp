<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Wallets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Budgets'), ['controller' => 'Budgets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Budget'), ['controller' => 'Budgets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Debts'), ['controller' => 'Debts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Debt'), ['controller' => 'Debts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Recurring Transactions'), ['controller' => 'RecurringTransactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Recurring Transaction'), ['controller' => 'RecurringTransactions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="wallets form large-9 medium-8 columns content">
    <?= $this->Form->create($wallet) ?>
    <fieldset>
        <legend><?= __('Add Wallet') ?></legend>
        <?php
            echo $this->Form->input('customer_id', ['options' => $customers]);
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('icon');
            echo $this->Form->input('amount');
            echo $this->Form->input('unit_id', ['options' => $units]);
            echo $this->Form->input('created_at');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
