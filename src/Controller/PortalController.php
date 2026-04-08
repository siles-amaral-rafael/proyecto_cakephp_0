<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Response;

class PortalController extends AppController
{
    // Definimos la configuración de paginación
    protected array $paginate = [
        'limit' => 5, // Mostraremos 5 por página para que sea fácil probar
        'order' => ['id' => 'desc']
    ];
    
    public function index(): ?Response
    {
        $identity = $this->Authentication->getIdentity();
        if ($identity === null) {
            return $this->redirect(['prefix' => false, 'controller' => 'Users', 'action' => 'login']);
        }
        
        if ($identity->get('role') === 'admin') {
            return $this->redirect(['prefix' => 'Admin', 'controller' => 'Users', 'action' => 'index']);
        }
        
        // Paginamos la tabla Multimedia
        $multimedia = $this->paginate($this->fetchTable('Multimedia'), [
            'scope' => 'multimedia' // Útil si quieres paginar dos tablas después
        ]);
        
        // Para usuarios, si quieres mostrar todos o también paginar:
        $usuarios = $this->fetchTable('Users')->find()->all();
        
        $this->set(compact('usuarios', 'multimedia'));
        $this->set('title', __('Portal de Medios'));
        
        return null;
    }
}