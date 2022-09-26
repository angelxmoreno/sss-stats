<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\EpisodeAttributeValue;
use App\Model\Table\EpisodeAttributeValuesTable;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Datasource\ResultSetInterface;
use Cake\Http\Response;

/**
 * EpisodeAttributeValues Controller
 *
 * @property EpisodeAttributeValuesTable $EpisodeAttributeValues
 * @method EpisodeAttributeValue[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class EpisodeAttributeValuesController extends AppController
{
    /**
     * Index method
     *
     * @return void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Episodes', 'EpisodeAttributes', 'Users'],
        ];
        $episodeAttributeValues = $this->paginate($this->EpisodeAttributeValues);

        $this->set(compact('episodeAttributeValues'));
    }

    /**
     * View method
     *
     * @param string|null $id Episode Attribute Value id.
     * @return void Renders view
     * @throws RecordNotFoundException When record not found.
     */
    public function view(?string $id = null)
    {
        $episodeAttributeValue = $this->EpisodeAttributeValues->get($id, [
            'contain' => ['Episodes', 'EpisodeAttributes', 'Users'],
        ]);

        $this->set(compact('episodeAttributeValue'));
    }

    /**
     * Add method
     *
     * @return Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $episodeAttributeValue = $this->EpisodeAttributeValues->newEmptyEntity();
        if ($this->request->is('post')) {
            $episodeAttributeValue = $this->EpisodeAttributeValues->patchEntity($episodeAttributeValue, $this->request->getData());
            if ($this->EpisodeAttributeValues->save($episodeAttributeValue)) {
                $this->Flash->success(__('The episode attribute value has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The episode attribute value could not be saved. Please, try again.'));
        }
        $episodes = $this->EpisodeAttributeValues->Episodes->find('list', ['limit' => 200])->all();
        $episodeAttributes = $this->EpisodeAttributeValues->EpisodeAttributes->find('list', ['limit' => 200])->all();
        $users = $this->EpisodeAttributeValues->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('episodeAttributeValue', 'episodes', 'episodeAttributes', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Episode Attribute Value id.
     * @return Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws RecordNotFoundException When record not found.
     */
    public function edit(?string $id = null)
    {
        $episodeAttributeValue = $this->EpisodeAttributeValues->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $episodeAttributeValue = $this->EpisodeAttributeValues->patchEntity($episodeAttributeValue, $this->request->getData());
            if ($this->EpisodeAttributeValues->save($episodeAttributeValue)) {
                $this->Flash->success(__('The episode attribute value has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The episode attribute value could not be saved. Please, try again.'));
        }
        $episodes = $this->EpisodeAttributeValues->Episodes->find('list', ['limit' => 200])->all();
        $episodeAttributes = $this->EpisodeAttributeValues->EpisodeAttributes->find('list', ['limit' => 200])->all();
        $users = $this->EpisodeAttributeValues->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('episodeAttributeValue', 'episodes', 'episodeAttributes', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Episode Attribute Value id.
     * @return Response|null|void Redirects to index.
     * @throws RecordNotFoundException When record not found.
     */
    public function delete(?string $id = null): ?Response
    {
        $this->request->allowMethod(['post', 'delete']);
        $episodeAttributeValue = $this->EpisodeAttributeValues->get($id);
        if ($this->EpisodeAttributeValues->delete($episodeAttributeValue)) {
            $this->Flash->success(__('The episode attribute value has been deleted.'));
        } else {
            $this->Flash->error(__('The episode attribute value could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
