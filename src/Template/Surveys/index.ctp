<h4><?= __('Surveys Summary') ?></h4>
<div class="row">
    <div class="col s12">
        <table class="highlight">
            <thead>
            <tr>
                <th>#</th>
                <th>Surveys</th>
                <th>Created Date</th>
                <th>Questions</th>
                <th>Respondents</th>
                <th>Completion Rate</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($surveys as $survey): ?>
                <tr>
                    <td><?= $this->Number->format($survey->id) ?></td>
                    <td><?= $survey->has('product') ? $this->Html->link($survey->product->product_name, ['controller' => 'Products', 'action' => 'view', $survey->product->product_name]) : '' ?></td>
                    <td><?= h($survey->created) ?></td>
                    <td><?= $survey->has('category') ? $this->Html->link($survey->category->id, ['controller' => 'Categories', 'action' => 'view', $survey->category->id]) : '' ?></td>
                    <td><?= h($survey->del_flg) ?></td>
                    <td><?= $survey->has('admin') ? $this->Html->link($survey->admin->id, ['controller' => 'Admins', 'action' => 'view', $survey->admin->id]) : '' ?></td>                                        
                    <td><?= $this->Number->format($total) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>