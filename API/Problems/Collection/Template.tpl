<div id="modules-levels-collection">
    <a href="javascript:void(0)" class="butn" onclick="Requests.Problems.create(<?php echo $key_problem; ?>);">Create problem</a>

    <?php if($problems->count()): ?>
        <hr/>
        <table>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php foreach($problems as $entity): ?>
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
                        <a href="javascript:void(0)" class="butn" onclick="Requests.Journals.getCollection('<?php echo $entity->getKey(); ?>');">Journals</a>
                        <a href="javascript:void(0)" class="butn" onclick="Requests.Problems.show('<?php echo $entity->getKey(); ?>');">Show</a>
                        <a href="javascript:void(0)" class="butn" onclick="Requests.Problems.edit('<?php echo $entity->getKey(); ?>');">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>