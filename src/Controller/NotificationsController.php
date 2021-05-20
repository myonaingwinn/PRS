<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class NotificationsController extends AppController
{
    public function index()
    {
        $this->loadModel('Surveys');
        $this->loadModel('Products');
        $this->loadModel('Admins');
        $this->loadModel('Categories');
        $this->loadModel('Answers');
        $this->loadModel('Users');

        $this->paginate = [
            'contain' => ['Products', 'Categories', 'Admins']
        ];
        $user_id = $this->Auth->user('id');
        $data = $this->Surveys->find('all')->where(['public' => 'Y'])
            ->notMatching(
                "Answers",
                function ($q) use ($user_id) {
                    return $q->where(["Answers.user_id" => $user_id]);
                }
            );
        $surveys = $this->paginate($data);

        $this->set(compact('surveys'));
        $this->set('_serialize', ['surveys']);
    }

    public function answer($id = null)
    {
        return $this->redirect('add_answer/' . $id);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        if ($this->Auth->user())
            $this->Auth->allow(['index', 'answer']);
    }
}
