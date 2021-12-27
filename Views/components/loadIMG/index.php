<?php $person = loadModel('Personal');
$loadIMG = 'Public/images/BGR_person.jpg';
if (isset($_REQUEST['update_IMG'])) {
    move_uploaded_file($_FILES["IMG_load"]["tmp_name"], 'Public/images/' . $_FILES["IMG_load"]["name"]);
}

?>

<div class="menu_container">
    <div id="menu">
        <?php loadModule('menu'); ?>
    </div>
    <div id="load_container">
        <form action="" method="">
            <div>
                <div id="IMG_current">
                    <img src="<?php $person->loadIMG($_REQUEST['user']); ?>" alt="">
                </div>
                <div id="loadIMG">
                    <div id="IMG_update">
                        <img src="<?php echo $loadIMG; ?>" alt="" id="IMG_new">
                    </div>
                    <form method="POST" enctype="multipart/form-data">
                        <input type="file" name="IMG_load" id="IMG_load" style="margin-top: 43%;" />

                    </form>
                </div>
            </div>
            <center>
                <input type="submit" value="Cập nhật ảnh" id="update_IMG" name="update_IMG">
                <input type="submit" value="Cập nhật">
            </center>
        </form>

    </div>

</div>
<?php

?>
<script>
    $("#IMG_load").change(function() {

        var path = 'Public/images/' + $('input[type=file]').val().replace(/C:\\fakepath\\/i, '');
        document.getElementById('IMG_new').src = path;
        alert(path);

    });
</script>