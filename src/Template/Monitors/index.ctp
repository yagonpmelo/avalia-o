<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Monitor[]|\Cake\Collection\CollectionInterface $monitors
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Monitor'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="monitors index large-9 medium-8 columns content">
    <h3><?= __('Monitors') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discipline') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($monitors as $monitor): ?>
            <tr>
                <td><?= $this->Number->format($monitor->user_id) ?></td>
                <td><?= h($monitor->discipline) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $monitor->user_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $monitor->user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $monitor->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $monitor->user_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
