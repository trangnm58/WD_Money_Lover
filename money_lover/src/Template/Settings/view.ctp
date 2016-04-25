<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Setting'), ['action' => 'edit', $setting->account_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Setting'), ['action' => 'delete', $setting->account_id], ['confirm' => __('Are you sure you want to delete # {0}?', $setting->account_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Settings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Setting'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="settings view large-9 medium-8 columns content">
    <h3><?= h($setting->account_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Account') ?></th>
            <td><?= $setting->has('account') ? $this->Html->link($setting->account->id, ['controller' => 'Accounts', 'action' => 'view', $setting->account->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Displayed Amount') ?></th>
            <td><?= h($setting->displayed_amount) ?></td>
        </tr>
        <tr>
            <th><?= __('Language') ?></th>
            <td><?= h($setting->language) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Format') ?></th>
            <td><?= h($setting->date_format) ?></td>
        </tr>
        <tr>
            <th><?= __('First Day Of Week') ?></th>
            <td><?= $this->Number->format($setting->first_day_of_week) ?></td>
        </tr>
        <tr>
            <th><?= __('First Day Of Month') ?></th>
            <td><?= $this->Number->format($setting->first_day_of_month) ?></td>
        </tr>
        <tr>
            <th><?= __('First Month Of Year') ?></th>
            <td><?= $this->Number->format($setting->first_month_of_year) ?></td>
        </tr>
        <tr>
            <th><?= __('Update At') ?></th>
            <td><?= h($setting->update_at) ?></td>
        </tr>
    </table>
</div>
