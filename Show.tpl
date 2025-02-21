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
            <td><?php echo $entity->getTimestamp("Y F d, g:i A"); ?></td>
            <td>
                <?php echo $entity->getTitle(); ?>
                <div style="color: gray;font-size: x-small;"><?php echo $entity->getSummary(); ?></div>
                <div style="color: silver;font-size: x-small;"><?php echo $entity->getData(); ?></div>
            </td>
            <td><?php echo $entity->getStatusTitle(); ?></td>
            <td><?php echo $entity->getTypeTitle(); ?></td>
            <td>
                <a href="javascript:void(0)" class="butn" onclick="Requests.edit('<?php echo $entity->getKey(); ?>');">Edit</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
</div>