<div id="modules-levels-collection">
    <a href="javascript:void(0)" class="butn" onclick="Requests.Tickets.create();">Create ticket record</a>

    <?php if($tickets->count()): ?>
        <hr/>
        <table>
            <tr>
                <th>[ID]</th>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php foreach($tickets as $entity): ?>
                <tr style="font-weight: bold;" class="degree <?php echo $entity->getStatusClass(); ?>">
                    <td>
                        [<?php echo $entity->getID(); ?>]
                    </td>
                    <td>
                        <?php echo $entity->getTitle(); ?>
                    </td>
                    <td>
                        <?php echo $entity->getStatusTitle(); ?>
                    </td>
                    <td>
                        <a href="javascript:void(0)" class="butn" onclick="Requests.Tickets.show('<?php echo $entity->getKey(); ?>');">Show</a>
                        <a href="javascript:void(0)" class="butn" onclick="Requests.Tickets.edit('<?php echo $entity->getKey(); ?>');">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>