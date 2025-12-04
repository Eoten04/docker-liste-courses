<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * IngredientsRecipies Controller
 *
 * @property \App\Model\Table\IngredientsRecipiesTable $IngredientsRecipies
 */
class IngredientsRecipiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->IngredientsRecipies->find()
            ->contain(['Recipies', 'Ingredients']);
        $ingredientsRecipies = $this->paginate($query);

        $this->set(compact('ingredientsRecipies'));
    }

    /**
     * View method
     *
     * @param string|null $id Ingredients Recipy id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ingredientsRecipy = $this->IngredientsRecipies->get($id, contain: ['Recipies', 'Ingredients']);
        $this->set(compact('ingredientsRecipy'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ingredientsRecipy = $this->IngredientsRecipies->newEmptyEntity();
        if ($this->request->is('post')) {
            $ingredientsRecipy = $this->IngredientsRecipies->patchEntity($ingredientsRecipy, $this->request->getData());
            if ($this->IngredientsRecipies->save($ingredientsRecipy)) {
                $this->Flash->success(__('The ingredients recipy has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ingredients recipy could not be saved. Please, try again.'));
        }
        $recipies = $this->IngredientsRecipies->Recipies->find('list', limit: 200)->all();
        $ingredients = $this->IngredientsRecipies->Ingredients->find('list', limit: 200)->all();
        $this->set(compact('ingredientsRecipy', 'recipies', 'ingredients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ingredients Recipy id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ingredientsRecipy = $this->IngredientsRecipies->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ingredientsRecipy = $this->IngredientsRecipies->patchEntity($ingredientsRecipy, $this->request->getData());
            if ($this->IngredientsRecipies->save($ingredientsRecipy)) {
                $this->Flash->success(__('The ingredients recipy has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ingredients recipy could not be saved. Please, try again.'));
        }
        $recipies = $this->IngredientsRecipies->Recipies->find('list', limit: 200)->all();
        $ingredients = $this->IngredientsRecipies->Ingredients->find('list', limit: 200)->all();
        $this->set(compact('ingredientsRecipy', 'recipies', 'ingredients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ingredients Recipy id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ingredientsRecipy = $this->IngredientsRecipies->get($id);
        if ($this->IngredientsRecipies->delete($ingredientsRecipy)) {
            $this->Flash->success(__('The ingredients recipy has been deleted.'));
        } else {
            $this->Flash->error(__('The ingredients recipy could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
