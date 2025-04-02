<div id="show" style="text-align: center;">

    <h3>Problems</h3>

    <table>
        <tr>
            <th>Title</th>
            <th style="text-align: right;">Actions</th>
        </tr>
        <?php foreach($problems as $entity): ?>
        <tr>
            <td>
                <?php echo $entity->getTitle(); ?>
            </td>
            <td style="text-align: right;">
                <a href="javascript:void(0)" class="butn" onclick="Requests.Problems.edit('<?php echo $entity->getKey(); ?>');">Edit</a>
                <a href="javascript:void(0)" class="butn" onclick="Requests.Problems.remove('<?php echo $entity->getKey(); ?>');">Remove</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h3>Road</h3>

    <table>
        <tr>
            <th>Timestamp</th>
            <th>Title</th>
            <th>Status</th>
            <th>Type</th>
            <th style="text-align: right;">Actions</th>
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
            <td style="text-align: right;">
                <a href="javascript:void(0)" class="butn" onclick="Requests.edit('<?php echo $entity->getKey(); ?>');">Edit</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
</div>