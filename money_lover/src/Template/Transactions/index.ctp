<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Transaction'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Wallets'), ['controller' => 'Wallets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Wallet'), ['controller' => 'Wallets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorys'), ['controller' => 'Categorys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categorys', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transactions index large-9 medium-8 columns content">
    <h3><?= __('Transactions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th><?= $this->Paginator->sort('amount') ?></th>
                <th><?= $this->Paginator->sort('unit_id') ?></th>
                <th><?= $this->Paginator->sort('wallet_id') ?></th>
                <th><?= $this->Paginator->sort('category_id') ?></th>
                <th><?= $this->Paginator->sort('time') ?></th>
                <th><?= $this->Paginator->sort('event_id') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('location') ?></th>
                <th><?= $this->Paginator->sort('partner') ?></th>
                <th><?= $this->Paginator->sort('created_at') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactions as $transaction): ?>
            <tr>
                <td><?= $this->Number->format($transaction->id) ?></td>
                <td><?= $transaction->has('customer') ? $this->Html->link($transaction->customer->id, ['controller' => 'Customers', 'action' => 'view', $transaction->customer->id]) : '' ?></td>
                <td><?= $this->Number->format($transaction->amount) ?></td>
                <td><?= $transaction->has('unit') ? $this->Html->link($transaction->unit->name, ['controller' => 'Units', 'action' => 'view', $transaction->unit->id]) : '' ?></td>
                <td><?= $transaction->has('wallet') ? $this->Html->link($transaction->wallet->name, ['controller' => 'Wallets', 'action' => 'view', $transaction->wallet->id]) : '' ?></td>
                <td><?= $transaction->has('category') ? $this->Html->link($transaction->category->name, ['controller' => 'Categorys', 'action' => 'view', $transaction->category->id]) : '' ?></td>
                <td><?= h($transaction->time) ?></td>
                <td><?= $transaction->has('event') ? $this->Html->link($transaction->event->name, ['controller' => 'Events', 'action' => 'view', $transaction->event->id]) : '' ?></td>
                <td><?= h($transaction->description) ?></td>
                <td><?= h($transaction->location) ?></td>
                <td><?= h($transaction->partner) ?></td>
                <td><?= h($transaction->created_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $transaction->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transaction->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id)]) ?>
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
