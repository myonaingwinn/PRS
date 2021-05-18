<?php

namespace App\Controller;

use Cake\I18n\Time;
use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Answers Controller
 *
 * @property \App\Model\Table\AnswersTable $Answers
 *
 * @method \App\Model\Entity\Answer[] paginate($object = null, array $settings = [])
 */
class AnswersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Surveys']
        ];
        $Answer = $this->Answers->find('all')->where(['user_id' => $this->Auth->user('id')])->group('survey_id');

        // $surveys = $this->paginate($Surveys);
        $answers = $this->paginate($Answer);

        $this->set(compact('answers'));
        $this->set('_serialize', ['answers']);
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
        /* $answer = $this->Answers->get($id, [
            'contain' => ['Products', 'Categories', 'Questions', 'Surveys', 'Options', 'Users']
        ]);

        $this->set('answer', $answer);
        $this->set('_serialize', ['answer']); */
        $answers = $this->Answers->find('all')->where(['user_id' => $this->Auth->user('id'), 'survey_id' => $id]);
        $this->loadModel('Surveys');
        $this->loadModel('Questions');
        $this->loadModel('Options');
        if ($this->request->is('post')) {
            return $this->redirect(['action' => 'index']);
        }
        $survey = $this->Surveys->find()->select(['id', 'title' => 'name', 'description', 'category_id', 'product_id'])->where(['id' => $id, 'del_flg' => 'not'])->toArray();

        $questions = $this->Questions->find()->select(['id', 'type', 'description'])->where(['survey_id' => $id, 'del_flg' => 'not']);

        $options = $this->Options->find()->select(['id', 'question_id', 'description'])->where(['survey_id' => $id, 'del_flg' => 'not']);

        $this->set(compact('survey', 'questions', 'options', 'answers'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($surveyID = null)
    {
        $this->loadModel('Surveys');
        $this->loadModel('Questions');
        $this->loadModel('Options');

        // time zone
        $currDateTime = Time::now();
        $currDateTime->timezone = 'Asia/Yangon';

        $answer = $this->Answers->newEntity();
        if ($this->request->is('post')) {
            // $answer = $this->Answers->patchEntity($answer, $this->request->getData());

            $answers = $this->request->getData('answers');
            $answers = json_decode($answers, true);

            $rating = '';
            $remark = '';

            $rating = $this->getRemarkNRating($answers, 'rating');
            $remark = $this->getRemarkNRating($answers, 'remark');

            // debug($answers);

            // remove from array
            foreach ($answers as $k => $val) {
                foreach ($val as $key => $value) {
                    if ($key == 'rating') {
                        array_splice($answers, $k, 1);
                    }
                }
            }
            foreach ($answers as $k => $val) {
                foreach ($val as $key => $value) {
                    if ($key == 'remark') {
                        array_splice($answers, $k, 1);
                    }
                }
            }

            // return debug($answers);

            if (!empty($answers)) {
                foreach ($answers as $ans) {
                    $answer->user_id = $this->Auth->user('id');
                    $answer->category_id = $this->request->getData('category_id');
                    $answer->product_id = $this->request->getData('product_id');
                    $answer->survey_id = $this->request->getData('survey_id');

                    $answer->question_id = $ans['question'];
                    $answer->created = $currDateTime;
                    $answer->rating = $rating;
                    $answer->remark = $remark;
                    if (!empty($ans['option'])) {
                        $answer->option_id = $ans['option'];
                        $this->saveAnswer($answer);
                    } else if (!empty($ans['answer'])) {
                        $answer->answer = $ans['answer'];
                        $this->saveAnswer($answer);
                    } else if (!empty($ans['options'])) {
                        $options = $ans['options'];
                        foreach ($options as $option) {
                            $answer->option_id = $option;
                            $this->saveAnswer($answer);
                        }
                    }
                    $answer = $this->Answers->newEntity();
                }
            }
            return $this->redirect('/user/spin');
            /*             if ($this->Answers->save($answer)) {
                $this->Flash->success(__('The answer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The answer could not be saved. Please, try again.')); */
        }
        // $products = $this->Answers->Products->find('list', ['limit' => 200]);
        // $categories = $this->Answers->Categories->find('list', ['limit' => 200]);
        // $questions = $this->Answers->Questions->find('list', ['limit' => 200]);
        // $surveys = $this->Answers->Surveys->find('list', ['limit' => 200]);
        // $options = $this->Answers->Options->find('list', ['limit' => 200]);
        // $users = $this->Answers->Users->find('list', ['limit' => 200]);
        // $this->set(compact('answer', 'products', 'categories', 'questions', 'surveys', 'options', 'users'));

        $survey = $this->Surveys->find()->select(['id', 'title' => 'name', 'description', 'category_id', 'product_id'])->where(['id' => $surveyID, 'del_flg' => 'not'])->toArray();

        $questions = $this->Questions->find()->select(['id', 'type', 'description'])->where(['survey_id' => $surveyID, 'del_flg' => 'not']);

        $options = $this->Options->find()->select(['id', 'question_id', 'description'])->where(['survey_id' => $surveyID, 'del_flg' => 'not']);

        // $my_surveys = $this->Surveys->find('all');

        $this->set(compact('answer', 'survey', 'questions', 'options'));
        $this->set('_serialize', ['answer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Answer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    /*     public function edit($id = null)
    {
        $answer = $this->Answers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $answer = $this->Answers->patchEntity($answer, $this->request->getData());
            if ($this->Answers->save($answer)) {
                $this->Flash->success(__('The answer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The answer could not be saved. Please, try again.'));
        }
        $products = $this->Answers->Products->find('list', ['limit' => 200]);
        $categories = $this->Answers->Categories->find('list', ['limit' => 200]);
        $questions = $this->Answers->Questions->find('list', ['limit' => 200]);
        $surveys = $this->Answers->Surveys->find('list', ['limit' => 200]);
        $options = $this->Answers->Options->find('list', ['limit' => 200]);
        $users = $this->Answers->Users->find('list', ['limit' => 200]);
        $this->set(compact('answer', 'products', 'categories', 'questions', 'surveys', 'options', 'users'));
        $this->set('_serialize', ['answer']);
    } */

    /**
     * Delete method
     *
     * @param string|null $id Answer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*     public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $answer = $this->Answers->get($id);
        $answer->del_flg = 'deleted';
        if ($this->Answers->save($answer)) {
            $this->Flash->success(__('The answer has been deleted.'));
        } else {
            $this->Flash->error(__('The answer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    } */

    public function saveAnswer($answer)
    {
        if ($this->Answers->save($answer)) {
            // $this->Flash->success(__('The answer has been saved.'));
        } else
            $this->Flash->error(__('The answer could not be saved. Please, try again.'));
    }

    public function getRemarkNRating($answers, $keyword)
    {
        $result = '';
        foreach ($answers as $k => $val) {
            foreach ($val as $key => $value) {
                if ($key == $keyword) {
                    $result = $value;
                    // delete this element from array
                    array_splice($answers, $k, 1);
                    debug($answers);
                }
            }
        }
        return $result;
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        if ($this->Auth->user('name'))
            $this->Auth->allow(['index', 'view', 'add']);
    }
}
