<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Companies', 'Categories', 'Admins'],
        ];
        $products = $this->paginate($this->Products);
        $answers = $this->Products->Answers->find()->contain(['Answers' => ['rating']]);
       
        $this->set(compact('products'));
        $this->set(compact('answers'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Companies', 'Categories', 'Admins', 'Answers', 'Surveys'],
        ]);

        $this->set('product', $product);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            
            // $fileimage = $this->request->data('product_image');
            // var_dump($fileimage);
            // $nameimage = $fileimage['name'];
            // $target_image = WWW_ROOT . 'upload' . DS . 'images' . DS . $nameimage;
            // if (move_uploaded_file($fileimage['tmp_name'], $target_image)) {
            //     if (!empty($nameimage)) {
            //         $product->product_image = $nameimage;
            //     }
            // }

            // $filevideo = $this->request->data('product_video');
            // var_dump($filevideo);
            // $namevideo = $filevideo['name'];
            // $target_video = WWW_ROOT . 'upload' . DS . 'videos' . DS . $namevideo;
            // if (move_uploaded_file($filevideo['tmp_name'], $target_video)) {
            //     if (!empty($namevideo)) {
            //         $product->product_video = $namevideo;
            //     }
            // }
            
            if ($this->Products->save($product)) {
                
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));    
        }        
        $companies = $this->Products->Companies->find('list', ['limit' => 200]);
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $admins = $this->Products->Admins->find('list', ['limit' => 200]);
        $options_com = $this->Products->Companies->find('list', ['keyField' => 'id', 'valueField' => 'name']);
        $options_cat = $this->Products->Categories->find('list', ['keyField' => 'id', 'valueField' => 'name']);        
        $this->set(compact('product', 'companies', 'categories', 'admins'));        
        $this->set(compact('options_com', 'options_cat'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $companies = $this->Products->Companies->find('list', ['limit' => 200]);
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $admins = $this->Products->Admins->find('list', ['limit' => 200]);
        $options_com = $this->Products->Companies->find('list', ['keyField' => 'id', 'valueField' => 'name']);
        $options_cat = $this->Products->Categories->find('list', ['keyField' => 'id', 'valueField' => 'name']);        
        $this->set(compact('product', 'companies', 'categories', 'admins'));        
        $this->set(compact('options_com', 'options_cat'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    // public function productlist(){

    //     $this->viewBuilder()->setLayout('ajax');
     
    
    
    //     $connection = ConnectionManager::get('default');
    //     $products = $connection->execute('SELECT 
    //     products.product_image,products.product_name,products.product_price,users.name,answers.rating
       
    //    FROM products
    //    JOIN answers
    //     ON products.id=answers.product_id
    //    JOIN users
    //     ON users.id = answers.user_id GROUP BY products.product_name;')->fetchAll('assoc');
    
    //    // $this->loadModel('products');
    //    //$products = $this->products->find('all');
    //    //$this->paginate=['contain'=>['answer'],];
    //    //$products = $this->Product->find('all',array('fields'=>array('products.product_image','products.product_name','products.product_price','products.product_name','products.product_name','products.product_name'),'conditions'=>array('del_flg'=>1)));
       
    //    $this->set('products',$products);
    
    
    // }
    
}
