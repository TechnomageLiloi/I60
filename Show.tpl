<div id="show" style="text-align: center;">
    <table>
        <tr>
            <th>Timestamp</th>
            <th>Title</th>
            <th>Status</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
    <?php foreach($collection as $entity): ?>
        <tr>
            <td><?php echo $entity->getKey(); ?></td>
            <td><?php echo $entity->getTitle(); ?></td>
            <td><?php echo $entity->getStatusTitle(); ?></td>
            <td><?php echo $entity->getTypeTitle(); ?></td>
            <td>
                <a href="javascript:void(0)" class="butn" onclick="Requests.edit('<?php echo $entity->getKey(); ?>');">Edit</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
</div>