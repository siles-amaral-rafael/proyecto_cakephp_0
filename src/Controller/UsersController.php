<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Response;

/**
 * Users — login, logout, entrada
 */
class UsersController extends AppController
{
    /**
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->Authentication->allowUnauthenticated(['home', 'login', 'logout']);
    }

    /**
     * Raíz: redirige según sesión y rol.
     *
     * @return \Cake\Http\Response|null
     */
    public function home(): ?Response
    {
        $identity = $this->Authentication->getIdentity();
        if ($identity === null) {
            return $this->redirect(['action' => 'login']);
        }

        return $this->redirectAfterLogin();
    }

    /**
     * Formulario de acceso (correo + contraseña).
     *
     * @return \Cake\Http\Response|null
     */
    public function login(): ?Response
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        if ($result !== null && $result->isValid()) {
            return $this->redirectAfterLogin();
        }

        if ($this->request->is('post') && ($result === null || !$result->isValid())) {
            $this->Flash->error(__('Correo o contraseña incorrectos.'));
        }

        return null;
    }

    /**
     * Cierra sesión.
     *
     * @return \Cake\Http\Response|null
     */
    public function logout(): ?Response
    {
        $this->Authentication->logout();

        return $this->redirect(['prefix' => false, 'controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Tras login correcto: admin → panel; user → portal.
     *
     * @return \Cake\Http\Response
     */
    protected function redirectAfterLogin(): Response
    {
        $identity = $this->Authentication->getIdentity();
        if ($identity === null) {
            return $this->redirect(['action' => 'login']);
        }

        $role = (string)$identity->get('role');
        if ($role === 'admin') {
            return $this->redirect([
                'prefix' => 'Admin',
                'controller' => 'Users',
                'action' => 'index',
            ]);
        }

        return $this->redirect([
            'prefix' => false,
            'controller' => 'Portal',
            'action' => 'index',
        ]);
    }
}
