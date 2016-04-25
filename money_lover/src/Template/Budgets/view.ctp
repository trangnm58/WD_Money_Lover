<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Budget'), ['action' => 'edit', $budget->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Budget'), ['action' => 'delete', $budget->id], ['confirm' => __('Are you sure you want to delete # {0}?', $budget->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Budgets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Budget'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorys'), ['controller' => 'Categorys', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categorys', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Wallets'), ['controller' => 'Wallets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Wallet'), ['controller' => 'Wallets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="budgets view large-9 medium-8 columns content">
    <h3><?= h($budget->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $budget->has('customer') ? $this->Html->link($budget->customer->id, ['controller' => 'Customers', 'action' => 'view', $budget->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Category') ?></th>
            <td><?= $budget->has('category') ? $this->Html->link($budget->category->name, ['controller' => 'Categorys', 'action' => 'view', $budget->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Wallet') ?></th>
            <td><?= $budget->has('wallet') ? $this->Html->link($budget->wallet->name, ['controller' => 'Wallets', 'action' => 'view', $budget->wallet->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($budget->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Goal') ?></th>
            <td><?= $this->Number->format($budget->goal) ?></td>
        </tr>
        <tr>
            <th><?= __('Spent') ?></th>
            <td><?= $this->Number->format($budget->spent) ?></td>
        </tr>
        <tr>
            <th><?= __('From Date') ?></th>
            <td><?= h($budget->from_date) ?></td>
        </tr>
        <tr>
            <th><?= __('To Date') ?></th>
            <td><?= h($budget->to_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Created At') ?></th>
            <td><?= h($budget->created_at) ?></td>
        </tr>
    </table>
</div>
