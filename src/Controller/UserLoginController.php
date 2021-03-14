<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Mailer\MailerAwareTrait;
use Cake\Auth\FormAuthenticate;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;

/**

 * UserLogin Controller
 *
 *
 * @method \App\Model\Entity\UserLogin[] paginate($object = null, array $settings = [])
 */
class UserLoginController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public $row;
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
    }
    public function login()
    {
        $upass = 0;
        if ($this->request->is('post')) {

            $user_email = $this->request->getData("email");
            $user_pass = $this->request->getData("password");

            $userTable = TableRegistry::get('Users');
            $ucount1 = $userTable->find('all')->where(['email' => $user_email]);
            $ucount2 = $ucount1->first();
            $ucount = $ucount2["id"];
            $uc = $ucount1->count();
            echo ($uc);
            if ($uc != 0) {
                $upass = $userTable->find('all')->where(['password' => $user_pass], ['id' => $ucount])->count();
                //$upass = $upass1->count(); //$upass = $userTable->find('all')->where(['password' => $user_pass])->count();
            }
            if ($upass == 0) {
                $this->Flash->error('UserName or Password Incorrect!');
            } else {
                return $this->redirect(['controller' => 'DataAnalysis'], ['action' => 'index']);
            }
        }
    }

    public function forgetPassword()
    {
        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            $token = Security::hash(Security::randomBytes(25));

            $userTable = TableRegistry::get('Users');
            if ($email == NULL) {
                $this->Flash->error(__('Please insert your email address'));
            }
            if ($user = $userTable->find('all')->where(['email' => $email])->first()) {
                $user->token = $token;

                if ($userTable->save($user)) {
                    $mail = new Email('mailForget');
                    $mail->from(['ecctester2222@gmail.com' => 'Products Ranking System'])
                        ->to($email)
                        ->subject('My Subject')
                        ->send('Hello! Please click link below to reset your password<a href="http://localhost/PRS/userlogin/resetpassword/' . $email . '"></a>');
                }
                $this->Flash->success('Reset password link has been sent to your email (' . $email . '), please check your email');
            }
            if ($total = $userTable->find('all')->where(['email' => $email])->count() == 0) {
                $this->Flash->error(__('Email is not registered in system'));
            }
        }
    }
    public function resetpassword($email)
    {

        if ($this->request->is('post')) {
            // $hasher = new DefaultPasswordHasher();
            // $newPass = $hasher->hash($this->request->getData('password'));
            $newPass = $this->request->getData('password');

            $userTable = TableRegistry::get('Users');
            $user = $userTable->find('all')->where(['email' => $email])->first();
            $user->password = $newPass;
            if ($userTable->save($user)) {
                $this->Flash->success('Password successfully reset. Please login using your new password');
                return $this->redirect(['action' => 'login']);
            }
        }
    }

    public function register()
    {
        $this->redirect('/register');
    }
}
