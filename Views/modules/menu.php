<ul class="container_menu">
    <li class="menu_bar" style="text-align: center; background-image:none;"><a href="<?php echo 'index.php?cat=personal&user=' . $_REQUEST['user']; ?>"><img src="Public/images/logo_tabbar.png" alt="" id="logo_menu"></a></li>
    <li class="menu_bar"><a href="<?php echo 'index.php?cat=personal&sub_cat=finance&user=' . $_REQUEST['user']; ?>">Tài chính tháng này</a></li>
    <li class="menu_bar"><a href="<?php echo 'index.php?cat=personal&sub_cat=finance&user=' . $_REQUEST['user']; ?>">Tiền tiết kiệm(10%)</a></li>
    <li class="menu_bar"><a href="">Chi phí Theo nhu cầu</a>
        <ul class="menu_bar_con">
            <li class="menu_bar"><a href="<?php echo 'index.php?cat=personal&sub_cat=living&user=' . $_REQUEST['user']; ?>">Nhu cầu sinh hoạt(70%)</a></li>
            <li class="menu_bar"><a href="<?php echo 'index.php?cat=personal&sub_cat=entertain&user=' . $_REQUEST['user']; ?>">Nhu cầu giải trí(20%)</a></li>
        </ul>
    </li>
    <li class="menu_bar"><a href="<?php echo 'index.php?cat=personal&sub_cat=working&user=' . $_REQUEST['user']; ?>">Ngày đi làm</a></li>
    <li class="menu_bar"><a href="index.php">Đăng xuất</a></li>
</ul>