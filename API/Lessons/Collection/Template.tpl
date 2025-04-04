<div id="modules-levels-collection">
    <a href="javascript:void(0)" class="butn" onclick="Requests.Lessons.create(<?php echo $keyLevel; ?>);">Create lesson</a>

    <?php if($lessons->count()): ?>
        <hr/>
        <table>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php foreach($lessons as $entity): ?>
                <tr style="font-weight: bold;" class="degree <?php echo $entity->getStatusClass(); ?>">
                    <td>
                        <?php echo $entity->getTitle(); ?>
                    </td>
                    <td>
                        <?php echo $entity->getStatusTitle(); ?>
                    </td>
                    <td>
                        <a href="javascript:void(0)" class="butn" onclick="Requests.Problems.getCollection('<?php echo $entity->getKey(); ?>');">Problems</a>
                        <a href="javascript:void(0)" class="butn" onclick="Requests.Lessons.show('<?php echo $entity->getKey(); ?>');">Show</a>
                        <a href="javascript:void(0)" class="butn" onclick="Requests.Lessons.edit('<?php echo $entity->getKey(); ?>');">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <script>Requests.Problems.getCollection(<?php echo $lessons->getCurrent(); ?>);</script>
    <?php endif; ?>
</div>