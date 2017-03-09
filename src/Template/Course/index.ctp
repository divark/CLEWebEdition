<?php
/**
  * @var \App\View\AppView $this
  */
  //var_dump($course); die()
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Course'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="course index large-9 medium-8 columns content">
    <h3><?= __('Course') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('units') ?></th>
                <th scope="col">Terms</th>
                <th scope="col"><?= $this->Paginator->sort('concurrents') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prerequisites') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($course as $course): ?>
            <tr>
                <td><?= h($course->name) ?></td>
                <td><?= $this->Number->format($course->units) ?></td>
                <td><?= ($course->summer ? 'Su' : '') ?> <?= ($course->fall ? 'F' : '') ?> <?= ($course->winter ? 'W' : '') ?> <?= ($course->spring ? 'S' : '') ?></td>
                <td><?= h($course->concurrentNames()) ?></td>
                <td><?= h($course->prerequisiteNames()) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $course->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $course->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $course->id], ['confirm' => __('Are you sure you want to delete # {0}?', $course->id)]) ?>
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
