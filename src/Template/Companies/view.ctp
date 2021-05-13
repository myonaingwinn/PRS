<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company $company
 */

use Cake\ORM\TableRegistry;
//$categories_list = $categories->find('all', array('condition' => array('$selected_list LIKE %' => 'id%')));

$categories = TableRegistry::get('categories');
$companies = TableRegistry::get('companies');
$selected_list  = "";
$categories_list = $categories->find('all')->where(["del_flg" => "not"])->order(['name' => 'ASC']);
//SELECT * FROM Companies WHERE category_type LIKE '%4%'
$type_list = $companies->find('all')->where(["id" => $company["id"]]);
foreach ($type_list as $t) {
    $selected_list = $t['category_type'];
}

?>

<div class="companies view large-9 medium-8 columns content">
    <h3><?= h($company->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($company->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Website') ?></th>
            <td><?= h($company->website) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($company->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($company->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other Phone') ?></th>
            <td><?= h($company->other_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($company->id) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Types of Products') ?></th>
            <td><?php

                foreach ($categories_list as $cat) :
                    if (strpos($selected_list, strval($cat->id)) !== false) {
                        echo $cat->name . "<br>";
                    }

                ?> <?php endforeach; ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= date('Y-m-d', strtotime(h($company->created))); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= date('Y-m-d', strtotime(h($company->modified))); ?></td>
        </tr>
    </table>
    <div class="row">
        <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'waves-effect waves-light btn left indigo']) ?>
    </div>

</div>