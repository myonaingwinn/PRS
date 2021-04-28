<table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('#') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Product') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Price') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
            <th scope="col"><?= $this->Paginator->sort('User') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Trending') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Action') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach ($products as $product): ?>
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
              <?= $this->Html->link(__('edit'), ['action' => 'edit', $product->id], ['class' => 'material-icons']) ?>
              <?= $this->Form->postLink(__('delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'material-icons']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>