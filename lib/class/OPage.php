<?php
/**
 * Created for sau-cp.
 * User: AkinaySau akinaysau@gmail.ru
 * Date: 30.08.2017
 * Time: 16:41
 */

namespace Sau\WP\Plugin;


use function is_callable;
use Sau\Lib\Action;

class OPage {
	/**
	 * id страницы настроек
	 *
	 * @var string
	 */
	public $page_id;
	/**
	 * Группа опций которая будет выведена на странице
	 *
	 * @var string
	 */
	public $option_group;
	/**
	 *
	 * @var string
	 */
	public $capability = 'manage_options';
	/**
	 * Текст, который будет использован в теге title на странице, настроек.
	 *
	 * @var string
	 */
	protected $page_title;
	/**
	 * Текст, который будет использован в качестве называния для пункта меню.
	 *
	 * @var string
	 */
	protected $menu_title;
	/**
	 * Идентификатор меню
	 *
	 * @var string
	 */
	protected $menu_slug;
	/**
	 * Функция отвечающая за вывод страницы
	 *
	 * @var string
	 */
	protected $function;

	/**
	 * @param string        $title    Текст, который будет использован в теге
	 *                                title на странице, настроек.
	 * @param string        $slug     Идентификатор меню. Нужно вписывать
	 *                                уникальную строку, пробелы не
	 *                                допускаются.Можно, также указать путь от
	 *                                папки плагина до файла, который будет
	 *                                отвечать за страницу настроек плагина,
	 *                                пр. my-plugin/options.php. В этом случае,
	 *                                следующий параметр указывать не
	 *                                обязательно.(true для создания новой
	 *                                страницы)
	 * @param string|null   $m_title  Текст, который будет использован в
	 *                                качестве называния для пункта меню.
	 * @param callable|null $function Название функции, которая отвечает за код
	 *                                страницы этого пункта меню.
	 */
	public function __construct( $title, $slug, $function = null, $m_title = null ) {
		$this->page_title = $title;
		$this->menu_slug  = $slug;

		if ( is_callable( $function ) ) {
			$this->function = $function;
		} elseif ( $function === true ) {
			$this->function = function () {
				?>
				<div class="wrap">
					<h2><?php echo get_admin_page_title() ?></h2>
					<form action="options.php" method="POST">
						<?php
						do_settings_sections( $this->page_id );
						settings_fields( $this->option_group );
						submit_button();
						?>
					</form>
				</div>
				<?php
			};
		}
		if ( $m_title ) {
			$this->menu_title = $m_title;
		} else {
			$this->menu_title = $title;
		}
	}

	/**
	 * Подключение страницы
	 */
	public function build() {
		$callback = function () {
			add_options_page( $this->page_title, $this->menu_title, $this->capability, $this->menu_slug, $this->function );
		};
		Action::adminMenu( $callback );
	}
}