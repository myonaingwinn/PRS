<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
?>
<div class="products index large-9 medium-8 columns content">
  <h4><?= __('Product List') ?></h4>
  <div class="row">
    <div class="col s5">
      <?= $this->Form->control('search'); ?>
    </div>
    <div class="col s4"></div>
    <div class="col s3">
      <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'waves-effect waves-light btn right indigo']) ?>
    </div>
  </div>
  <div class="table-content">
    <table cellpadding="0" cellspacing="0">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col"><?= $this->Paginator->sort('Product') ?></th>
          <th scope="col"><?= $this->Paginator->sort('Price') ?></th>
          <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
          <th scope="col"><?= $this->Paginator->sort('User') ?></th>
          <th scope="col"><?= $this->Paginator->sort('Trending') ?></th>
          <th scope="col"><?= $this->Paginator->sort('Action') ?></th>
        </tr>
      </thead>
      <tbody>
        <?php $page = $this->Paginator->counter(['format' => __('{{page}}')]);
        $no = 1;
        if ($page > 2)
          $no = $page * 20 - 19;
        else if ($page == 2)
          $no = $page * 10 + 1;
        ?>
        <?php foreach ($products as $product) : ?>
          <tr>
            <td><?= $this->Number->format($no++) ?></td>
            <td><?= $product['image'] ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= $product['name'] ?></td>
            <td><?= $product['price'] ?></td>
            <td>
              <input type="text" value="<?= (6 / 5) * 100 ?>" id="pp" hidden>
              <?php if ((3 / 5) * 100 > 50) {
                echo "<i class='material-icons green-text'>arrow_upward</i>";
              } elseif ((3 / 5) * 100 < 50) {
                echo "<label>Down</label>";
              } elseif ((3 / 5) * 100 == 50) {
                echo "<label>Stabel</label>";
              }
              ?>
            </td>
            <td><?= $product['name'] ?></td>
            <td><?= 4 / 5 * 100 ?>%<progress id="pp" value="<?= 4 / 5 * 100 ?>" max="100"> </progress></td>
            <td>
              <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
              <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
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
</div>

<script>
  $('document').ready(function() {
    $('#search').keyup(function() {
      var searchkey = $(this).val();
      searchProducts(searchkey);
    });

    function searchProducts(keyword) {
      var data = keyword;
      $.ajax({
        method: 'get',
        url: "<?php echo $this->Url->build(['controller' => 'Products', 'action' => 'Search']); ?>",
        data: {
          keyword: data
        },

        success: function(response) {
          $('.table-content').html(response);
        }
      });
    };
  });
</script>