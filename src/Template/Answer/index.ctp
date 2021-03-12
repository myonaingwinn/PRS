<!DOCTYPE html>
<html lang="en">
<head>
    <title>Survey Answer List</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js">
</script>


<script>

 

$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<style type="text/css">


	 	 table tr td:last-child a{
            margin-right: 15px;
        }
        h3 {
  width: 850px;
  background-color: #00C853;
}    
        .navbar {
  background-color: #00C853;
}
        .pt-3-half {
padding-top: 1.4rem;
}
	 </style>

 

</head>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js">
	
</script>
<body>

<div class="card" style="margin-left:300px;width: 850px;margin-top: 50px;">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Survey Answer List</h3>
  <div class="card-body">	
    <div id="table" class="table-editable">
<table  id="example" class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <tr>
            <th>No</th>
            <th>SurveyName</th>
            <th>ProductName</th>
            <th>CategoryName</th>
            <th>Rating</th>
            <th>Created</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>
        <?php 
        
        $num = 1;
        foreach($answers as $key) : ?>
          <tr>
            <td><?= $num++ ?></td>
            <td><?= $key['name'] ?></td>
            <td><?=$key['product_name'] ?></td>
            <td><?= $key['category_name']?></td>
            <!-- <td><?= $key['name'] ?></td>-->
            <td><?= $key['rating']/5*100?>%<progress  value="<?= $key['rating']/5*100?>" max="100"> 
            </td>
            <td>
            <?php
            $t=time();
            echo(date("Y-m-d",$t));
            ?>
            </td>
            <td class="action">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $key['survey_id']]) ?>
                        </td>
                        </tr>
            <?php endforeach;  ?>
            

         
        </tbody>
      </table>
      
    </div>
  </div>
</div>


</body>
</html>
