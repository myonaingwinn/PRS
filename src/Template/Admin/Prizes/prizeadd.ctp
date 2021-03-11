<!DOCTYPE html>
<html>
<head>
	<title>Update Prize</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<style type="text/css">
	
	.form-elegant .font-small {
font-size: 0.8rem; }

.form-elegant .z-depth-1a {
-webkit-box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25);
box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25); }

.form-elegant .z-depth-1-half,
.form-elegant .btn:hover {
-webkit-box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15);
box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15); 
}

.card{
	margin-left:400px;
	width: 300px;
	margin-top: 50px;
}
.md-form{
  margin-left:30px;
  margin-top: 25px;
}
.mb-3{
  margin-left:30px;
  margin-top: 50px;
  
}
.md-form label{
  margin-top: -7px;
  font-size:12px;
}

a {
    color: #ffffff;
    text-decoration: none;
}

a:hover {
    color: #ffffff;
    text-decoration: none;
}
button{
    background-color:#5cb85c;
    color: white;
    width: 78px;
    height: 33px;
    border-color:green;
    border-radius:15px;
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
<section class="form-elegant">

  <!-- Grid row -->
  <div class="row">
  

    <!-- Grid column -->
    <div class="col-md-9 col-lg-7 col-xl-5">

      <!--Form without header-->
      <div class="card">

        <div class="card-body mx-4">
        <?= $this->Form->create($prize) ?>

          <!--Header-->
          <div class="text-center">
            <h3 class="dark-grey-text mb-5"><strong>Add Prize</strong></h3>
          </div>

          <!--Body-->
          <div class="md-form">
          <?= $this->Form->control('prize_name',['required']) ?>
          </div>

          <div class="md-form">
          <?= $this->Form->control('scores',['required']) ?>
          </div>

       
          <div class="text-center mb-3" style="margin-top: 50px;">
         
          
          <?= $this->Form->button(__('Save')) ?>
          <button class="button"><?= $this->Html->link(__('Prize List'), ['action' => 'prizelist']) ?></button>
   
          
          </div>
          

          <?= $this->Form->end() ?>

        </div>

      
      

      </div>
      <!--/Form without header-->

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</section>
</body>
</html>


