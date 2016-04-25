<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event'), ['action' => 'edit', $event->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Debts'), ['controller' => 'Debts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Debt'), ['controller' => 'Debts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="events view large-9 medium-8 columns content">
    <h3><?= h($event->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $event->has('customer') ? $this->Html->link($event->customer->id, ['controller' => 'Customers', 'action' => 'view', $event->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($event->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($event->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Ending Date') ?></th>
            <td><?= h($event->ending_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Created At') ?></th>
            <td><?= h($event->created_at) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Debts') ?></h4>
        <?php if (!empty($event->debts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Debt Type') ?></th>
                <th><?= __('Amount') ?></th>
                <th><?= __('Paid') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Time') ?></th>
                <th><?= __('Wallet Id') ?></th>
                <th><?= __('Event Id') ?></th>
                <th><?= __('Partner') ?></th>
                <th><?= __('Created At') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->debts as $debts): ?>
            <tr>
                <td><?= h($debts->id) ?></td>
                <td><?= h($debts->customer_id) ?></td>
                <td><?= h($debts->debt_type) ?></td>
                <td><?= h($debts->amount) ?></td>
                <td><?= h($debts->paid) ?></td>
                <td><?= h($debts->description) ?></td>
                <td><?= h($debts->time) ?></td>
                <td><?= h($debts->wallet_id) ?></td>
                <td><?= h($debts->event_id) ?></td>
                <td><?= h($debts->partner) ?></td>
                <td><?= h($debts->created_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Debts', 'action' => 'view', $debts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Debts', 'action' => 'edit', $debts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Debts', 'action' => 'delete', $debts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $debts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Transactions') ?></h4>
        <?php if (!empty($event->transactions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Amount') ?></th>
                <th><?= __('Unit Id') ?></th>
                <th><?= __('Wallet Id') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Time') ?></th>
                <th><?= __('Event Id') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Location') ?></th>
                <th><?= __('Partner') ?></th>
                <th><?= __('Created At') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->transactions as $transactions): ?>
            <tr>
                <td><?= h($transactions->id) ?></td>
                <td><?= h($transactions->customer_id) ?></td>
                <td><?= h($transactions->amount) ?></td>
                <td><?= h($transactions->unit_id) ?></td>
                <td><?= h($transactions->wallet_id) ?></td>
                <td><?= h($transactions->category_id) ?></td>
                <td><?= h($transactions->time) ?></td>
                <td><?= h($transactions->event_id) ?></td>
                <td><?= h($transactions->description) ?></td>
                <td><?= h($transactions->location) ?></td>
                <td><?= h($transactions->partner) ?></td>
                <td><?= h($transactions->created_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Transactions', 'action' => 'view', $transactions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Transactions', 'action' => 'edit', $transactions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transactions', 'action' => 'delete', $transactions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
