<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Routing\Router;
use DateTime;
use LengthException;


/**
 * Prizes Controller
 *
 *
 * @method \App\Model\Entity\Prize[] paginate($object = null, array $settings = [])
 */
class PrizesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
   

    public function prizelist(){

       
       
        $prizes = $this->paginate($this->Prizes);

        $this->set(compact('prizes'));
        $this->set('_serialize', ['prizes']);

     

       
        //$prizes = $Prizes->find()->where(['prize_id' => 1])->first();

        //condition check
       //$prizes = $this->Prizes->find('all')->where(['modified' => '2021-04-03']);
      // $prizes = $this->Prizes->find('all')->order(['prize_id DESC']);
     
       
       //$this->set('prizes',$prizes);
      

       //debug($prizes);


    //  exit();
    

        }
    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function prizeadd()
    {
    
        $prize = $this->Prizes->newEntity();
        if ($this->request->is('post')) {

            $prizes = $this->request->getData('prize_name');
            $pr_count = $this->Prizes->find()->where(['prize_name'=> $prizes ])->count();
            if($pr_count>=1){
                $this->Flash->success(__('The prize name is existed.'));
            }
            else{

                $prize = $this->Prizes->patchEntity($prize, $this->request->getData());
            
         
            if ($this->Prizes->save($prize)) {
                $this->Flash->success(__('The prize has been saved.'));
               

                return $this->redirect(['action' => 'prizelist']);
            }
            $this->Flash->error(__('The prize could not be saved. Please, try again.'));
            }
          
        }
        $this->set(compact('prize'));
        $this->set('_serialize', ['prize']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Prize id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
      

        $prize = $this->Prizes->get($id, [
            'contain' => []
        ]);

        
        if ($this->request->is(['patch', 'post', 'put'])) {

            $prizes = $this->request->getData('prize_name');
            $pr_count = $this->Prizes->find()->where(['prize_name'=> $prizes ])->count();
            if($pr_count>1){
                $this->Flash->success(__('The prize name is existed.'));
            }
            else{

                $prize = $this->Prizes->patchEntity($prize, $this->request->getData());
    
        
          
                if($this->Prizes->save($prize)){
                 
                         $this->Flash->success(__('The prize has been updated'));
     
                         return $this->redirect(['action' => 'prizelist']);
                     
                 
                 }
     
                 
                 $this->Flash->error(__('The prize could not be updated. Please, try again.'));
            }
           
           

        }
        $this->set(compact('prize'));
        $this->set('_serialize', ['prize']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Prize id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prize = $this->Prizes->get($id);
        if ($this->Prizes->delete($prize)) {
            $this->Flash->success(__('The prize has been deleted.'));
        } else {
            $this->Flash->error(__('The prize could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'prizelist']);
    }

    
   
}
