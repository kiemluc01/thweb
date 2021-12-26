<?php
$person = loadModel('Personal');

?>
<div class="menu_container">
    <div id="menu">
        <?php loadModule('menu'); ?>
    </div>

    <div id="person">
        <img src="<?php $person->loadIMG($_REQUEST['user']); ?>" alt="" id="AVT">
        <div id="BGR" style="background-image: url('<?php $person->loadBGR($_REQUEST['user']) ?>');"></div>
        <div id="infor">
            <form action="" method="get">
                <table id="infor_person">
                    <tr>
                        <th class="infor_person">Họ Tên:</th>
                        <td class="infor_person">
                            <input type="text" id="name" name="name">
                        </td>
                    </tr>
                    <tr>
                        <th class="infor_person">Ngày sinh:</th>
                        <td class="infor_person">
                            <input type="text" id="DoB" name="DoB">
                        </td>
                    </tr>
                    <tr>
                        <th class="infor_person">Giới tính:</th>
                        <td class="infor_person">
                            <input type="text" id="GT" name="GT">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

</div>