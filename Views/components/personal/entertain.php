<div class="menu_container">
    <div id="menu">
        <?php loadModule('menu'); ?>
    </div>
    <div id="finance">

    </div>

</div>
<?php
$personal = loadModel('Personal');
?>
<div class="personal">
    <a href="<?php echo 'index.php?cat=personal&sub_cat=person_infor&user=' . $_REQUEST['user']; ?>" class="personal">
        <img src="<?php $personal->loadIMG($_REQUEST['user']); ?>" id="personal" alt="" style=" width: 60px; height: 60px; border-radius: 50%/50%;">
    </a>
    <h3><?php $personal->loadName($_REQUEST['user']); ?></h3>
</div>