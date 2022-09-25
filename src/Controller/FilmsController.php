<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Film;
use App\Model\Table\FilmsTable;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Datasource\ResultSetInterface;
use Cake\Http\Response;

/**
 * Films Controller
 *
 * @property FilmsTable $Films
 * @method Film[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilmsController extends AppController
{
    /**
     * Index method
     *
     * @return void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Episodes', 'Users', 'Submitter'],
        ];
        $films = $this->paginate($this->Films);

        $this->set(compact('films'));
    }

    /**
     * View method
     *
     * @param string|null $id Film id.
     * @return void Renders view
     * @throws RecordNotFoundException When record not found.
     */
    public function view(?string $id = null)
    {
        $film = $this->Films->get($id, [
            'contain' => ['Episodes', 'Users', 'Submitter', 'Directors', 'Narrators', 'Creators', 'Actors'],
        ]);

        $this->set(compact('film'));
    }

    /**
     * Add method
     *
     * @return Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $film = $this->Films->newEmptyEntity();
        if ($this->request->is('post')) {
            $film = $this->Films->patchEntity($film, $this->request->getData());
            if ($this->Films->save($film)) {
                $this->Flash->success(__('The film has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The film could not be saved. Please, try again.'));
        }
        $episodes = $this->Films->Episodes->find('list', ['limit' => 200])->all();
        $users = $this->Films->Users->find('list', ['limit' => 200])->all();
        $submitter = $this->Films->Submitter->find('list', ['limit' => 200])->all();
        $directors = $this->Films->Directors->find('list', ['limit' => 200])->all();
        $narrators = $this->Films->Narrators->find('list', ['limit' => 200])->all();
        $creators = $this->Films->Creators->find('list', ['limit' => 200])->all();
        $actors = $this->Films->Actors->find('list', ['limit' => 200])->all();
        $this->set(compact('film', 'episodes', 'users', 'submitter', 'directors', 'narrators', 'creators', 'actors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Film id.
     * @return Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws RecordNotFoundException When record not found.
     */
    public function edit(?string $id = null)
    {
        $film = $this->Films->get($id, [
            'contain' => ['Directors', 'Narrators', 'Creators', 'Actors'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $film = $this->Films->patchEntity($film, $this->request->getData());
            if ($this->Films->save($film)) {
                $this->Flash->success(__('The film has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The film could not be saved. Please, try again.'));
        }
        $episodes = $this->Films->Episodes->find('list', ['limit' => 200])->all();
        $users = $this->Films->Users->find('list', ['limit' => 200])->all();
        $submitter = $this->Films->Submitter->find('list', ['limit' => 200])->all();
        $directors = $this->Films->Directors->find('list', ['limit' => 200])->all();
        $narrators = $this->Films->Narrators->find('list', ['limit' => 200])->all();
        $creators = $this->Films->Creators->find('list', ['limit' => 200])->all();
        $actors = $this->Films->Actors->find('list', ['limit' => 200])->all();
        $this->set(compact('film', 'episodes', 'users', 'submitter', 'directors', 'narrators', 'creators', 'actors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Film id.
     * @return Response|null|void Redirects to index.
     * @throws RecordNotFoundException When record not found.
     */
    public function delete(?string $id = null): ?Response
    {
        $this->request->allowMethod(['post', 'delete']);
        $film = $this->Films->get($id);
        if ($this->Films->delete($film)) {
            $this->Flash->success(__('The film has been deleted.'));
        } else {
            $this->Flash->error(__('The film could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
