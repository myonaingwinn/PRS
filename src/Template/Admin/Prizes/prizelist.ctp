<!DOCTYPE html>
<html>
<head>
	<title>Prize List</title>
	<!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	 <style type="text/css">
	 	
	 	 table tr td:last-child a{
            margin-right: 15px;
        }

        .pt-3-half {
padding-top: 1.4rem;
font-size:13px;

}

.size{
  font-size:15px;
  font-weight:bold;
}
.paginator{
    margin-left:760px;
}
a:hover{
  text-decoration:none;
}
	 </style>
</head>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js">
	
</script>

<body>



	<div class="card" style="margin-left:200px;width: 750px;margin-top: 50px;">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Prizes List</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2">
      	<a href="<?= $this->Url->build(['controller'=>'Prizes','action'=>'prizeadd']); ?>" id="table" class="text-success">
      		<i
            class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
      <table class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <tr>
            <th class="text-center size" >No.</th>
            <th class="text-center size" >Scores</th>
            <th class="text-center size" >Prize's Name</th>
            <th class="text-center size" >Update</th>
          
            <th class="text-center size">Remove</th>
          </tr>
        </thead>
        <tbody>
        
        <?php 
        $num = 1;
        foreach($prizes as $key => $prize) : ?>
          <tr>
        

            <td class="pt-3-half" ><?= $num++ ?></td>
            <td class="pt-3-half" ><?= $prize->scores ?></td>
            <td class="pt-3-half" ><?= $prize->prize_name ?></td>

            <td class="pt-3-half">
            <a href="<?= $this->Url->build(['controller'=>'Prizes','action'=>'edit',$prize->id]); ?>" title="Update Record" >Edit</span></a>
            
            </td>
         
            <td class="pt-3-half" >
        <span title="Delete Record" class="link"><?= $this->Form->postLink(__('Delete'), ['action' => 'delete',$prize->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prize->id)]) ?> </span>
        
           

           
            </td>

            <?php endforeach;  ?>

          </tr>
         
          
         
        </tbody>
      </table>
    </div>
  </div>
</div>
	
<div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
	

</body>
</html>