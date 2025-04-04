<div id="modules-levels-collection">
    <!--<a href="javascript:void(0)" class="butn" onclick="Rune.Levels.plan();">Plan</a>-->
    <a href="javascript:void(0)" class="butn" onclick="Rune.Levels.create();">Create level</a>

    <?php if($collection->count()): ?>
        <hr/>
        <table>
            <tr>
                <th>Degree</th>
                <th>Title</th>
                <th>Goal</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php foreach($collection as $entity): ?>
                <tr style="font-weight: bold;" class="degree <?php echo $entity->getStatusClass(); ?>">
                    <td>
                        #<?php echo $entity->getKey(); ?>.
                    </td>
                    <td>
                        <?php echo $entity->getTitle(); ?>
                    </td>
                    <td>
                        <?php echo $entity->getGoal(); ?>
                    </td>
                    <td>
                        <?php echo $entity->getStatusTitle(); ?>
                    </td>
                    <td>
                        <a href="javascript:void(0)" class="butn" onclick="Rune.Levels.Lessons.create('<?php echo $entity->getKey(); ?>');">Create lesson</a>
                        <a href="javascript:void(0)" class="butn" onclick="Rune.Levels.show('<?php echo $entity->getKey(); ?>');">Show</a>
                        <a href="javascript:void(0)" class="butn" onclick="Rune.Levels.edit('<?php echo $entity->getKey(); ?>');">Edit</a>
                    </td>
                </tr>

                <?php if(isset($lessons[$entity->getKey()])): ?>
                    <?php foreach($lessons[$entity->getKey()] as $key => $lesson): ?>
                        <tr>
                            <td>
                                # <?php echo $entity->getKey(); ?>.<?php echo $lesson->getKeyLesson(); ?>.
                            </td>
                            <td colspan="2">
                                <?php echo $lesson->getTitle(); ?>
                            </td>
                            <td>
                                <?php echo $lesson->getStatusTitle(); ?>
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="butn" onclick="Rune.Levels.Lessons.edit('<?php echo $entity->getKey(); ?>', '<?php echo $lesson->getKeyLesson(); ?>');">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>

            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>