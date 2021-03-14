<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Answers Controller
 *
 * @property \App\Model\Table\AnswersTable $Answers
 *
 * @method \App\Model\Entity\Answer[] paginate($object = null, array $settings = [])
 */
class AnswerController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $connection = ConnectionManager::get('default');
        $answers = $connection->execute('SELECT 
        answers.id,answers.survey_id,surveys.name,answers.rating,answers.created,categories.name as category_name,products.name as product_name,users.name as username
       FROM answers
       JOIN products
        ON product_id=products.id 
        JOIN surveys
        ON survey_id=surveys.id
        JOIN categories
        ON answers.category_id=categories.id 
       JOIN users
        ON user_id = users.id')->fetchAll('assoc');


        $this->viewBuilder()->setLayout('ajax');

        //$this->set('prizes',$prizes);
        $this->set('answers', $answers);
    }

    /**
     * View method
     *
     * @param string|null $id Answer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $surveyID = $id;
        $this->loadModel('Surveys');
        $this->loadModel('Questions');
        $this->loadModel('Options');


        if ($this->request->is('post')) {
            return $this->redirect(['action' => 'index']);
        }
        $survey = $this->Surveys->find()->select(['id', 'title' => 'name', 'description', 'category_id', 'product_id'])->where(['id' => $surveyID, 'del_flg' => 'not'])->toArray();

        $questions = $this->Questions->find()->select(['id', 'type', 'description'])->where(['survey_id' => $surveyID, 'del_flg' => 'not']);

        $options = $this->Options->find()->select(['id', 'question_id', 'description'])->where(['survey_id' => $surveyID, 'del_flg' => 'not']);


        $this->set(compact('survey', 'questions', 'options'));
    }
}
