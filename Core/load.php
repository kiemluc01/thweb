<?php
function loadModel($name)
{
    // $name = ucfirst(strtolower($name));
    $pathModel = 'Models/' . $name . '.php';
    if (file_exists($pathModel)) {
        include_once($pathModel);
        $modelclass = new $name;
        return $modelclass;
    } else return null;
}

//load module / teamplate
function loadModule($name)
{
    $pathModule = 'Views/modules/' . $name . '.php';
    if (file_exists($pathModule)) {
        include($pathModule);
    }
}

function loadTemplate($name)
{
    $pathTemplate = 'Views/template/' . $name . '.php';
    if (file_exists($pathTemplate)) {
        include($pathTemplate);
    } else {
        echo 'Template ' . $name . ' not exits';
    }
}

function loadComponent()
{
    $pathcom = 'Views/components/';
    if (isset($_REQUEST['cat'])) {
        if (isset($_REQUEST['sub_cat'])) {
            $pathcom = $pathcom . $_REQUEST['cat'] . '/' . $_REQUEST['sub_cat'] . '.php';
        } else
            $pathcom = $pathcom . $_REQUEST['cat'] . '/index.php';
        
       
    } else {
        $pathcom = $pathcom . 'home/index.php';
    }
    if (file_exists($pathcom)) {
        include_once($pathcom);
    } else {
        echo $pathcom . ' not exits';
    }
}
//load class
function loadClass($name)
{
    $name = ucfirst(strtolower($name));
    $pathClass = 'core/' . $name . '.php';
    if (file_exists($pathClass)) {
        include_once($pathClass);
        $nameclass = new $name;
        return $nameclass;
    } else return null;
}
function loadMenu()
{
    $pathMenu = 'Views/modules/';
    if (isset($_REQUEST['condition']))
        $pathMenu = $pathMenu . 'menu_login.php';
    else
        $pathMenu = $pathMenu . 'menu_home.php';
    if (file_exists($pathMenu)) {
        include($pathMenu);
    } else {
        echo 'cú tìm ra menu in rứa mô mà load cha';
    }
}
