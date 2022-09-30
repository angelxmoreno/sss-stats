<?php
/**
 * @var AppView $this
 * @var ?string $containerId
 * @var HeaderBody[] $rows
 */

use App\Model\Dao\HeaderBody;
use App\View\AppView;

$containerId ??= 'accordionExample';
$rows ??= [];
?>
<div class="accordion" id="<?= $containerId ?>">
    <?php foreach ($rows as $row): ?>
        <?php
        $headerId = $containerId . '_' . $row->getHeaderId();
        $bodyId = $containerId . '_' . $row->getBodyId();
        ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="<?= $headerId ?>">
                <button
                    type="button"
                    data-bs-toggle="collapse"
                    class="accordion-button<?= $row->isActive() ? '' : ' collapsed' ?>"
                    aria-expanded="<?= $row->isActive() ? 'true' : 'false' ?>"
                    data-bs-target="#<?= $bodyId ?>"
                    aria-controls="<?= $bodyId ?>">
                    <?= $row->getHeaderText() ?>
                </button>
            </h2>
            <div
                id="<?= $bodyId ?>"
                class="accordion-collapse collapse<?= $row->isActive() ? ' show' : '' ?>"
                aria-labelledby="<?= $headerId ?>"
                data-bs-parent="#<?= $containerId ?>">
                <div class="accordion-body">
                    <?= $row->getBodyText() ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

