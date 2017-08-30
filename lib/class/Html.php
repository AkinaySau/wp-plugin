<?php
/**
 * Created for sau-cp.
 * User: AkinaySau akinaysau@gmail.ru
 * Date: 30.08.2017
 * Time: 14:37
 */

namespace Sau\WP\Plugin;


class Html {

	/**
	 * Сборка массива атрибутов в строку
	 *
	 * @param array $default Массив базовых параметров
	 * @param array $attr    Массив параметров переданных пользователем
	 *
	 * @return string|bool
	 */
	final static function get_attr( $default, $attr ) {
		$attr = array_merge( $default, $attr );
		foreach ( $attr as $key => &$item ) {
			if ( is_string( $item ) && $key != 'value' ) {
				$item = $key . '="' . $item . '"';
			}
		}

		return implode( ' ', $attr ) or false;
	}


	final static function input(){

	}
}