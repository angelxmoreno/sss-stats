<div class="row pt-lg-2 pb-lg-0">
    <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="">
            Album example
        </h1>
        <p class="lead text-muted">
            Something short and leading about the collection below—its contents, the creator,
            etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p>
    </div>
</div>
<hr/>
<!-- video_single_wide Row-->
<?= $this->element('video_single_wide') ?>
<hr/>
<!-- video_col_thumbnail Row-->
<div class="album my-3 pt-2 pb-0 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?= $this->element('video_col_thumbnail') ?>
            <?= $this->element('video_col_thumbnail') ?>
            <?= $this->element('video_col_thumbnail') ?>

            <?= $this->element('video_col_thumbnail') ?>
            <?= $this->element('video_col_thumbnail') ?>
            <?= $this->element('video_col_thumbnail') ?>

            <?= $this->element('video_col_thumbnail') ?>
            <?= $this->element('video_col_thumbnail') ?>
            <?= $this->element('video_col_thumbnail') ?>
        </div>
    </div>
</div>
