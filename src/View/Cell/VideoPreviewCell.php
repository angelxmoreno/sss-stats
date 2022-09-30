<?php
declare(strict_types=1);

namespace App\View\Cell;

use App\Model\Table\EpisodesTable;
use Cake\ORM\Query;
use Cake\View\Cell;

/**
 * VideoPreview cell
 */
class VideoPreviewCell extends Cell
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
    public function display(?string $episodeNumber = null)
    {
        $query = $this->getQuery();
        if ($episodeNumber) {
            $query->where([
                'Episodes.episode_number' => str_pad((string)$episodeNumber, 3, '0', STR_PAD_LEFT),
            ]);
        } else {
            $query->order('rand()');
        }
        $episode = $query->first();
        $this->set(compact('episode'));
    }

    protected function getQuery(array $options = []): Query
    {
        $query = $this
            ->fetchTable(EpisodesTable::class)
            ->find()
            ->contain('YouTubeVideos');

        $query->applyOptions($options);
        return $query;
    }

    public function titledRows(array $options, ?string $title = null, ?string $seeMoreUri = null)
    {
        $title ??= 'Videos';
        $query = $this->getQuery($options);

        $episodes = $query->all();

        $this->set(compact('episodes', 'title', 'seeMoreUri'));
    }
}
