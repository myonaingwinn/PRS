<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Surveys Controller
 *
 * @property \App\Model\Table\SurveysTable $Surveys
 *
 * @method \App\Model\Entity\Survey[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SurveysController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $total = $this->Surveys->find();
        $this->paginate = [
            'contain' => ['Products', 'Categories', 'Admins', 'Questions', 'Answers' ],
        ];
        
        $surveys = $this->paginate($this->Surveys);
        
        $query = $total->select(['id'])->where(['product_id' => 18 ])->count();

        $this->set(compact('surveys'));
        $this->set('total', $query);
    }

    /**
     * View method
     *
     * @param string|null $id Survey id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $survey = $this->Surveys->get($id, [
            'contain' => ['Products', 'Categories', 'Admins', 'Answers', 'Options', 'Questions'],
        ]);

        $this->set('survey', $survey);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $survey = $this->Surveys->newEntity();
        if ($this->request->is('post')) {
            $survey = $this->Surveys->patchEntity($survey, $this->request->getData());
            if ($this->Surveys->save($survey)) {
                $this->Flash->success(__('The survey has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The survey could not be saved. Please, try again.'));
        }
        $products = $this->Surveys->Products->find('list', ['limit' => 200]);
        $categories = $this->Surveys->Categories->find('list', ['limit' => 200]);
        $admins = $this->Surveys->Admins->find('list', ['limit' => 200]);
        $this->set(compact('survey', 'products', 'categories', 'admins'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Survey id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $survey = $this->Surveys->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $survey = $this->Surveys->patchEntity($survey, $this->request->getData());
            if ($this->Surveys->save($survey)) {
                $this->Flash->success(__('The survey has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The survey could not be saved. Please, try again.'));
        }
        $products = $this->Surveys->Products->find('list', ['limit' => 200]);
        $categories = $this->Surveys->Categories->find('list', ['limit' => 200]);
        $admins = $this->Surveys->Admins->find('list', ['limit' => 200]);
        $this->set(compact('survey', 'products', 'categories', 'admins'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Survey id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $survey = $this->Surveys->get($id);
        if ($this->Surveys->delete($survey)) {
            $this->Flash->success(__('The survey has been deleted.'));
        } else {
            $this->Flash->error(__('The survey could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
