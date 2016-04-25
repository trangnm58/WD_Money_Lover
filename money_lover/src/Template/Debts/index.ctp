<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Debt'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Wallets'), ['controller' => 'Wallets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Wallet'), ['controller' => 'Wallets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="debts index large-9 medium-8 columns content">
    <h3><?= __('Debts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th><?= $this->Paginator->sort('debt_type') ?></th>
                <th><?= $this->Paginator->sort('amount') ?></th>
                <th><?= $this->Paginator->sort('paid') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('time') ?></th>
                <th><?= $this->Paginator->sort('wallet_id') ?></th>
                <th><?= $this->Paginator->sort('event_id') ?></th>
                <th><?= $this->Paginator->sort('partner') ?></th>
                <th><?= $this->Paginator->sort('created_at') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($debts as $debt): ?>
            <tr>
                <td><?= $this->Number->format($debt->id) ?></td>
                <td><?= $debt->has('customer') ? $this->Html->link($debt->customer->id, ['controller' => 'Customers', 'action' => 'view', $debt->customer->id]) : '' ?></td>
                <td><?= h($debt->debt_type) ?></td>
                <td><?= $this->Number->format($debt->amount) ?></td>
                <td><?= $this->Number->format($debt->paid) ?></td>
                <td><?= h($debt->description) ?></td>
                <td><?= h($debt->time) ?></td>
                <td><?= $debt->has('wallet') ? $this->Html->link($debt->wallet->name, ['controller' => 'Wallets', 'action' => 'view', $debt->wallet->id]) : '' ?></td>
                <td><?= $debt->has('event') ? $this->Html->link($debt->event->name, ['controller' => 'Events', 'action' => 'view', $debt->event->id]) : '' ?></td>
                <td><?= h($debt->partner) ?></td>
                <td><?= h($debt->created_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $debt->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $debt->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $debt->id], ['confirm' => __('Are you sure you want to delete # {0}?', $debt->id)]) ?>
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
