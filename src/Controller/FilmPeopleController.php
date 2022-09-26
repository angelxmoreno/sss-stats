<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\FilmPerson;
use App\Model\Table\FilmPeopleTable;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Datasource\ResultSetInterface;
use Cake\Http\Response;

/**
 * FilmPeople Controller
 *
 * @property FilmPeopleTable $FilmPeople
 * @method FilmPerson[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilmPeopleController extends AppController
{
    /**
     * Index method
     *
     * @return void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['People', 'Films', 'Users'],
        ];
        $filmPeople = $this->paginate($this->FilmPeople);

        $this->set(compact('filmPeople'));
    }

    /**
     * View method
     *
     * @param string|null $id Film Person id.
     * @return void Renders view
     * @throws RecordNotFoundException When record not found.
     */
    public function view(?string $id = null)
    {
        $filmPerson = $this->FilmPeople->get($id, [
            'contain' => ['People', 'Films', 'Users'],
        ]);

        $this->set(compact('filmPerson'));
    }

    /**
     * Add method
     *
     * @return Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $filmPerson = $this->FilmPeople->newEmptyEntity();
        if ($this->request->is('post')) {
            $filmPerson = $this->FilmPeople->patchEntity($filmPerson, $this->request->getData());
            if ($this->FilmPeople->save($filmPerson)) {
                $this->Flash->success(__('The film person has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The film person could not be saved. Please, try again.'));
        }
        $people = $this->FilmPeople->People->find('list', ['limit' => 200])->all();
        $films = $this->FilmPeople->Films->find('list', ['limit' => 200])->all();
        $users = $this->FilmPeople->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('filmPerson', 'people', 'films', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Film Person id.
     * @return Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws RecordNotFoundException When record not found.
     */
    public function edit(?string $id = null)
    {
        $filmPerson = $this->FilmPeople->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $filmPerson = $this->FilmPeople->patchEntity($filmPerson, $this->request->getData());
            if ($this->FilmPeople->save($filmPerson)) {
                $this->Flash->success(__('The film person has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The film person could not be saved. Please, try again.'));
        }
        $people = $this->FilmPeople->People->find('list', ['limit' => 200])->all();
        $films = $this->FilmPeople->Films->find('list', ['limit' => 200])->all();
        $users = $this->FilmPeople->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('filmPerson', 'people', 'films', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Film Person id.
     * @return Response|null|void Redirects to index.
     * @throws RecordNotFoundException When record not found.
     */
    public function delete(?string $id = null): ?Response
    {
        $this->request->allowMethod(['post', 'delete']);
        $filmPerson = $this->FilmPeople->get($id);
        if ($this->FilmPeople->delete($filmPerson)) {
            $this->Flash->success(__('The film person has been deleted.'));
        } else {
            $this->Flash->error(__('The film person could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
