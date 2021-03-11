<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>


<script>

$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
    
     <style type="text/css">
  
  
</style>

</head>
<body>
<h1>Product List</h1>

<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Answer ID</th>
                <th>Product ID</th>
                
                <th>User ID </th>
                <th>Rating  </th>
               
            </tr>
        </thead>
        <tbody>
                 
     <?php 
       dump($answers);
        foreach($answers as $key => $answer) : ?>

            <tr>
                <td ><?= $answer->answer_id ?></td>
                <td><?= $answer->product_name?></td>
                <td><?= $answer->user_id ?></td>
                <td><?= $answer->rating ?></td>
                
               
                
                <?php endforeach;  ?>
            </tr>
           
            
    </table>
    </body>
    </html>