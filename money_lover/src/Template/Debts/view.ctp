<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Debt'), ['action' => 'edit', $debt->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Debt'), ['action' => 'delete', $debt->id], ['confirm' => __('Are you sure you want to delete # {0}?', $debt->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Debts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Debt'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Wallets'), ['controller' => 'Wallets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Wallet'), ['controller' => 'Wallets', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="debts view large-9 medium-8 columns content">
    <h3><?= h($debt->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $debt->has('customer') ? $this->Html->link($debt->customer->id, ['controller' => 'Customers', 'action' => 'view', $debt->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($debt->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Wallet') ?></th>
            <td><?= $debt->has('wallet') ? $this->Html->link($debt->wallet->name, ['controller' => 'Wallets', 'action' => 'view', $debt->wallet->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Event') ?></th>
            <td><?= $debt->has('event') ? $this->Html->link($debt->event->name, ['controller' => 'Events', 'action' => 'view', $debt->event->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Partner') ?></th>
            <td><?= h($debt->partner) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($debt->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Amount') ?></th>
            <td><?= $this->Number->format($debt->amount) ?></td>
        </tr>
        <tr>
            <th><?= __('Paid') ?></th>
            <td><?= $this->Number->format($debt->paid) ?></td>
        </tr>
        <tr>
            <th><?= __('Time') ?></th>
            <td><?= h($debt->time) ?></td>
        </tr>
        <tr>
            <th><?= __('Created At') ?></th>
            <td><?= h($debt->created_at) ?></td>
        </tr>
        <tr>
            <th><?= __('Debt Type') ?></th>
            <td><?= $debt->debt_type ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
