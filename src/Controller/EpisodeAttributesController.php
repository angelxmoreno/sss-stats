<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\EpisodeAttribute;
use App\Model\Table\EpisodeAttributesTable;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Datasource\ResultSetInterface;
use Cake\Http\Response;

/**
 * EpisodeAttributes Controller
 *
 * @property EpisodeAttributesTable $EpisodeAttributes
 * @method EpisodeAttribute[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class EpisodeAttributesController extends AppController
{
    /**
     * Index method
     *
     * @return void Renders view
     */
    public function index()
    {
        $episodeAttributes = $this->paginate($this->EpisodeAttributes);

        $this->set(compact('episodeAttributes'));
    }

    /**
     * View method
     *
     * @param string|null $id Episode Attribute id.
     * @return void Renders view
     * @throws RecordNotFoundException When record not found.
     */
    public function view(?string $id = null)
    {
        $episodeAttribute = $this->EpisodeAttributes->get($id, [
            'contain' => ['EpisodeAttributeValues'],
        ]);

        $this->set(compact('episodeAttribute'));
    }

    /**
     * Add method
     *
     * @return Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $episodeAttribute = $this->EpisodeAttributes->newEmptyEntity();
        if ($this->request->is('post')) {
            $episodeAttribute = $this->EpisodeAttributes->patchEntity($episodeAttribute, $this->request->getData());
            if ($this->EpisodeAttributes->save($episodeAttribute)) {
                $this->Flash->success(__('The episode attribute has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The episode attribute could not be saved. Please, try again.'));
        }
        $this->set(compact('episodeAttribute'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Episode Attribute id.
     * @return Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws RecordNotFoundException When record not found.
     */
    public function edit(?string $id = null)
    {
        $episodeAttribute = $this->EpisodeAttributes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $episodeAttribute = $this->EpisodeAttributes->patchEntity($episodeAttribute, $this->request->getData());
            if ($this->EpisodeAttributes->save($episodeAttribute)) {
                $this->Flash->success(__('The episode attribute has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The episode attribute could not be saved. Please, try again.'));
        }
        $this->set(compact('episodeAttribute'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Episode Attribute id.
     * @return Response|null|void Redirects to index.
     * @throws RecordNotFoundException When record not found.
     */
    public function delete(?string $id = null): ?Response
    {
        $this->request->allowMethod(['post', 'delete']);
        $episodeAttribute = $this->EpisodeAttributes->get($id);
        if ($this->EpisodeAttributes->delete($episodeAttribute)) {
            $this->Flash->success(__('The episode attribute has been deleted.'));
        } else {
            $this->Flash->error(__('The episode attribute could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
