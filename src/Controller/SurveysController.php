<?php

namespace App\Controller;

use App\Controller\AppController;
// use Cake\ORM\TableRegistry;

/**
 * Surveys Controller
 *
 * @property \App\Model\Table\SurveysTable $Surveys
 *
 * @method \App\Model\Entity\Survey[] paginate($object = null, array $settings = [])
 */
class SurveysController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products', 'Categories', 'Admins']
        ];
        $surveys = $this->paginate($this->Surveys);

        $this->set(compact('surveys'));
        $this->set('_serialize', ['surveys']);
    }

    /**
     * View method
     *
     * @param string|null $id Survey id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $survey = $this->Surveys->get($id, [
            'contain' => ['Products', 'Categories', 'Admins', 'Answers', 'Options', 'Questions']
        ]);

        $this->set('survey', $survey);
        $this->set('_serialize', ['survey']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // $questions = TableRegistry::getTableLocator()->get('Questions');
        // $Options = TableRegistry::getTableLocator()->get('Options');
        $this->loadModel('Questions');
        $this->loadModel('Options');

        $survey = $this->Surveys->newEntity();
        $question = $this->Questions->newEntity();
        $Option = $this->Options->newEntity();

        // return debug($option);

        if ($this->request->is('post')) {
            $survey = $this->Surveys->patchEntity($survey, $this->request->getData());

            $totalCard = $this->request->getData('card_array');
            $admin_id = $this->request->getData('admin_id');
            // $admin_id = $this->request->getData('admin_id');
            $currDateTime = date("Y-m-d H:i:s");

            $cards = json_decode($totalCard, true);

            // $options = [];

            /* foreach ($cards as $card) {
                $questionType = $card['type'];
                $questionText = $card['question'];

                $options = $card['options'];
            } */

            // debug($options);
            // return debug($cards);

            if ($SResult = $this->Surveys->save($survey)) {
                $this->Flash->success(__('The survey has been saved.'));

                //save question
                foreach ($cards as $card) {
                    $question->type = $card['type'];
                    $question->description = $card['question'];
                    $question->survey_id = $SResult->id;
                    $question->admin_id = $admin_id;
                    $question->created = $currDateTime;
                    $question->modified = $currDateTime;

                    if ($QResult = $this->Questions->save($question)) {
                        $this->Flash->success(__('The question has been saved.'));

                        $options = $card['options'];
                        if (!empty($options)) {
                            foreach ($options as $optionL) {
                                $Option->description = $optionL;
                                $Option->survey_id = $SResult->id;
                                $Option->question_id = $QResult->id;
                                $Option->admin_id = $admin_id;
                                $Option->created = $currDateTime;
                                $Option->modified = $currDateTime;

                                if ($this->Options->save($Option)) {
                                    $this->Flash->success(__('The options : ' . $optionL . ' have been saved.'));
                                }
                                $Option = $this->Options->newEntity();
                            }
                        }
                        $question = $this->Questions->newEntity();
                    }
                }

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The survey could not be saved. Please, try again.'));
        }
        $products = $this->Surveys->Products->find('list', ['limit' => 200]);
        $categories = $this->Surveys->Categories->find('list', ['limit' => 200]);
        $admins = $this->Surveys->Admins->find('list', ['limit' => 200]);

        $this->loadModel('Products');
        $my_products = $this->Products->find('all');
        // $this->set(compact('products'));
        $this->loadModel('Categories');
        $my_categories = $this->Categories->find('all');
        // $this->set(compact('categories'));
        $this->set(compact('survey', 'products', 'categories', 'admins', 'my_products', 'my_categories'));
        $this->set('_serialize', ['survey']);
    }

    public function saveData($entity, $table)
    {
        $result = $this->$table->save($entity);
        return $result;
    }

    /**
     * Edit method
     *
     * @param string|null $id Survey id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $survey = $this->Surveys->get($id, [
            'contain' => []
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
        $this->set('_serialize', ['survey']);
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
