<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;

/**
 * CRUD de multimedia (solo administradores).
 */
class MultimediaController extends AppController
{
    /**
     * @return void
     */
    public function index(): void
    {
        $multimedia = $this->paginate(
            $this->Multimedia->find()->orderBy(['Multimedia.id' => 'ASC']),
        );
        $this->set(compact('multimedia'));
    }

    /**
     * @param string|null $id Id
     * @return void
     */
    public function view(?string $id = null): void
    {
        if ($id === null) {
            throw new NotFoundException(__('Registro no encontrado.'));
        }
        $multimedia = $this->Multimedia->get($id, contain: []);
        $this->set(compact('multimedia'));
    }

    /**
     * @return \Cake\Http\Response|null
     */
    public function add(): ?Response
    {
        $item = $this->Multimedia->newEmptyEntity();
        if ($this->request->is('post')) {
            $item = $this->Multimedia->patchEntity($item, $this->request->getData());
            if ($this->Multimedia->save($item)) {
                $this->Flash->success(__('Registro guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guardar. Revise los datos.'));
        }
        $this->set('multimedia', $item);

        return null;
    }

    /**
     * @param string|null $id Id
     * @return \Cake\Http\Response|null
     */
    public function edit(?string $id = null): ?Response
    {
        if ($id === null) {
            throw new NotFoundException(__('Registro no encontrado.'));
        }
        $item = $this->Multimedia->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Multimedia->patchEntity($item, $this->request->getData());
            if ($this->Multimedia->save($item)) {
                $this->Flash->success(__('Registro actualizado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo actualizar.'));
        }
        $this->set('multimedia', $item);

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
            throw new NotFoundException(__('Registro no encontrado.'));
        }
        $item = $this->Multimedia->get($id);
        if ($this->Multimedia->delete($item)) {
            $this->Flash->success(__('Registro eliminado.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
