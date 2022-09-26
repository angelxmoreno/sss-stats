<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\UsersTable;
use Cake\Event\EventInterface;
use Cake\Http\Response;

/**
 * Auth Controller
 *
 * @property UsersTable $Users
 */
class AuthController extends AppController
{
    public const URL_LOGIN = [
        'prefix' => false,
        'plugin' => false,
        'controller' => 'Auth',
        'action' => 'login',
    ];

    public const URL_AFTER_LOGIN = [
        'prefix' => false,
        'plugin' => false,
        'controller' => 'Episodes',
        'action' => 'index',
    ];

    public const URL_AFTER_LOGOUT = AuthController::URL_AFTER_LOGIN;
    public $defaultTable = UsersTable::class;
    public $modelClass = UsersTable::class;

    public function initialize(): void
    {
        parent::initialize();
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['logout', 'login', 'register']);
    }

    /**
     * @return Response|void|null
     */
    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $redirect = $this->request->getQuery('redirect', AuthController::URL_AFTER_LOGIN);

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

    public function logout(): Response
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
        }
        return $this->redirect(AuthController::URL_AFTER_LOGOUT);
    }

    /**
     * @return Response|void|null
     */
    public function register()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            $user->is_admin = false;
            $user->is_manager = false;
            $user->is_enabled = true;

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(AuthController::URL_LOGIN);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
}
