<div id="modules-levels-collection">
    <a href="javascript:void(0)" class="butn" onclick="Requests.Journals.create(<?php echo $key_problem; ?>);">Create level</a>

    <?php if($journals->count()): ?>
        <hr/>
        <table>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php foreach($journals as $entity): ?>
                <tr style="font-weight: bold;" class="degree <?php echo $entity->getStatusClass(); ?>">
                    <td>
                        <?php echo $entity->getKey(); ?>.
                    </td>
                    <td>
                        <?php echo $entity->getTitle(); ?>
                    </td>
                    <td>
                        <?php echo $entity->getStatusTitle(); ?>
                    </td>
                    <td>
                        <a href="javascript:void(0)" class="butn" onclick="Requests.Journals.show('<?php echo $entity->getKey(); ?>');">Show</a>
                        <a href="javascript:void(0)" class="butn" onclick="Requests.Journals.edit('<?php echo $entity->getKey(); ?>');">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>