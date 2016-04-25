<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Setting'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="settings index large-9 medium-8 columns content">
    <h3><?= __('Settings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('account_id') ?></th>
                <th><?= $this->Paginator->sort('displayed_amount') ?></th>
                <th><?= $this->Paginator->sort('language') ?></th>
                <th><?= $this->Paginator->sort('date_format') ?></th>
                <th><?= $this->Paginator->sort('first_day_of_week') ?></th>
                <th><?= $this->Paginator->sort('first_day_of_month') ?></th>
                <th><?= $this->Paginator->sort('first_month_of_year') ?></th>
                <th><?= $this->Paginator->sort('update_at') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($settings as $setting): ?>
            <tr>
                <td><?= $setting->has('account') ? $this->Html->link($setting->account->id, ['controller' => 'Accounts', 'action' => 'view', $setting->account->id]) : '' ?></td>
                <td><?= h($setting->displayed_amount) ?></td>
                <td><?= h($setting->language) ?></td>
                <td><?= h($setting->date_format) ?></td>
                <td><?= $this->Number->format($setting->first_day_of_week) ?></td>
                <td><?= $this->Number->format($setting->first_day_of_month) ?></td>
                <td><?= $this->Number->format($setting->first_month_of_year) ?></td>
                <td><?= h($setting->update_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $setting->account_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $setting->account_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $setting->account_id], ['confirm' => __('Are you sure you want to delete # {0}?', $setting->account_id)]) ?>
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
