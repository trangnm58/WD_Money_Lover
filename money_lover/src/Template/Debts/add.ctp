<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Debts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Wallets'), ['controller' => 'Wallets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Wallet'), ['controller' => 'Wallets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="debts form large-9 medium-8 columns content">
    <?= $this->Form->create($debt) ?>
    <fieldset>
        <legend><?= __('Add Debt') ?></legend>
        <?php
            echo $this->Form->input('account_id', ['options' => $accounts]);
            echo $this->Form->input('debt_type');
            echo $this->Form->input('amount');
            echo $this->Form->input('paid');
            echo $this->Form->input('description');
            echo $this->Form->input('time');
            echo $this->Form->input('wallet_id', ['options' => $wallets]);
            echo $this->Form->input('event_id', ['options' => $events]);
            echo $this->Form->input('partner');
            echo $this->Form->input('created_at');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
