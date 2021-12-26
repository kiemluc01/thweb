<?php
$person = loadModel('Personal');

?>
<div class="menu_container">
    <div id="menu">
        <?php loadModule('menu'); ?>
    </div>

    <div id="person">
        <img src="<?php $person->loadIMG($_REQUEST['user']); ?>" alt="" id="AVT">
        <div id="BGR" style="background-color: rgb(163, 163, 163);">
            <div style="background-image: url('<?php $person->loadBGR($_REQUEST['user']) ?>'); width:70%; height:100%;margin-left:15%"></div>
        </div>
        <div id="infor">
            <form action="<?php echo 'index.php?cat=personal&sub_cat=person_infor&user=' . $_REQUEST['user'] ?>" method="get">
                <table id="infor_person">
                    <tr>
                        <td class="infor_person">Họ Tên:</th>
                        <td class="infor_person">
                            <input type="text" id="name" name="name">
                        </td>
                    </tr>
                    <tr>
                        <td class="infor_person">Ngày sinh:</td>
                        <td class="infor_person">
                            <input type="text" id="DoB" name="DoB">
                        </td>
                    </tr>
                    <tr>
                        <td class="infor_person">Giới tính:</td>
                        <td class="infor_person">
                            <input type="text" id="GT" name="GT">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="infor_person">
                            <center>
                                <input type="submit" value="Cập nhật thông tin" id="update" name="update">
                            </center>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

</div>