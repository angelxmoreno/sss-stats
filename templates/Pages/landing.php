<?php
/**
 * @var AppView $this
 */


use App\View\AppView;

?>
<div class="row pt-lg-2 pb-lg-0">
    <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="">
            Spooky Scary Sunday Stats
        </h1>
        <p class="lead text-muted">
            Triple S Stats is a fan-based site devoted to CoryXKenshin's Spooky Scary Sunday content.
        </p>
        <p>
            <a href="#" class="btn btn-primary my-2">Learn More</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p>
    </div>
</div>
<hr/>
<!-- video_single_wide Row-->
<?= $this->cell('LatestVideo')->render() ?>
<hr/>

<!-- video_col_thumbnail Row-->
<?= $this->YouTube->renderMostLikes() ?>
<hr/>

<!-- video_col_thumbnail Row-->
<?= $this->YouTube->renderMostViews() ?>
<hr/>

<!-- video_col_thumbnail Row-->
<?= $this->YouTube->renderMostCommented() ?>
<hr/>
