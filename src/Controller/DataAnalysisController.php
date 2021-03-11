<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * DataAnalysis Controller
 *
 *
 * @method \App\Model\Entity\DataAnalysi[] paginate($object = null, array $settings = [])
 */
class DataAnalysisController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        // 'value' => 'name'

        $currDateTime = date("Y-m-d H:i:s");
        //echo ($currDateTime);

        $categories = TableRegistry::get('categories');

        $query = $categories->find('all');
        $this->set('categories_list', $query);

        $products = TableRegistry::get('products');
        $answers = TableRegistry::get('answers');
        $connection = ConnectionManager::get('default');
        $results1 = $connection->execute('SELECT distinct product_image as pimage, product_name as pname, product_model_no as pmodel_no from `answers`, `products` WHERE products.id=answers.product_id and
         answers.rating>3')->fetchAll('assoc');
        // echo ($results1);

        $this->set('product_list', $results1);
    }
}
