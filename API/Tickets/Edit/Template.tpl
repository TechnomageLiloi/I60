<style>
    #ticket-edit input,
    #ticket-edit select,
    #ticket-edit textarea
    {
        width: 90%;
    }

    #ticket-edit textarea
    {
        height: 300px;
    }
</style>
<div id="ticket-edit">
    <a href="javascript:void(0)" class="butn" onclick="Requests.Tickets.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a href="javascript:void(0)" class="butn" onclick="Requests.Tickets.show('<?php echo $entity->getKey(); ?>');">Show</a>
    <hr/>
    <table style="width: 100%;">
        <tr>
            <th>Name</th>
            <th>Value</th>
        </tr>

        <tr><td>Title</td><td><input type="text" name="title" value="<?php echo $entity->getTitle(); ?>"/></td></tr>

        <tr><td>Status</td><td>
            <select name="status">
                <?php foreach($statuses as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if($entity->getStatus() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>

        <tr><td>Start</td><td><input type="text" name="start" value="<?php echo $entity->getStart(); ?>"/></td></tr>

        <tr><td>Finish</td><td><input type="text" name="finish" value="<?php echo $entity->getFinish(); ?>"/></td></tr>

        <tr><td>Trophy</td><td><input type="text" name="trophy" value="<?php echo $entity->getTrophy(); ?>"/></td></tr>

        <tr><td>Data</td><td>
            <textarea name="data"><?php echo $entity->getData(); ?></textarea>
        </td></tr>
    </table>
    <hr/>
    <a href="javascript:void(0)" class="butn" onclick="Requests.Tickets.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a href="javascript:void(0)" class="butn" onclick="Requests.Tickets.show('<?php echo $entity->getKey(); ?>');">Show</a>
</div>