<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Response;

/**
 * Área simple para usuarios con rol "user".
 */
class PortalController extends AppController
{
    /**
     * Página principal del usuario no administrador.
     *
     * @return \Cake\Http\Response|null
     */
    public function index(): ?Response
    {
        $identity = $this->Authentication->getIdentity();
        if ($identity === null) {
            return $this->redirect(['prefix' => false, 'controller' => 'Users', 'action' => 'login']);
        }

        if ($identity->get('role') === 'admin') {
            return $this->redirect([
                'prefix' => 'Admin',
                'controller' => 'Users',
                'action' => 'index',
            ]);
        }

        $this->set('title', __('Bienvenido'));

        return null;
    }
}
