<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController as BaseController;
use Cake\Event\EventInterface;
use Cake\Http\Response;

/**
 * Controlador base del prefijo Admin (solo rol admin).
 */
class AppController extends BaseController
{
    /**
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
    }

    /**
     * Evita URLs erróneas /admin/.../logout: delega en el cierre de sesión global.
     *
     * @return \Cake\Http\Response
     */
    public function logout(): Response
    {
        return $this->redirect([
            'prefix' => false,
            'controller' => 'Users',
            'action' => 'logout',
        ]);
    }

    /**
     * @param \Cake\Event\EventInterface<\Cake\Controller\Controller> $event Event
     * @return \Cake\Http\Response|null|void
     */
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        $identity = $this->Authentication->getIdentity();
        if ($identity === null) {
            return;
        }

        if ($identity->get('role') !== 'admin') {
            $this->Flash->error(__('No tiene permisos de administrador.'));

            return $this->redirect([
                'prefix' => false,
                'controller' => 'Portal',
                'action' => 'index',
            ]);
        }

        return null;
    }
}
