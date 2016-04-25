<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Recurring Transaction'), ['action' => 'edit', $recurringTransaction->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Recurring Transaction'), ['action' => 'delete', $recurringTransaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recurringTransaction->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Recurring Transactions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recurring Transaction'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Wallets'), ['controller' => 'Wallets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Wallet'), ['controller' => 'Wallets', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorys'), ['controller' => 'Categorys', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categorys', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="recurringTransactions view large-9 medium-8 columns content">
    <h3><?= h($recurringTransaction->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Account') ?></th>
            <td><?= $recurringTransaction->has('account') ? $this->Html->link($recurringTransaction->account->id, ['controller' => 'Accounts', 'action' => 'view', $recurringTransaction->account->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Unit') ?></th>
            <td><?= $recurringTransaction->has('unit') ? $this->Html->link($recurringTransaction->unit->name, ['controller' => 'Units', 'action' => 'view', $recurringTransaction->unit->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Wallet') ?></th>
            <td><?= $recurringTransaction->has('wallet') ? $this->Html->link($recurringTransaction->wallet->name, ['controller' => 'Wallets', 'action' => 'view', $recurringTransaction->wallet->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Category') ?></th>
            <td><?= $recurringTransaction->has('category') ? $this->Html->link($recurringTransaction->category->name, ['controller' => 'Categorys', 'action' => 'view', $recurringTransaction->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($recurringTransaction->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($recurringTransaction->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Amount') ?></th>
            <td><?= $this->Number->format($recurringTransaction->amount) ?></td>
        </tr>
        <tr>
            <th><?= __('Repeat Type') ?></th>
            <td><?= $this->Number->format($recurringTransaction->repeat_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Every') ?></th>
            <td><?= $this->Number->format($recurringTransaction->every) ?></td>
        </tr>
        <tr>
            <th><?= __('From Date') ?></th>
            <td><?= h($recurringTransaction->from_date) ?></td>
        </tr>
        <tr>
            <th><?= __('To Date') ?></th>
            <td><?= h($recurringTransaction->to_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Created At') ?></th>
            <td><?= h($recurringTransaction->created_at) ?></td>
        </tr>
        <tr>
            <th><?= __('Monthly') ?></th>
            <td><?= $recurringTransaction->monthly ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Weekly') ?></h4>
        <?= $this->Text->autoParagraph(h($recurringTransaction->weekly)); ?>
    </div>
</div>
