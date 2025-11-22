<style><?php echo file_get_contents(__DIR__ . '/Style.css'); ?></style>
<div id="application-diary-show" class="stylo">
    <a href="javascript:void(0)" onclick="Requests.Quests.create();">Create</a>
    <table>
        <tr>
            <td>Quest</td>
            <td>Title</td>
            <td>Start</td>
            <td style="text-align: right;">Actions</td>
        </tr>
        <?php foreach($collection as $entity): ?>
        <tr>
            <td>
                <?php echo $entity->getKey(); ?>
            </td>
            <td>
                <?php echo $entity->getTitle(); ?>
            </td>
            <td>
                <?php echo $entity->getStatusTitle(); ?>
            </td>
            <td style="text-align: right;">
                <a href="javascript:void(0)" class="butn" onclick="Requests.Quests.show('<?php echo $entity->getKey(); ?>', '<?php echo $entity->getKeyMilestone(); ?>', '<?php echo $entity->getKeyEpoch(); ?>');">Show</a>
                <a href="javascript:void(0)" class="butn" onclick="Requests.Quests.edit('<?php echo $entity->getKey(); ?>', '<?php echo $entity->getKeyMilestone(); ?>', '<?php echo $entity->getKeyEpoch(); ?>');">Edit</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>