<?php
/**
 * @var AppView $this
 * @var ?string $containerId
 * @var HeaderBody[] $rows
 */

use App\Model\Dao\HeaderBody;
use App\View\AppView;

$containerId ??= 'tabsExample';
$rows ??= [];
?>
<ul class="nav nav-tabs" id="<?= $containerId ?>_tabNav" role="tablist">
    <?php foreach ($rows as $row): ?>
        <?php
        $headerId = $containerId . '_' . $row->getHeaderId();
        $bodyId = $containerId . '_' . $row->getBodyId();
        ?>
        <li class="nav-item" role="presentation">
            <button
                id="<?= $headerId ?>"
                class="nav-link<?= $row->isActive() ? ' active' : '' ?>"
                data-bs-target="#<?= $bodyId ?>"
                aria-controls="<?= $bodyId ?>"
                aria-selected="<?= $row->isActive() ? 'true' : 'false' ?>"
                data-bs-toggle="tab"
                type="button"
                role="tab">
                <?= $row->getHeaderText() ?>
            </button>
        </li>
    <?php endforeach; ?>
</ul>
<div class="tab-content" id="<?= $containerId ?>_tabContent">
    <?php foreach ($rows as $tabindex => $row): ?>
        <?php
        $headerId = $containerId . '_' . $row->getHeaderId();
        $bodyId = $containerId . '_' . $row->getBodyId();
        ?>
        <div
            class="tab-pane fade<?= $row->isActive() ? ' show active' : '' ?>"
            id="<?= $bodyId ?>"
            role="tabpanel"
            aria-labelledby="<?= $headerId ?>"
            tabindex="<?= $tabindex ?>">
            <?= $row->getBodyText() ?>
        </div>
    <?php endforeach; ?>
</div>

