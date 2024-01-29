<style>
    #rune-collection
    {
        padding: 5px;
    }
    #rune-collection table
    {
        width: 100%;
    }

    #rune-collection table tr:hover
    {
        background-color: #f8f898;
        color: red;
    }

    #rune-collection table tr.start td
    {
        border-bottom: gray 1px dashed;
    }

    #rune-collection .add
    {
        border: gray 1px solid;
        padding: 5px;
        margin: 2px;
        text-align: center;
    }

    #rune-collection .wrap-title
    {
        text-align: center;
    }

    #rune-collection .topic
    {
        border: gray 1px solid;
        padding: 5px;
        margin-bottom: 5px;
        border-radius: 5px;
    }
</style>
<div id="rune-collection">
    <?php foreach($collection as $entity): ?>
        <div class="topic">
            <h3>
                <a href="<?php echo $entity->getUrl(); ?>">
                    <?php echo $entity->getTitle(); ?>
                </a>
            </h3>
            <?php echo $entity->parseSummary(); ?>
        </div>
    <?php endforeach; ?>
</div>