<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Unit'), ['action' => 'edit', $unit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Unit'), ['action' => 'delete', $unit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $unit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recurring Transactions'), ['controller' => 'RecurringTransactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recurring Transaction'), ['controller' => 'RecurringTransactions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Wallets'), ['controller' => 'Wallets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Wallet'), ['controller' => 'Wallets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="units view large-9 medium-8 columns content">
    <h3><?= h($unit->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($unit->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($unit->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Exchange Rate') ?></th>
            <td><?= $this->Number->format($unit->exchange_rate) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Recurring Transactions') ?></h4>
        <?php if (!empty($unit->recurring_transactions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Amount') ?></th>
                <th><?= __('Unit Id') ?></th>
                <th><?= __('Wallet Id') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Repeat Type') ?></th>
                <th><?= __('From Date') ?></th>
                <th><?= __('To Date') ?></th>
                <th><?= __('Every') ?></th>
                <th><?= __('Monthly') ?></th>
                <th><?= __('Weekly') ?></th>
                <th><?= __('Created At') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($unit->recurring_transactions as $recurringTransactions): ?>
            <tr>
                <td><?= h($recurringTransactions->id) ?></td>
                <td><?= h($recurringTransactions->customer_id) ?></td>
                <td><?= h($recurringTransactions->amount) ?></td>
                <td><?= h($recurringTransactions->unit_id) ?></td>
                <td><?= h($recurringTransactions->wallet_id) ?></td>
                <td><?= h($recurringTransactions->category_id) ?></td>
                <td><?= h($recurringTransactions->description) ?></td>
                <td><?= h($recurringTransactions->repeat_type) ?></td>
                <td><?= h($recurringTransactions->from_date) ?></td>
                <td><?= h($recurringTransactions->to_date) ?></td>
                <td><?= h($recurringTransactions->every) ?></td>
                <td><?= h($recurringTransactions->monthly) ?></td>
                <td><?= h($recurringTransactions->weekly) ?></td>
                <td><?= h($recurringTransactions->created_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RecurringTransactions', 'action' => 'view', $recurringTransactions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RecurringTransactions', 'action' => 'edit', $recurringTransactions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RecurringTransactions', 'action' => 'delete', $recurringTransactions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recurringTransactions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Transactions') ?></h4>
        <?php if (!empty($unit->transactions)): ?>
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
            <?php foreach ($unit->transactions as $transactions): ?>
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
    <div class="related">
        <h4><?= __('Related Wallets') ?></h4>
        <?php if (!empty($unit->wallets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Icon') ?></th>
                <th><?= __('Ammount') ?></th>
                <th><?= __('Unit Id') ?></th>
                <th><?= __('Created At') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($unit->wallets as $wallets): ?>
            <tr>
                <td><?= h($wallets->id) ?></td>
                <td><?= h($wallets->customer_id) ?></td>
                <td><?= h($wallets->name) ?></td>
                <td><?= h($wallets->description) ?></td>
                <td><?= h($wallets->icon) ?></td>
                <td><?= h($wallets->ammount) ?></td>
                <td><?= h($wallets->unit_id) ?></td>
                <td><?= h($wallets->created_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Wallets', 'action' => 'view', $wallets->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Wallets', 'action' => 'edit', $wallets->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Wallets', 'action' => 'delete', $wallets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wallets->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
