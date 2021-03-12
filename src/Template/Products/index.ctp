<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>

<h4><?= __('Product List') ?></h4>
<?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'waves-effect waves-light btn right indigo']) ?>
<table id="datatable" class="striped">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Status</th>
            <th>User</th>
            <th>Trending </th>
            <th>Action </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?= $product['image'] ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= $product['name'] ?></td>
                <td><?= $product['price'] ?></td>
                <td> <input type="text" value="<?= ($product['rating'] / 5) * 100 ?>" id="pp" hidden>
                    <?php if (($product['rating'] / 5) * 100 > 50) {
                        echo "<label>Up</label>";
                    } elseif (($product['rating'] / 5) * 100 < 50) {
                        echo "<label>Down</label>";
                    } elseif (($product['rating'] / 5) * 100 == 50) {
                        echo "<label>Stabel</label>";
                    }
                    ?>
                </td>
                <td><?= $product['name'] ?></td>
                <td><?= $product['rating'] / 5 * 100 ?>%<progress id="pp" value="<?= $product['rating'] / 5 * 100 ?>" max="100"> </progress></td>
                <td>
                    <?= $this->Html->link(__('settings'), ['action' => 'edit', $product->id], ['class' => 'material-icons']) ?>
                    <?= $this->Form->postLink(__('delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'material-icons']) ?>
                </td>
            </tr>
        <?php endforeach;  ?>

</table>