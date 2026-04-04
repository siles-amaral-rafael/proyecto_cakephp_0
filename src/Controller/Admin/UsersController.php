<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;

/**
 * CRUD de usuarios (solo administradores).
 */
class UsersController extends AppController
{
    /**
     * @return void
     */
    public function index(): void
    {
        $users = $this->paginate($this->Users->find()->orderBy(['Users.id' => 'ASC']));
        $this->set(compact('users'));
    }

    /**
     * @param string|null $id Id
     * @return void
     */
    public function view(?string $id = null): void
    {
        if ($id === null) {
            throw new NotFoundException(__('Usuario no encontrado.'));
        }
        $user = $this->Users->get($id, contain: []);
        $this->set(compact('user'));
    }

    /**
     * @return \Cake\Http\Response|null
     */
    public function add(): ?Response
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->request->getData('password') === '') {
                $this->Flash->error(__('Debe indicar una contraseña.'));

                return null;
            }
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuario guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guardar el usuario. Revise los datos.'));
        }
        $this->set(compact('user'));

        return null;
    }

    /**
     * @param string|null $id Id
     * @return \Cake\Http\Response|null
     */
    public function edit(?string $id = null): ?Response
    {
        if ($id === null) {
            throw new NotFoundException(__('Usuario no encontrado.'));
        }
        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            if (isset($data['password']) && $data['password'] === '') {
                unset($data['password']);
            }
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuario actualizado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo actualizar el usuario.'));
        }
        $this->set(compact('user'));

        return null;
    }

    /**
     * @param string|null $id Id
     * @return \Cake\Http\Response|null
     */
    public function delete(?string $id = null): ?Response
    {
        $this->request->allowMethod(['post', 'delete']);
        if ($id === null) {
            throw new NotFoundException(__('Usuario no encontrado.'));
        }
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Usuario eliminado.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar el usuario.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
