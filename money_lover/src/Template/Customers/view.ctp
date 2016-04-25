<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Budgets'), ['controller' => 'Budgets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Budget'), ['controller' => 'Budgets', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorys'), ['controller' => 'Categorys', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categorys', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Debts'), ['controller' => 'Debts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Debt'), ['controller' => 'Debts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recurring Transactions'), ['controller' => 'RecurringTransactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recurring Transaction'), ['controller' => 'RecurringTransactions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Settings'), ['controller' => 'Settings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Setting'), ['controller' => 'Settings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Wallets'), ['controller' => 'Wallets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Wallet'), ['controller' => 'Wallets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customers view large-9 medium-8 columns content">
    <h3><?= h($customer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Account') ?></th>
            <td><?= $customer->has('account') ? $this->Html->link($customer->account->id, ['controller' => 'Accounts', 'action' => 'view', $customer->account->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($customer->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($customer->email) ?></td>
        </tr>
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($customer->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($customer->last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($customer->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Dob') ?></th>
            <td><?= h($customer->dob) ?></td>
        </tr>
        <tr>
            <th><?= __('Gender') ?></th>
            <td><?= $customer->gender ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Budgets') ?></h4>
        <?php if (!empty($customer->budgets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Goal') ?></th>
                <th><?= __('Spent') ?></th>
                <th><?= __('From Date') ?></th>
                <th><?= __('To Date') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Wallet Id') ?></th>
                <th><?= __('Created At') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->budgets as $budgets): ?>
            <tr>
                <td><?= h($budgets->id) ?></td>
                <td><?= h($budgets->customer_id) ?></td>
                <td><?= h($budgets->goal) ?></td>
                <td><?= h($budgets->spent) ?></td>
                <td><?= h($budgets->from_date) ?></td>
                <td><?= h($budgets->to_date) ?></td>
                <td><?= h($budgets->category_id) ?></td>
                <td><?= h($budgets->wallet_id) ?></td>
                <td><?= h($budgets->created_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Budgets', 'action' => 'view', $budgets->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Budgets', 'action' => 'edit', $budgets->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Budgets', 'action' => 'delete', $budgets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $budgets->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Categorys') ?></h4>
        <?php if (!empty($customer->categorys)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Icon') ?></th>
                <th><?= __('Group Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->categorys as $categorys): ?>
            <tr>
                <td><?= h($categorys->id) ?></td>
                <td><?= h($categorys->name) ?></td>
                <td><?= h($categorys->icon) ?></td>
                <td><?= h($categorys->group_id) ?></td>
                <td><?= h($categorys->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Categorys', 'action' => 'view', $categorys->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Categorys', 'action' => 'edit', $categorys->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Categorys', 'action' => 'delete', $categorys->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categorys->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Debts') ?></h4>
        <?php if (!empty($customer->debts)): ?>
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
            <?php foreach ($customer->debts as $debts): ?>
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
        <h4><?= __('Related Events') ?></h4>
        <?php if (!empty($customer->events)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Ending Date') ?></th>
                <th><?= __('Created At') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->events as $events): ?>
            <tr>
                <td><?= h($events->id) ?></td>
                <td><?= h($events->customer_id) ?></td>
                <td><?= h($events->name) ?></td>
                <td><?= h($events->ending_date) ?></td>
                <td><?= h($events->created_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Events', 'action' => 'view', $events->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Events', 'action' => 'edit', $events->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Events', 'action' => 'delete', $events->id], ['confirm' => __('Are you sure you want to delete # {0}?', $events->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Recurring Transactions') ?></h4>
        <?php if (!empty($customer->recurring_transactions)): ?>
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
            <?php foreach ($customer->recurring_transactions as $recurringTransactions): ?>
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
        <h4><?= __('Related Settings') ?></h4>
        <?php if (!empty($customer->settings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Displayed Amount') ?></th>
                <th><?= __('Language') ?></th>
                <th><?= __('Date Format') ?></th>
                <th><?= __('First Day Of Week') ?></th>
                <th><?= __('First Day Of Month') ?></th>
                <th><?= __('First Month Of Year') ?></th>
                <th><?= __('Update At') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->settings as $settings): ?>
            <tr>
                <td><?= h($settings->customer_id) ?></td>
                <td><?= h($settings->displayed_amount) ?></td>
                <td><?= h($settings->language) ?></td>
                <td><?= h($settings->date_format) ?></td>
                <td><?= h($settings->first_day_of_week) ?></td>
                <td><?= h($settings->first_day_of_month) ?></td>
                <td><?= h($settings->first_month_of_year) ?></td>
                <td><?= h($settings->update_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Settings', 'action' => 'view', $settings->customer_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Settings', 'action' => 'edit', $settings->customer_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Settings', 'action' => 'delete', $settings->customer_id], ['confirm' => __('Are you sure you want to delete # {0}?', $settings->customer_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Transactions') ?></h4>
        <?php if (!empty($customer->transactions)): ?>
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
            <?php foreach ($customer->transactions as $transactions): ?>
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
        <?php if (!empty($customer->wallets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Icon') ?></th>
                <th><?= __('Amount') ?></th>
                <th><?= __('Unit Id') ?></th>
                <th><?= __('Created At') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->wallets as $wallets): ?>
            <tr>
                <td><?= h($wallets->id) ?></td>
                <td><?= h($wallets->customer_id) ?></td>
                <td><?= h($wallets->name) ?></td>
                <td><?= h($wallets->description) ?></td>
                <td><?= h($wallets->icon) ?></td>
                <td><?= h($wallets->amount) ?></td>
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
