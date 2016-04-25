<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $recurringTransaction->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $recurringTransaction->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Recurring Transactions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Wallets'), ['controller' => 'Wallets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Wallet'), ['controller' => 'Wallets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorys'), ['controller' => 'Categorys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categorys', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recurringTransactions form large-9 medium-8 columns content">
    <?= $this->Form->create($recurringTransaction) ?>
    <fieldset>
        <legend><?= __('Edit Recurring Transaction') ?></legend>
        <?php
            echo $this->Form->input('customer_id', ['options' => $customers]);
            echo $this->Form->input('amount');
            echo $this->Form->input('unit_id', ['options' => $units]);
            echo $this->Form->input('wallet_id', ['options' => $wallets]);
            echo $this->Form->input('category_id', ['options' => $categorys]);
            echo $this->Form->input('description');
            echo $this->Form->input('repeat_type');
            echo $this->Form->input('from_date');
            echo $this->Form->input('to_date', ['empty' => true]);
            echo $this->Form->input('every');
            echo $this->Form->input('monthly');
            echo $this->Form->input('weekly');
            echo $this->Form->input('created_at');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
