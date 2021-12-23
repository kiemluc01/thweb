<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lí Tài Chính Cá Nhân</title>

    <link rel="icon" href="Public/images/logo_tabbar.png" type="image/x-icon">
    <link rel="stylesheet" href="Public/css/menu.css">
    <link rel="stylesheet" href="Public/css/animate.css">
    <link rel="stylesheet" href="Public/css/login.css">
    <link rel="stylesheet" href="Public/css/register.css">

</head>

<body>

    <script>
        window.onscroll = function() {
            myFunction()
        };
        var menu = document.getElementById("menu_main");
        var sticky = menu.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                menu.classList.add("sticky")
            } else {
                menu.classList.remove("sticky")
            }
        }
    </script>

    <!-- load component -->
    <?php loadComponent();    ?>


</body>

</html>