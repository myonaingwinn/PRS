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
a{
    font-size:15px;
}
.paginator{
    margin-left:760px;
}
.score{
    font-weight:bold;
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

<div class="card" style="margin-left:300px;width: 500px;margin-top: 50px;">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Get Award</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
    <?php foreach ($scores as $score): ?>
      <span class="table-add text-center mb-3 mr-2">
     
      	<p class="score">Your Scores is <span class="score"><?= $score->score ?></span></p>
          </span>
          <?php endforeach; ?>

      <table class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <tr>
            <th class="text-center size">Scores</th>
            <th class="text-center size">Prize</th>
            <th class="text-center size">Action</th>
            
          </tr>
        </thead>
        <tbody>
        
        <?php foreach ($prizes as $prize): ?>
            <tr>
            <td class="pt-3-half" ><?= $prize->scores ?></td>
            <td class="pt-3-half" ><?= $prize->prize_name ?>
     
            </td>
            <td>
            <a href="<?= $this->Url->build(['controller'=>'Prizes','action'=>'score',$prize->id]); ?>">Take</a>

            </td>
                
                
            </tr>
            <?php endforeach; ?>
          
         
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

