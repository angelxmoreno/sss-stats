<?php
declare(strict_types=1);

namespace App\View\Cell;

use App\Model\Table\EpisodesTable;
use Cake\View\Cell;

/**
 * LatestVideo cell
 */
class LatestVideoCell extends Cell
{
    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array<string, mixed>
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize(): void
    {
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $episode = $this
            ->fetchTable(EpisodesTable::class)
            ->find()
            ->where([
                'Episodes.episode_number' => '000',
            ])->contain('YouTubeVideos')
            ->first();
        $this->set(compact('episode'));
    }
}
