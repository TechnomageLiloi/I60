<link href="<?php echo $config['root']; ?>/Style.css" rel="stylesheet" />
<div id="menu">
    <a href="javascript:void(0)" class="butn" onclick="Requests.show();">Show</a>
    <a href="javascript:void(0)" class="butn" onclick="Requests.create();">Create step</a>
    &diams;
    <a href="javascript:void(0)" class="butn" onclick="Requests.Problems.create();">Create problem</a>
</div>
<div id="layout" style="text-align: center;">
    <script>Requests.show();</script>
</div>