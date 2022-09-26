<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Episode;
use App\Model\Table\EpisodesTable;
use Cake\Datasource\Exception\RecordNotFoundException;
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
    public $paginate = [
        'limit' => 100,
        'order' => [
            'Episodes.episode_number' => 'desc',
        ],
    ];

    /**
     * Index method
     *
     * @return void Renders view
     */
    public function index()
    {
        $episodes = $this->paginate($this->Episodes);

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
            'contain' => ['Snacks', 'EpisodeAttributeValues', 'Films'],
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
        $snacks = $this->Episodes->Snacks->find('list', ['limit' => 200])->all();
        $this->set(compact('episode', 'snacks'));
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
        $snacks = $this->Episodes->Snacks->find('list', ['limit' => 200])->all();
        $this->set(compact('episode', 'snacks'));
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
