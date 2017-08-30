<?php
/**
 * Created for sau-cp.
 * User: AkinaySau akinaysau@gmail.ru
 * Date: 30.08.2017
 * Time: 13:15
 */

namespace Sau\WP\Plugin;


class Plugin {

	/**
	 * Идентификатор файла перевода, указывается при регистрации и подключении
	 * файла перевода. Если не указать, то будет использован дефолтный файл
	 * перевода, который используется в WordPress.
	 */
	private $domain_lang;

	/**
	 * Инициализация плагина
	 *
	 * @return self
	 */
	static public function init() {
		return new self();
	}

	/**
	 * Возвращает id файла перевода
	 *
	 * @return mixed
	 */
	public function getDomainLang() {
		return $this->domain_lang;
	}

	/**
	 * @param mixed $domain_lang
	 */
	public function setDomainLang( $domain_lang ) {
		$this->domain_lang = $domain_lang;
	}

}