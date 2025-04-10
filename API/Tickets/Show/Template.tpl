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

<table id="table-road">
    <tr>
        <td style="text-align: center;">
            <a href="javascript:void(0)" class="butn" onclick="Requests.Tickets.edit('<?php echo $entity->getKey(); ?>');">Edit</a>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo $entity->getTitle(); ?>
        </td>
    </tr>
</table>
