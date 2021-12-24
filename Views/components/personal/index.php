<div class="menu_container">
    <div id="menu">
        <?php loadModule('menu'); ?>
    </div>
    <div id="banner">
        <?php loadModule('banner'); ?>
        <div id="Chu"></div>

    </div>

</div>
<?php
$personal = loadModel('Personal');
?>
<div class="personal">
    <a href="index.php?cat=personal&sub_cat=person_infor" class="personal">
        <img src="<?php $personal->loadIMG($_REQUEST['user']); ?>" id="personal" alt="" style=" width: 60px; height: 60px; border-radius: 50%/50%;">
    </a>
    <h3><?php $personal->loadName($_REQUEST['user']); ?></h3>
</div>