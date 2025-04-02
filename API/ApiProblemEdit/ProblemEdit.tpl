<div id="edit" style="text-align: center;">
    <a href="javascript:void(0)" class="butn" onclick="Requests.Problems.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <table>
        <tr>
            <td>Title</td>
            <td><input type="text" name="title" value="<?php echo $entity->getTitle(); ?>"></td>
        </tr>
    </table>
</div>