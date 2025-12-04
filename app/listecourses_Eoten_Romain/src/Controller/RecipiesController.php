<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Recipies Controller
 *
 * @property \App\Model\Table\RecipiesTable $Recipies
 */
class RecipiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Recipies->find()->limit(5);
        $recipies = $this->paginate($query);
        $this->set(compact('recipies'));
    }

    public function listing()
    {
        $query = $this->Recipies->find();
        $recipies = $this->paginate($query);
        $this->set(compact('recipies'));
    }

    /**
     * View method
     *
     * @param string|null $id Recipy id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id)
    {

            $recipies = $this->Recipies->get($id, contain: ['Ingredients']);
            $this->set(compact('recipies'));

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recipy = $this->Recipies->newEmptyEntity();
        if ($this->request->is('post')) {
            $recipy = $this->Recipies->patchEntity($recipy, $this->request->getData());
            if ($this->Recipies->save($recipy)) {
                $this->Flash->success(__('The recipy has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recipy could not be saved. Please, try again.'));
        }
        $ingredients = $this->Recipies->Ingredients->find('list', limit: 200)->all();
        $this->set(compact('recipy', 'ingredients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Recipy id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recipy = $this->Recipies->get($id, contain: ['Ingredients']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recipy = $this->Recipies->patchEntity($recipy, $this->request->getData());
            if ($this->Recipies->save($recipy)) {
                $this->Flash->success(__('The recipy has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recipy could not be saved. Please, try again.'));
        }
        $ingredients = $this->Recipies->Ingredients->find('list', limit: 200)->all();
        $this->set(compact('recipy', 'ingredients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Recipy id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recipy = $this->Recipies->get($id);
        if ($this->Recipies->delete($recipy)) {
            $this->Flash->success(__('The recipy has been deleted.'));
        } else {
            $this->Flash->error(__('The recipy could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
