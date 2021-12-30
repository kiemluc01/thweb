<?php $finance = loadModel('Finance');
$save =  $finance->loadSave();
?>
<div class="menu_container">
    <img src="Public/images/heo.png" alt="" id="heo">
    <img src="Public/images/heo.png" alt="" id="heo_tmp">
    <img src="Public/images/tay.png" alt="" id="tay">
    <h1 id="tien"><?php echo number_format($save, 0, ".", ",") . " VNĐ"; ?></h1>
    <div id="menu">
        <?php loadModule('menu'); ?>
    </div>
    <div id="saving">

    </div>

</div>
<?php
$personal = loadModel('Personal');

?>
<div class="personal">
    <a href="<?php echo 'index.php?cat=personal&sub_cat=person_infor&user=' . $_SESSION['user']; ?>" class="personal">
        <img src="<?php $personal->loadIMG($_SESSION['user']); ?>" id="personal" alt="" style=" width: 60px; height: 60px; border-radius: 50%/50%;">
    </a>
    <h3><?php $personal->loadName($_SESSION['user']); ?></h3>
</div>
<script>
    $(document).ready(function() {
        $('#heo').click(function() {
            document.getElementById('heo').classList.add('heo_click');
            document.getElementById('tay').style.display = 'none';
            document.getElementById('tien').classList.add('tien');
            document.getElementById('heo').classList.remove('changes');
            document.getElementById('heo_tmp').classList.remove('changes_tmp');
        })
        $('#heo_tmp').click(function() {


            document.getElementById('tien').classList.remove('tien');
            document.getElementById('heo').classList.add('changes');
            document.getElementById('heo_tmp').classList.add('changes_tmp');
            setTimeout(
                () => {
                    document.getElementById('tay').style.display = 'block';
                    document.getElementById('heo').classList.remove('heo_click');
                },
                3 * 1000
            );
        })
    })
</script>