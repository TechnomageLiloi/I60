<style><?php echo file_get_contents(__DIR__ . '/Style.css'); ?></style>
<div id="application-diary-show" class="stylo">
    <h1 style="text-align: center;">
        <?php echo $entity->getTitle(); ?>
    </h1>
    <div class="data">
        <a class="butn" href="javascript:void(0)" onclick="Requests.Quests.edit('<?php echo $entity->getKey(); ?>');">Edit</a>
        - <?php echo $entity->getStatusTitle(); ?> - <?php echo $entity->getTypeTitle(); ?> - <?php echo $entity->getData(); ?>
    </div>
    <?php echo $entity->parse(); ?>
</div>