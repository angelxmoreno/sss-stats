<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\EpisodeSnack;
use App\Model\Table\EpisodeSnacksTable;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Datasource\ResultSetInterface;
use Cake\Http\Response;

/**
 * EpisodeSnacks Controller
 *
 * @property EpisodeSnacksTable $EpisodeSnacks
 * @method EpisodeSnack[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class EpisodeSnacksController extends AppController
{
    /**
     * Index method
     *
     * @return void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Episodes', 'Snacks', 'Users'],
        ];
        $episodeSnacks = $this->paginate($this->EpisodeSnacks);

        $this->set(compact('episodeSnacks'));
    }

    /**
     * View method
     *
     * @param string|null $id Episode Snack id.
     * @return void Renders view
     * @throws RecordNotFoundException When record not found.
     */
    public function view(?string $id = null)
    {
        $episodeSnack = $this->EpisodeSnacks->get($id, [
            'contain' => ['Episodes', 'Snacks', 'Users'],
        ]);

        $this->set(compact('episodeSnack'));
    }

    /**
     * Add method
     *
     * @return Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $episodeSnack = $this->EpisodeSnacks->newEmptyEntity();
        if ($this->request->is('post')) {
            $episodeSnack = $this->EpisodeSnacks->patchEntity($episodeSnack, $this->request->getData());
            if ($this->EpisodeSnacks->save($episodeSnack)) {
                $this->Flash->success(__('The episode snack has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The episode snack could not be saved. Please, try again.'));
        }
        $episodes = $this->EpisodeSnacks->Episodes->find('list', ['limit' => 200])->all();
        $snacks = $this->EpisodeSnacks->Snacks->find('list', ['limit' => 200])->all();
        $users = $this->EpisodeSnacks->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('episodeSnack', 'episodes', 'snacks', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Episode Snack id.
     * @return Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws RecordNotFoundException When record not found.
     */
    public function edit(?string $id = null)
    {
        $episodeSnack = $this->EpisodeSnacks->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $episodeSnack = $this->EpisodeSnacks->patchEntity($episodeSnack, $this->request->getData());
            if ($this->EpisodeSnacks->save($episodeSnack)) {
                $this->Flash->success(__('The episode snack has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The episode snack could not be saved. Please, try again.'));
        }
        $episodes = $this->EpisodeSnacks->Episodes->find('list', ['limit' => 200])->all();
        $snacks = $this->EpisodeSnacks->Snacks->find('list', ['limit' => 200])->all();
        $users = $this->EpisodeSnacks->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('episodeSnack', 'episodes', 'snacks', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Episode Snack id.
     * @return Response|null|void Redirects to index.
     * @throws RecordNotFoundException When record not found.
     */
    public function delete(?string $id = null): ?Response
    {
        $this->request->allowMethod(['post', 'delete']);
        $episodeSnack = $this->EpisodeSnacks->get($id);
        if ($this->EpisodeSnacks->delete($episodeSnack)) {
            $this->Flash->success(__('The episode snack has been deleted.'));
        } else {
            $this->Flash->error(__('The episode snack could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
