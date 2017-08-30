<?php
/*
Plugin Name: Sau Cp
Plugin URI: http://a-sau.ru
Description: A brief description of the Plugin.
Version: 1.0
Author: AkinaySau
Author URI: http://a-sau.ru
License: A "Slug" license name e.g. GPL2
*/

use Plugin\MyPage;
use Sau\WP\Plugin\Plugin;

include 'vendor/autoload.php';

$plugin = Plugin::init();


MyPage::init();

//echo '<pre>';
//print_r($_POST);
//echo '</pre>';
//
//wp_die();
//
