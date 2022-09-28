<?php
declare(strict_types=1);

namespace DirectMessages\Controller;

use Cake\Datasource\ResultSetInterface;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\JsonView;
use DirectMessages\Model\Entity\MessageThread;
use DirectMessages\Model\Table\MessageThreadsTable;

/**
 * MessageThreads Controller
 *
 * @property MessageThreadsTable $MessageThreads
 * @method MessageThread[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class MessageThreadsController extends AppController
{
    public $paginate = [
        'contain' => ['User1s', 'User2s'],
    ];

    public function viewClasses(): array
    {
        return [JsonView::class];
    }

    /**
     * Index method
     *
     * @return void Renders view
     */
    public function index()
    {
        $user_id = $this->Identity->getId();
        $query = $this->MessageThreads->find();

        $query
            ->where([
                'message_count > 0 ',
                'OR' => [
                    ['user_1_id' => $user_id],
                    ['user_2_id' => $user_id],
                ],
            ])->contain([
                'User1s', 'User2s',
            ]);


        $messageThreads = $this->paginate($query);
        $messageThreads = collection($messageThreads)->map(function (MessageThread $thread) use ($user_id) {
            $thread->requester_id = $user_id;
            return $thread;
        })->toArray();

        $this->set(compact('messageThreads'));
    }

    /**
     * View method
     *
     * @param int|null $id The other user id
     * @return void Renders view
     */
    public function view(?int $id = null)
    {
        if (!$id) throw new NotFoundException();
        $this->MessageThreads->User1s->get($id);
        $message = $this->MessageThreads->Messages->newEmptyEntity();
        $user_id = $this->Identity->getId();
        $message_thread_id = $this->getThreadId($user_id, $id);

        if ($this->request->is(['post', 'put'])) {
            $message->user_id = $user_id;
            $message->message_thread_id = $message_thread_id;
            $data = array_merge($this->request->getData(), compact('message_thread_id', 'user_id'));
            $message = $this->MessageThreads->Messages->patchEntity($message, $data);
            if ($message->hasErrors()) {
                $this->Flash->error('Could not save message');
            } else {
                $this->MessageThreads->Messages->save($message);
                $message = $this->MessageThreads->Messages->newEmptyEntity();
            }
        }

        $messageThread = $this->MessageThreads->get($message_thread_id, [
            'contain' => [
                'User1s', 'User2s', 'Messages',
            ],
        ]);
        $messageThread->requester_id = $user_id;
        $this->set(compact('messageThread', 'message'));
    }

    /**
     * @param int $user_1_id
     * @param int $user_2_id
     * @return int
     */
    protected function getThreadId(int $user_1_id, int $user_2_id): int
    {
        $thread = $this->MessageThreads->findOrCreate([
            'user_1_id' => min($user_1_id, $user_2_id),
            'user_2_id' => max($user_1_id, $user_2_id),
        ]);

        return $thread->id;
    }

    /**
     * Delete method
     *
     * @param int|null $id Message Thread id.
     * @return Response|null|void Redirects to index.
     */
    public function delete(?int $id = null): Response
    {
        $this->request->allowMethod(['post', 'delete']);
        if (!$id) throw new NotFoundException();
        $this->MessageThreads->User1s->get($id);
        $user_id = $this->Identity->getId();
        $message_thread_id = $this->getThreadId($user_id, $id);
        $messageThread = $this->MessageThreads->get($message_thread_id, [
            'contain' => 'Messages',
        ]);
        foreach ($messageThread->messages as $message) {
            $this->MessageThreads->Messages->delete($message);
        }

        return $this->redirect(['action' => 'index']);
    }
}
