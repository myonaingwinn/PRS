<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

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
        $products = $this->paginate($this->Products->find('all', array('conditions' => array('Products.del_flg' => 'not'))));
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

    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());

            //Delete Flag
            $product->del_flg = "not";

            //Image Upload
            $fileimage = $this->request->getData('image');
            $nameimage = $fileimage['name'];
            $target_image = WWW_ROOT . 'upload' . DS . 'images' . DS . $nameimage;
            if (move_uploaded_file($fileimage['tmp_name'], $target_image)) {
                if (!empty($nameimage)) {
                    $product->image = $nameimage;
                }
            }

            //Video Upload
            $filevideo = $this->request->getdata('video');
            $namevideo = $filevideo['name'];
            $target_video = WWW_ROOT . 'upload' . DS . 'videos' . DS . $namevideo;
            if (move_uploaded_file($filevideo['tmp_name'], $target_video)) {
                if (!empty($namevideo)) {
                    $product->video = $namevideo;
                }
            }

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

    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);

        // image select query
        $query = $this->Products->find()
            ->select(['image'])
            ->where(['id' => $id]);
        $dbimage = $query->first();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());

            //Delete Flag
            $product->del_flg = "not";

            //Image Upload
            $fileimage = $this->request->getData('image');
            $nameimage = $fileimage['name'];
            $target_image = WWW_ROOT . 'upload' . DS . 'images' . DS . $nameimage;
            if (move_uploaded_file($fileimage['tmp_name'], $target_image)) {
                if (!empty($nameimage)) {
                    $product->image = $nameimage;
                }
            } else {
                $product->image = $dbimage['image'];
            }

            //Video Upload
            $filevideo = $this->request->getdata('video');
            $namevideo = $filevideo['name'];
            $target_video = WWW_ROOT . 'upload' . DS . 'videos' . DS . $namevideo;
            if (move_uploaded_file($filevideo['tmp_name'], $target_video)) {
                if (!empty($namevideo)) {
                    $product->video = $namevideo;
                }
            }

            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been updated.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be updated. Please, try again.'));
        }
        $companies = $this->Products->Companies->find('list', ['limit' => 200]);
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $admins = $this->Products->Admins->find('list', ['limit' => 200]);

        $options_com = $this->Products->Companies->find('list', ['keyField' => 'id', 'valueField' => 'name']);
        $options_cat = $this->Products->Categories->find('list', ['keyField' => 'id', 'valueField' => 'name']);

        $this->set(compact('product', 'companies', 'categories', 'admins'));
        $this->set(compact('options_com', 'options_cat'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);

        // Delete Disable
        $query = $this->Products->Answers->find('all', array('conditions' => array('Answers.product_id' => $id)))->select(['id']);
        $data = $query->toArray();
        $products =implode(' ',$data);
        if (!empty($products)){
            $this->Flash->error(__('The product is being used in survey so that could not be deleted.'));
        } else {
            // Delete Flag
            $product->del_flg = "deleted";
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been deleted.'));
            } else {
                $this->Flash->error(__('The product could not be deleted. Please, try again.'));
            }
        }
        
        return $this->redirect(['action' => 'index']);
    }

    public function productlist()
    {
        $this->viewBuilder()->setLayout('ajax');
        $connection = ConnectionManager::get('default');
        $products = $connection->execute('SELECT 
        products.image as product_image,products.name as product_name,products.price as product_price,users.name,answers.rating
       
       FROM products
       JOIN answers
        ON products.id=answers.product_id
       JOIN users
        ON users.id = answers.user_id GROUP BY product_name;')->fetchAll('assoc');
        $this->set('products', $products);
    }
  
    public function search()
    {

        $this->request->allowMethod('ajax');
   
        $keyword = $this->request->query('keyword');

        $query = $this->Products->find('all',[
            'conditions' => ['name LIKE'=>'%'.$keyword.'%'],
            'order' => ['id'=>'DESC'],
            'limit' => 10
        ]);

        $this->set('products', $this->paginate($query));
        $this->set('_serialize', ['products']);

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        if ($this->Auth->user())
            $this->Auth->allow(['productlist', 'delete', 'add', 'index', 'edit', 'view']);
    }
}
