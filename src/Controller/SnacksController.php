<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Snack;
use App\Model\Table\SnacksTable;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Datasource\ResultSetInterface;
use Cake\Http\Response;

/**
 * Snacks Controller
 *
 * @property SnacksTable $Snacks
 * @method Snack[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class SnacksController extends AppController
{
    /**
     * Index method
     *
     * @return void Renders view
     */
    public function index()
    {
        $snacks = $this->paginate($this->Snacks);

        $this->set(compact('snacks'));
    }

    /**
     * View method
     *
     * @param string|null $id Snack id.
     * @return void Renders view
     * @throws RecordNotFoundException When record not found.
     */
    public function view(?string $id = null)
    {
        $snack = $this->Snacks->get($id, [
            'contain' => ['Episodes'],
        ]);

        $this->set(compact('snack'));
    }

    /**
     * Add method
     *
     * @return Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $snack = $this->Snacks->newEmptyEntity();
        if ($this->request->is('post')) {
            $snack = $this->Snacks->patchEntity($snack, $this->request->getData());
            if ($this->Snacks->save($snack)) {
                $this->Flash->success(__('The snack has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The snack could not be saved. Please, try again.'));
        }
        $episodes = $this->Snacks->Episodes->find('list', ['limit' => 200])->all();
        $this->set(compact('snack', 'episodes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Snack id.
     * @return Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws RecordNotFoundException When record not found.
     */
    public function edit(?string $id = null)
    {
        $snack = $this->Snacks->get($id, [
            'contain' => ['Episodes'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $snack = $this->Snacks->patchEntity($snack, $this->request->getData());
            if ($this->Snacks->save($snack)) {
                $this->Flash->success(__('The snack has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The snack could not be saved. Please, try again.'));
        }
        $episodes = $this->Snacks->Episodes->find('list', ['limit' => 200])->all();
        $this->set(compact('snack', 'episodes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Snack id.
     * @return Response|null|void Redirects to index.
     * @throws RecordNotFoundException When record not found.
     */
    public function delete(?string $id = null): ?Response
    {
        $this->request->allowMethod(['post', 'delete']);
        $snack = $this->Snacks->get($id);
        if ($this->Snacks->delete($snack)) {
            $this->Flash->success(__('The snack has been deleted.'));
        } else {
            $this->Flash->error(__('The snack could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
