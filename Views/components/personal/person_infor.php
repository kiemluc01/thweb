<?php
$person = loadModel('Personal');

?>
<div class="menu_container">
    <div id="menu">
        <?php loadModule('menu'); ?>
    </div>
    <div id="person">
        <img src="<?php $person->loadIMG($_REQUEST['user']); ?>" alt="" id="AVT">
        <div id="BGR"></div>
        <div id="infor"></div>
    </div>

</div>