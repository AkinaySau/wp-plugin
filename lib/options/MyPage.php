<?php

namespace Plugin;

use Sau\WP\Plugin\OPage;
use Sau\WP\Plugin\OptionsPage;

/**
 * Created for sau-cp.
 * User: AkinaySau akinaysau@gmail.ru
 * Date: 30.08.2017
 * Time: 16:01
 */
class MyPage {
	static function init() {

		$page = new OPage( 'asda', 'asd', true );

		$page->page_id      = 'asdasd';
		$page->option_group = 'xcvxcv';

		$page->build();

		//		echo '<pre>';
		//		print_r( $page );
		//		echo '</pre>';
	}
}