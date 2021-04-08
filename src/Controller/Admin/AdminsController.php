<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Utility\Security;
use Cake\Mailer\Email;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Admins Controller
 *
 * @property \App\Model\Table\AdminsTable $Admins
 *
 * @method \App\Model\Entity\Admin[] paginate($object = null, array $settings = [])
 */
class AdminsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $admins = $this->paginate($this->Admins);

        $this->set(compact('admins'));
        $this->set('_serialize', ['admins']);
    }

    /**
     * View method
     *
     * @param string|null $id Admin id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $admin = $this->Admins->get($id, [
            'contain' => ['Companies', 'Options', 'Products', 'Questions', 'Surveys', 'Users']
        ]);

        $this->set('admin', $admin);
        $this->set('_serialize', ['admin']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $admin = $this->Admins->newEntity();
        if ($this->request->is('post')) {
            $admin = $this->Admins->patchEntity($admin, $this->request->getData());
            if ($this->Admins->save($admin)) {
                $this->Flash->success(__('The admin has been saved.'));

                return $this->redirect('/admin/login');
            }
            $this->Flash->error(__('The admin could not be saved. Please, try again.'));
        }
        $this->set(compact('admin'));
        $this->set('_serialize', ['admin']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Admin id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $admin = $this->Admins->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $admin = $this->Admins->patchEntity($admin, $this->request->getData());
            if ($this->Admins->save($admin)) {
                $this->Flash->success(__('The admin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admin could not be saved. Please, try again.'));
        }
        $this->set(compact('admin'));
        $this->set('_serialize', ['admin']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Admin id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $admin = $this->Admins->get($id);
        if ($this->Admins->delete($admin)) {
            $this->Flash->success(__('The admin has been deleted.'));
        } else {
            $this->Flash->error(__('The admin could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            // $admin = $this->Auth->identify();

            $adminPwd = '';
            $ID = '';
            $Admin = $this->Admins->newEntity();
            $hasher = new DefaultPasswordHasher();

            $pwd = $this->request->getData('password');
            $email = $this->request->getData('email');
            $admin = $this->Admins->findByEmail($email);
            $Admin = $this->Admins->findByEmail($email)->first();
            $data = $this->paginate($admin);

            foreach ($data as $d) {
                $adminPwd = $d->password ? $d->password : '';
            }

            if ($hasher->check($pwd, $adminPwd)) {
                $this->Auth->setUser($Admin);
                // return debug($this->Auth->getUser());
                return $this->redirect('/data_analysis');
                // return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('Username or password is incorrect'));
            }
        }
    }

    public function logout()
    {
        $this->Auth->setUser(null);
        // return $this->redirect($this->Auth->logout());
        return $this->redirect('/admin/login');
    }

    public function forgotPassword()
    {
        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            $token = Security::hash(Security::randomBytes(25));

            // $adminTable = $this->Admins;
            if ($email == NULL) {
                $this->Flash->error(__('Please insert your email address'));
            }
            if ($admin = $this->Admins->find('all')->where(['email' => $email])->first()) {
                $admin->token = $token;

                if ($this->Admins->save($admin)) {
                    $mail = new Email('mailTrap');
                    $mail->setTo($email)
                        ->setSubject('Reset your password.')
                        ->setEmailFormat('html')
                        ->send('Hi ' . $admin->name . ',<br/>You can reset your password by clicking link below<br/><a href="http://localhost:8765/admin/resetPassword/' . $token . '">Reset Password</a>.');
                }
                $this->Flash->success('Reset password link has been sent to your email (' . $email . '), please check your email');
            }
            if ($this->Admins->find('all')->where(['email' => $email])->count() == 0) {
                $this->Flash->error(__('Email is not registered in system'));
            }
        }
    }

    public function resetPassword($token)
    {
        if ($this->request->is('post')) {
            $newPass = $this->request->getData('password');

            $admin = $this->Admins->find('all')->where(['token' => $token])->first();
            $admin->password = $newPass;
            if ($this->Admins->save($admin)) {
                $this->Flash->success('Password successfully reset. Please login using your new password.');
                return $this->redirect(['action' => 'login']);
            }
        }
    }
}
