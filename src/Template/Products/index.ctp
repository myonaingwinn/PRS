<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    } );
</script>

<h4><?= __('Product List') ?></h4>
<?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'waves-effect waves-light btn right  green']) ?>
<table id="datatable" class="hightlight">
    <thead>
        <tr>
            <th>#</th>
            <th>Product</th>
            <th>Price</th>
            <th>Status</th>
            <th>User</th>
            <th>Trending </th>
            <th>Action </th>
        </tr>
    </thead>
    <tbody>
    <?php $var = 1; foreach($products as $product) : ?>
        <tr>
            <td><?= $this->Number->format($var++) ?></td>
            <td><?= $product['product_image'] ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= $product['product_name'] ?></td>
            <td><?= $product['product_price'] ?></td>
            <td> <input type="text" value="<?= (6/5)*100?>" id="pp" hidden >
            <?php if((3/5)*100>50){echo "<i class='material-icons green-text'>arrow_upward</i>";}
                  elseif((3/5)*100<50){echo "<label>Down</label>";}
                  elseif((3/5)*100==50){echo "<label>Stabel</label>";}
            ?>
            </td>
            <td><?= $product['product_name']?></td>
            <td><?= 4/5*100 ?>%<progress  id="pp" value="<?= 4/5*100?>" max="100">  </progress></td>
            <td>
                <?= $this->Html->link(__('settings'), ['action' => 'edit', $product->id], ['class' => 'material-icons']) ?>
                <?= $this->Form->postLink(__('delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'material-icons']) ?>
            </td>
        </tr>
    <?php endforeach;  ?>   
            
    </table>
    <script>
  $("#progressbar").kendoProgressBar({
    change: change
  });

  function change(e) {
    switch(true){
      case (e.value<=25):
        this.progressWrapper.css({"background-color": "#e32424", "border-color": "#e32424"});
        break;

      case (e.value>25 && e.value<=50):
        this.progressWrapper.css({"background-color": "#e68e1c", "border-color": "#e68e1c"});
        break;

      case (e.value>51 && e.value<=75):
        this.progressWrapper.css({"background-color": "#e6dc1c", "border-color": "#e6dc1c"});
        break;

      case (e.value>76 && e.value<=100):
        this.progressWrapper.css({"background-color": "#32c728", "border-color": "#32c728"});
        break;
    }
  }


  $(document).ready(function() {
   var x = 1;
   while(x<=100){
    x+=1;
    $("#progressbar").data("kendoProgressBar").value(x); 
   }
  });  
</script>
