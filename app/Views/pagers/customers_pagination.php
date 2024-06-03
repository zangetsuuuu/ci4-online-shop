<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation" class="flex items-center justify-center w-full">
    <ul class="pagination-container">
    <?php if ($pager->hasPrevious()) : ?>
        <li>
            <a class="pagination-link" href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
                <span aria-hidden="true"><?= lang('Pager.first') ?></span>
            </a>
        </li>
    <?php endif ?>

    <?php foreach ($pager->links() as $link): ?>
        <li>
            <a class="<?= $link['active'] ? 'page-active' : 'pagination-link' ?>" href="<?= $link['uri'] ?>">
                <?= $link['title'] ?>
            </a>
        </li>
    <?php endforeach ?>

    <?php if ($pager->hasNext()) : ?>
        <li>
            <a class="pagination-link" href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
                <span aria-hidden="true"><?= lang('Pager.last') ?></span>
            </a>
        </li>
    <?php endif ?>
    </ul>
</nav>
