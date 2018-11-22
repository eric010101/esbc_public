<?php
namespace PHPMaker2019\esbc_public_20181122;

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(63, "mi_home", $Language->MenuPhrase("63", "MenuText"), "home.php", -1, "", TRUE, FALSE, TRUE, "", "", FALSE);
$sideMenu->addMenuItem(60, "mi_sensor_rawdata", $Language->MenuPhrase("60", "MenuText"), "sensor_rawdatalist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(27, "mi_esbc_chainstatus", $Language->MenuPhrase("27", "MenuText"), "esbc_chainstatuslist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
echo $sideMenu->toScript();
?>
