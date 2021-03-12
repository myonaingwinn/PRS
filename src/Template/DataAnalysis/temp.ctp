<style type="text/css">
    g[class^='raphael-group-'][class$='-creditgroup'] {
        display: none !important;
    }
</style>
<?php

use Cake\Core\App;

require_once(ROOT . DS . 'vendor' . DS  . 'fusioncharts' . DS . 'fusioncharts.php');

use Cake\ORM\TableRegistry;

$productType = 2;
$categoryType = 1;
// $categroyData = TableRegistry::get('categories');
// $query = $categoryData->find();
// $this->set('magazines', $query->);
// echo $this->Form->input('name', [
//     'type' => 'select',
//     'multiple' => false,
//     'options' => $magazines,
//     'empty' => true
// ]);


echo $this->Form->create('null', array('type' => 'post', 'url' => ['controller' => 'DataAnalysis', 'action' => 'index']));
//echo $this->Form->control('Countries', ['options' => $countries]);
echo $this->Form->select('size', $countries);
echo $this->Form->radio('gender', ['Masculine', 'Feminine', 'Neuter']);
echo $this->Form->textarea('notes');
echo $this->Form->end();
// pushing category array values
//foreach ($query as $row) {
//}
$data = array();
for ($i = 1; $i <= 3; $i++) {
    $rateResult = getRatingForEachProduct($categoryType, $i);
    $label = "product" . $i;
    array_push(
        $data,
        array(
            "label" => $label,
            "value" => $rateResult
        )
    );
}
$arrData = array(
    "chart" => array(
        "animation" => "0",
        "caption" => "Products Review",
        "subCaption" => "No. Of Visitors Last Week",
        "xAxisName" => "Age",
        "yAxisName" => "No. Of Rating",
        "showValues" => "0",
        // "paletteColors"=> "#81BB76", 
        "useDataPlotColorForLabels" => "1",
        "showHoverEffect" => "1",
        "use3DLighting" => "0",
        "showaxislines" => "1",
        "baseFontSize" => "13",
        "theme" => "fint"
    )
);

$arrData["data"] = $data;
//echo "$data";
$jsonEncodedData = json_encode($arrData);
//echo "$jsonEncodedData";
//$columnChart = new FusionCharts("pie3d", "chart-1", "600", "300", "chart-container1", "json", $jsonEncodedData);

//         // Render the chart
//$columnChart->render();

//--------------------------------------Functions-------------------------------------------------------------------------
function getRatingForEachProduct(int $categoryID, int $productID)
{
    $rate = $total_rate = $total_count = 0;
    $chartData = TableRegistry::get('answers');

    for ($i = 1; $i <= 5; $i++) {

        $query1 = $chartData->find('all', [
            'conditions' => ['category_id =' => $categoryID, 'product_id =' => $productID, 'rating =' => $i]
        ]);
        $rowCount = $query1->count();
        // echo ("<br/>");
        // echo ("\n Query1 Count for rating " . $i . ": " . $rowCount);

        if ($rowCount != 0) {
            $total_rate += $i * $rowCount;
            //echo ($total_rate);
            $total_count += $rowCount;
        }
    }
    $rate = round($total_rate / $total_count);
    //echo ("Rating Calculation for Product: " . $rate);
    return $rate;
}
?>

<?= $this->Flash->render() ?>
<h3>Login</h3>
<?= $this->Form->create() ?>
<fieldset>
    <legend><?= __('Please enter your username and password') ?></legend>
    <?= $this->Form->control('email', ['required' => true]) ?>
    <?= $this->Form->control('password', ['required' => true]) ?>
    <?= $this->Html->link("Forgot Password", ['action' => 'forgetPassword']); ?>
    <?= $this->Form->radio('gender', ['Masculine', 'Feminine', 'Neuter']); ?>
</fieldset>
<?= $this->Form->submit(__('Login')); ?>
Don't have an account?<?= $this->Html->link("Sign up", ['action' => 'register']); ?>

<?= $this->Form->end() ?>



<div id="chart-container1"></div>