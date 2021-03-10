<?php

namespace App\Controller;



class AdminController extends AppController{
    public function prizelist(){

       
        $this->viewBuilder()->setLayout('ajax');
    //  exit();

        }


        public function prizeadd(){

            $this->viewBuilder()->setLayout('ajax');
            // $this->viewBuilder()->setLayout('home');
         //  exit();
     
             }
}