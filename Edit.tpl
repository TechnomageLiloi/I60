<div id="edit" style="text-align: center;">
    <a href="javascript:void(0)" class="butn" onclick="Requests.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <table>
        <tr>
            <td>Title</td>
            <td><input type="text" name="title" value="<?php echo $entity->getTitle(); ?>"></td>
        </tr>
        <tr>
            <td>Summary</td>
            <td><input type="text" name="summary" value="<?php echo $entity->getSummary(); ?>"></td>
        </tr>

        <tr><td>Status</td><td>
            <select name="status">
                <?php foreach($statuses as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if($entity->getStatus() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>

        <tr><td>Type</td><td>
            <select name="type">
                <?php foreach($types as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if($entity->getType() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>

        <tr>
            <td>Data</td>
            <td><input type="text" name="data" value="<?php echo $entity->getData(); ?>"></td>
        </tr>
    </table>
    <a href="javascript:void(0)" class="butn" onclick="Requests.save('<?php echo $entity->getKey(); ?>');">Save</a>
</div>