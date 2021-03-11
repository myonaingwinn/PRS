<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style type="text/css">
    g[class^='raphael-group-'][class$='-creditgroup'] {
        display: none !important;
    }

    table {
        display: block;
        max-width: -moz-fit-content;
        max-width: fit-content;
        margin: 0 auto;
        overflow-x: auto;
        white-space: nowrap;
    }

    .hline {
        text-align: center;
        background-color: #CEF6CE;
        border: 2px solid green;
    }

    h3 {
        color: #298A08;

    }

    .button {
        border: 2px;
        width: 200px;
        height: 50px;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        background-color: #4CAF50;

    }

    .striped-border {
        border: 1px dashed #000;
        width: 50%;
        margin: auto;
        margin-top: 5%;
        margin-bottom: 5%;
        background-color: #4CAF50;

    }

    .checked {
        color: orange;
    }
</style>
<?php

use Cake\Core\App;

require_once(ROOT . DS . 'vendor' . DS  . 'fusioncharts' . DS . 'fusioncharts.php');

use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

$productType = 1;
$categoryType = 1;
$pid = 2;
$pList = displayProducts($categoryType);
$prodFeed = getFeedback($pid);

if (isset($_POST['peach'])) {

    foreach ($_POST['Color'] as $select) {
        $pList = displayProducts($select);
        getPieCharts($select);
    }
}
if (isset($_POST['showproduct'])) {

    //getPieCharts($select1);
    foreach ($_POST['Pro'] as $select) {
        $prodFeed = getFeedback($select);
        getColunCharts($select);
    }
}

getPieCharts($categoryType);
//echo "$jsonEncodedData";
getColunCharts(1);



//--------------------------------------Functions-------------------------------------------------------------------------
function displayProducts($categoryID)
{
    $products = TableRegistry::get('products');

    $pList = $products->find('all', [
        'conditions' => ['category_id =' => $categoryID]
    ]);
    // $this->set('categories_list', $query);
    return $pList;
}
function getColunCharts($productID)
{
    $dataChart = getAvgRating($productID);

    $arrData1 = array(
        "chart" => array(
            "animation" => "0",
            "caption" => "Product Review by Age",
            // "subCaption" => "No. Of Visitors Last Week",
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

    $arrData1["data"] = $dataChart;

    $jsonEncodedData1 = json_encode($arrData1);
    //echo "$jsonEncodedData1 ";
    $columnChart1 = new FusionCharts("column2d", "chart-2", "600", "300", "chart-container2", "json", $jsonEncodedData1);

    // Render the chart
    $columnChart1->render();
}

function getPieCharts($categoryType)
{
    $data = array();

    $proData = TableRegistry::get('products');

    $query = $proData->find('all')->where(['id' => $categoryType]);
    foreach ($query as $result) {
        $pid = $result->id;
        $pname = $result->name;
        $rateResult = getRatingForEachProduct($categoryType, $pid);
        $label = $pname;
        if ($rateResult != 0) {
            array_push(
                $data,
                array(
                    "label" => $label,
                    "value" => $rateResult
                )
            );
        }
    }
    $arrData = array(
        "chart" => array(
            "animation" => "0",
            "caption" => "Review By Category",
            // "subCaption" => "",
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
    $jsonPieData = json_encode($arrData);
    $columnChart = new FusionCharts("pie3d", "chart-1", "600", "300", "chart-container1", "json", $jsonPieData);

    // Render the chart
    $columnChart->render();
}


function getRatingForEachProduct(int $categoryID, int $productID)
{
    $rate = $total_rate = $total_count = 0;
    $chartData = TableRegistry::get('answers');

    for ($i = 1; $i <= 5; $i++) {

        $query1 = $chartData->find('all', [
            'conditions' => ['category_id =' => $categoryID, 'product_id =' => $productID, 'rating =' => $i],
            'distinct' => ['survey_id']
        ])
            ->distinct('survey_id');

        $rowCount = $query1->count();
        // echo ("<br/>");
        // echo ("\n Query1 Count for rating " . $i . ": " . $rowCount);

        if ($rowCount != 0) {
            $total_rate += $i * $rowCount;
            //echo ($total_rate);
            $total_count += $rowCount;
        }
    }
    if ($total_count != 0) {
        $rate = round($total_rate / $total_count);
    } else {
        $rate = 0;
    }
    //echo ("Rating Calculation for Product: " . $rate);
    return $rate;
}

function getAvgRating(int $pid)
{
    $connection = ConnectionManager::get('default');
    $results1 = $connection->execute('SELECT avg(rating) as rating from `answers` WHERE product_id=? and user_id IN' . '(SELECT id FROM `users` WHERE age<=16)', [$pid])->fetchAll('assoc');
    $results2 = $connection->execute('SELECT avg(rating) as rating from `answers` WHERE product_id=? and user_id IN' . '(SELECT id FROM `users` WHERE 16<age<=30)', [$pid])->fetchAll('assoc');
    $results3 = $connection->execute('SELECT avg(rating) as rating from `answers` WHERE product_id=? and user_id IN' . '(SELECT id FROM `users` WHERE 30<age<=50)', [$pid])->fetchAll('assoc');
    $results4 = $connection->execute('SELECT avg(rating) as rating from `answers` WHERE product_id=? and user_id IN' . '(SELECT id FROM `users` WHERE age>50)', [$pid])->fetchAll('assoc');

    $avg1 = getAvgResult($results1);
    $avg2 = getAvgResult($results2);
    $avg3 = getAvgResult($results3);
    $avg4 = getAvgResult($results4);

    $data = array();
    $labels = array("age<=16", "16<age<=30", "30<age<=50", "age>50");
    $avg = array($avg1, $avg2, $avg3, $avg4);
    for ($i = 0; $i <= 3; $i++) {

        //  $label = $labels[$i];
        array_push(
            $data,
            array(
                "label" => $labels[$i],
                "value" => $avg[$i]
            )
        );
    }
    return $data;
}
function getAvgResult($results)
{

    foreach ($results as $results) {
        $average_rating = $results['rating'];
        if ($average_rating == null) {
            $average_rating = 0;
        }
    }
    return $average_rating;
}
function getFeedback($pid)
{
    $connection = ConnectionManager::get('default');
    $prodFeed = $connection->execute('SELECT users.name as fname, answers.remark as fremark , answers.rating as frating, answers.created as fdate FROM answers,users where product_id=? and users.id=answers.user_id', [$pid])->fetchAll('assoc');
    //return array($prodFeed['fname'], $prodFeed['frmearks'], $prodFeed['fdate']);
    return $prodFeed;
}

?>
<div class="hline" style="font-family:courier;">
    <h3>Data Analysis Results</h3>
</div>
<br><br>
<div><button class="button">Trending Produts</button></div>

<div>
    <table>
        <tbody>
            <tr>
                <?php foreach ($product_list as $p) : ?>
                    <?php if ($p['pimage'] != null) ?>
                    <td width="20"><?= @$this->HTML->image($p['pimage']) ?></td>
                    <td width="20">

                        Product Model No: <span style="color:red"><?= h($p['pmodel_no']) ?></span><br>
                        Product Name: <span style="color:red"><?= h($p['pname']) ?></span>

                    </td>
                <?php endforeach; ?>

            </tr>
        </tbody>
    </table>
</div>
<br>
<form action="#" method="post">
    <div class="row">
        <div class="col s4">
            <select id="ctype" name="Color[]">
                <option value="">Category List</option>
                <?php foreach ($categories_list as $c) : ?>
                    <option value="<?= h($c->id) ?>"><?= h($c->name) ?></option>

                <?php endforeach; ?>
            </select>
        </div>
        <div class="col s2">
            <button type="submit" name="peach" class="btn waves-effect waves-teal" />View Results</button>
        </div>
    </div>
</form>

<div id="chart-container1"></div>

<form action="#" method="post">
    <div class="row">
        <div class="col s4">
            <select id="ptype" name="Pro[]">
                <option value="">Product List</option>
                <?php foreach ($pList as $p) : ?>
                    <option value="<?= h($p->id) ?>"><?= h($p->name) ?></option>

                <?php endforeach; ?>
            </select>
        </div>
        <div class="col s2">
            <button type="submit" name="showproduct" class="btn waves-effect waves-teal" />View Results</button>
        </div>
    </div>
</form>
<div class="row">

    <div id="chart-container2" class="col"></div>
    <div class="col s1"></div>
    <div class="col">
        Rating and Reviews

        <?php foreach ($prodFeed as $p) : ?>
            <div>
                <div class="row">
                    <p><?= $p['fname'] ?></p>
                </div>
                <div class="row">

                    <?php for ($i = 0; $i < $p['frating']; $i++)
                        echo '<span class="fa fa-star checked"></span>';
                    ?>
                </div>
                <div class="row">
                    <p><?= $p['fdate'] ?></p>
                </div>

                <div class="row">
                    <p><?= $p['fremark'] ?></p>
                </div>
                <br>
            </div>
            <div class="row">
            <?php endforeach; ?>
            </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('select').formSelect();
    });
    /* ('#ctype').change(function() {
        $_SESSION('ctype') = ('#ctype').value;
    }); */
</script>