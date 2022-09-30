<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Episode;
use App\Model\Table\EpisodesTable;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Datasource\Paging\Exception\PageOutOfBoundsException;
use Cake\Datasource\ResultSetInterface;
use Cake\Http\Response;

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

    /**
     * Add method
     *
     * @return Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $episode = $this->Episodes->newEmptyEntity();
        if ($this->request->is('post')) {
            $episode = $this->Episodes->patchEntity($episode, $this->request->getData());
            if ($this->Episodes->save($episode)) {
                $this->Flash->success(__('The episode has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The episode could not be saved. Please, try again.'));
        }
        $youTubeVideos = $this->Episodes->YouTubeVideos->find('list', ['limit' => 200])->all();
        $snacks = $this->Episodes->Snacks->find('list', ['limit' => 200])->all();
        $this->set(compact('episode', 'youTubeVideos', 'snacks'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Episode id.
     * @return Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws RecordNotFoundException When record not found.
     */
    public function edit(?string $id = null)
    {
        $episode = $this->Episodes->get($id, [
            'contain' => ['Snacks'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $episode = $this->Episodes->patchEntity($episode, $this->request->getData());
            if ($this->Episodes->save($episode)) {
                $this->Flash->success(__('The episode has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The episode could not be saved. Please, try again.'));
        }
        $youTubeVideos = $this->Episodes->YouTubeVideos->find('list', ['limit' => 200])->all();
        $snacks = $this->Episodes->Snacks->find('list', ['limit' => 200])->all();
        $this->set(compact('episode', 'youTubeVideos', 'snacks'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Episode id.
     * @return Response|null|void Redirects to index.
     * @throws RecordNotFoundException When record not found.
     */
    public function delete(?string $id = null): ?Response
    {
        $this->request->allowMethod(['post', 'delete']);
        $episode = $this->Episodes->get($id);
        if ($this->Episodes->delete($episode)) {
            $this->Flash->success(__('The episode has been deleted.'));
        } else {
            $this->Flash->error(__('The episode could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
