<style>
    #table-road
    {
        width: 100%;
        border-collapse: collapse;
    }

    .road
    {
        background-image: url("/vendor/anton-moskalenko/nexus/Pool/Images/Road.png");
        width: 200px;
        height: 58px;
        background-size: 30%;
        opacity: 0.5;
    }

    .hint .tooltiptext
    {
        display: none;
        position: absolute;
        background-color: white;
        border: black 1px solid;
        padding: 2px;
    }

    .hint:hover .tooltiptext
    {
        display: block;
    }
</style>

<a href="javascript:void(0)" class="butn" onclick="Requests.Tickets.edit('<?php echo $entity->getKey(); ?>');">Edit</a>
<hr/>

<table id="table-road">
    <tr>
        <td>ID</td>
        <td>
            [<?php echo $entity->getID(); ?>]
        </td>
    </tr>
    <tr>
        <td>Title</td>
        <td>
            <?php echo $entity->getTitle(); ?>
        </td>
    </tr>
    <tr>
        <td>Status</td>
        <td>
            <?php echo $entity->getStatusTitle(); ?>
        </td>
    </tr>
    <tr>
        <td>Period</td>
        <td>
            <?php echo $entity->getStart(); ?> - <?php echo $entity->getFinish(); ?>
        </td>
    </tr>
    <tr>
        <td>Trophy</td>
        <td>
            <?php echo $entity->getTrophy(); ?>
        </td>
    </tr>
    <tr>
        <td>Data</td>
        <td>
            <?php echo $entity->getData(); ?>
        </td>
    </tr>
</table>
