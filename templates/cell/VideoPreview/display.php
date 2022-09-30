<?php
/**
 * @var AppView $this
 * @var Episode $episode
 */

use App\Model\Entity\Episode;
use App\View\AppView;

echo $this->element('video_col_thumbnail', compact('episode'));
