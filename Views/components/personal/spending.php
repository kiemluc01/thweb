<?php
if (isset($_REQUEST['money_spend']) && isset($_REQUEST['content_spend'])) {
    $noidung = $_REQUEST['content_spend'];
    $tongtien = $_REQUEST['money_spend'];
    $ngaymua = date('y-m-d');
    $Loai = $_REQUEST['type_spend'];
    $Spend = loadModel('Spend');
    $Spend->add($noidung, $tongtien, $ngaymua, $Loai);
}
?>
<div class="menu_container">
    <div id="menu">
        <?php loadModule('menu'); ?>
    </div>
    <div id="spending">
        <center>
            <h1 id="title_add_spend">Chi tiêu hàng tháng</h1>
        </center>
        <div id="add_spend">
            <form action="" class="spend" method="post">
                <table>
                    <tr>
                        <th colspan="2" id="title_spend">Thêm các chhi tiêu hôm nay</th>
                    </tr>
                    <tr>
                        <td>Nội dung: </td>
                        <td><input type="text" name="content_spend" id="content_spend"></td>
                    </tr>
                    <tr>
                        <td>Loại chi tiêu: </td>
                        <td>
                            <select name="type_spend" id="type_spend" name="type_spend">
                                <option value="sinh hoạt">sinh hoạt</option>
                                <option value="giải trí">giải trí</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Tổng tiền: </td>
                        <td><input type="text" name="money_spend" id="money_spend"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <center><input type="submit" value="thêm" id="btnadd_spend" name="btnadd_spend"></center>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div id="table_spend">
            <table id="content_table_spend">
                <tr>
                    <th id="STT">STT</th>
                    <th id="Loai">Loại chi tiêu</th>
                    <th id="content">Nội dung</th>
                    <th id="ngay">Ngày mua</th>
                    <th id="tong">Tổng tiền</th>
                </tr>
                <?php
                $Spend = loadModel('Spend');
                $result = $Spend->getData();
                $i = 1;
                if ($result->num_rows > 0)
                    while ($row = $result->fetch_assoc())

                        if (!empty($row['noidung'])) { ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['Loai']; ?></td>
                        <td><?php echo $row['noidung']; ?></td>
                        <td><?php echo $row['ngaymua']; ?></td>
                        <td><?php echo $row['tongtien']; ?></td>
                    </tr>
                <?php $i++;
                        }
                if ($i == 1) { ?>
                    <tr>
                        <td colspan="5">Bạn chưa có chi tiêu nào</td>
                    </tr>
                    <?php   } else {
                    $result = $Spend->getTongtien();
                    if ($result->num_rows > 0)
                        while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td colspan="3">Tổng tiền</td>
                            <td colspan="2"><?php echo number_format($row['tien']); ?> VNĐ</td>
                        </tr>
                <?php }
                }
                ?>
            </table>
        </div>
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