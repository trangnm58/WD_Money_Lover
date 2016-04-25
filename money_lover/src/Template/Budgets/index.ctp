<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Budget'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorys'), ['controller' => 'Categorys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categorys', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Wallets'), ['controller' => 'Wallets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Wallet'), ['controller' => 'Wallets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="budgets index large-9 medium-8 columns content">
    <h3><?= __('Budgets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('account_id') ?></th>
                <th><?= $this->Paginator->sort('goal') ?></th>
                <th><?= $this->Paginator->sort('spent') ?></th>
                <th><?= $this->Paginator->sort('from_date') ?></th>
                <th><?= $this->Paginator->sort('to_date') ?></th>
                <th><?= $this->Paginator->sort('category_id') ?></th>
                <th><?= $this->Paginator->sort('wallet_id') ?></th>
                <th><?= $this->Paginator->sort('created_at') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($budgets as $budget): ?>
            <tr>
                <td><?= $this->Number->format($budget->id) ?></td>
                <td><?= $budget->has('account') ? $this->Html->link($budget->account->id, ['controller' => 'Accounts', 'action' => 'view', $budget->account->id]) : '' ?></td>
                <td><?= $this->Number->format($budget->goal) ?></td>
                <td><?= $this->Number->format($budget->spent) ?></td>
                <td><?= h($budget->from_date) ?></td>
                <td><?= h($budget->to_date) ?></td>
                <td><?= $budget->has('category') ? $this->Html->link($budget->category->name, ['controller' => 'Categorys', 'action' => 'view', $budget->category->id]) : '' ?></td>
                <td><?= $budget->has('wallet') ? $this->Html->link($budget->wallet->name, ['controller' => 'Wallets', 'action' => 'view', $budget->wallet->id]) : '' ?></td>
                <td><?= h($budget->created_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $budget->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $budget->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $budget->id], ['confirm' => __('Are you sure you want to delete # {0}?', $budget->id)]) ?>
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
