<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Recurring Transaction'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Wallets'), ['controller' => 'Wallets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Wallet'), ['controller' => 'Wallets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorys'), ['controller' => 'Categorys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categorys', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recurringTransactions index large-9 medium-8 columns content">
    <h3><?= __('Recurring Transactions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('account_id') ?></th>
                <th><?= $this->Paginator->sort('amount') ?></th>
                <th><?= $this->Paginator->sort('unit_id') ?></th>
                <th><?= $this->Paginator->sort('wallet_id') ?></th>
                <th><?= $this->Paginator->sort('category_id') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('repeat_type') ?></th>
                <th><?= $this->Paginator->sort('from_date') ?></th>
                <th><?= $this->Paginator->sort('to_date') ?></th>
                <th><?= $this->Paginator->sort('every') ?></th>
                <th><?= $this->Paginator->sort('monthly') ?></th>
                <th><?= $this->Paginator->sort('created_at') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recurringTransactions as $recurringTransaction): ?>
            <tr>
                <td><?= $this->Number->format($recurringTransaction->id) ?></td>
                <td><?= $recurringTransaction->has('account') ? $this->Html->link($recurringTransaction->account->id, ['controller' => 'Accounts', 'action' => 'view', $recurringTransaction->account->id]) : '' ?></td>
                <td><?= $this->Number->format($recurringTransaction->amount) ?></td>
                <td><?= $recurringTransaction->has('unit') ? $this->Html->link($recurringTransaction->unit->name, ['controller' => 'Units', 'action' => 'view', $recurringTransaction->unit->id]) : '' ?></td>
                <td><?= $recurringTransaction->has('wallet') ? $this->Html->link($recurringTransaction->wallet->name, ['controller' => 'Wallets', 'action' => 'view', $recurringTransaction->wallet->id]) : '' ?></td>
                <td><?= $recurringTransaction->has('category') ? $this->Html->link($recurringTransaction->category->name, ['controller' => 'Categorys', 'action' => 'view', $recurringTransaction->category->id]) : '' ?></td>
                <td><?= h($recurringTransaction->description) ?></td>
                <td><?= $this->Number->format($recurringTransaction->repeat_type) ?></td>
                <td><?= h($recurringTransaction->from_date) ?></td>
                <td><?= h($recurringTransaction->to_date) ?></td>
                <td><?= $this->Number->format($recurringTransaction->every) ?></td>
                <td><?= h($recurringTransaction->monthly) ?></td>
                <td><?= h($recurringTransaction->created_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $recurringTransaction->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $recurringTransaction->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $recurringTransaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recurringTransaction->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
