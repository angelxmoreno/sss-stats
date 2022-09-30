<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Episode;
use App\Model\Table\EpisodesTable;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Datasource\Paging\Exception\PageOutOfBoundsException;
use Cake\Datasource\ResultSetInterface;

/**
 * Episodes Controller
 *
 * @property EpisodesTable $Episodes
 * @method Episode[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class EpisodesController extends AppController
{
    /**
     * Index method
     *
     * @return void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['YouTubeVideos'],
            'limit' => 18,
            'order' => [
                'Episodes.episode_number' => 'desc',
            ],
        ];
        $query = $this->Episodes->find();

        $sortFields = [
            'Episodes' => ['episode_number'],
            'YouTubeVideos' => ['like_count', 'comment_count', 'view_count'],
        ];
        $sort = $this->getRequest()->getQuery('sort', 'Episodes.episode_number');
        $direction = $this->getRequest()->getQuery('direction', 'desc');
        [$model, $field] = explode('.', $sort);
        if (!in_array($model, array_keys($sortFields))) throw new PageOutOfBoundsException(sprintf('"%s" is not a valid sort model', $model));
        if (!in_array($field, $sortFields[$model])) throw new PageOutOfBoundsException(sprintf('"%s" is not a valid sort field for mode "%s"', $field, $model));
        if (!in_array($direction, ['asc', 'desc'])) throw new PageOutOfBoundsException(sprintf('"%s" is not a valid sort direction', $direction));

        $query->order([
            $sort => $direction,
        ]);
        $episodes = $this->paginate($query);

        $this->set(compact('episodes'));
    }

    /**
     * View method
     *
     * @param string|null $id Episode id.
     * @return void Renders view
     * @throws RecordNotFoundException When record not found.
     */
    public function view(?string $id = null)
    {
        $episode = $this->Episodes->get($id, [
            'contain' => ['YouTubeVideos', 'Snacks', 'EpisodeAttributeValues', 'Films'],
        ]);

        $this->set(compact('episode'));
    }
}
