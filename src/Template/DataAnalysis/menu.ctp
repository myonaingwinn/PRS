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

    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    .topnav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    .topnav {
        overflow: hidden;
        background-color: #5c6bc0;
    }

    .topnav a:hover {
        background-color: #9fa8da;
        color: black;
    }

    .topnav a.active {
        background-color: #4CAF50;
        color: white;
    }
</style>

<div class="topnav z-depth-2">
    <a class="active" href="/DataAnalysis/menu">Data Analysis Result</a>
    <a href="/DataAnalysis/category">Category</a>
    <a href="/DataAnalysis/product">Product</a>
</div>

<br><br>
<div><a class="btn-large teal lighten-2">Trending Products</a></div>

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