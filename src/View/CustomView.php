<?php
/**
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) iTeam s.r.o. (http://iteam-pro.com)
 * @link          http://iteam-pro.com RearEngine CakePHP 3 Plugin
 * @since         0.0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace RearEngine\View;

use Cake\View\View;
use Cake\Utility\Inflector;

/**
 * View, the V in the MVC triad. View interacts with Helpers and view variables passed
 * in from the controller to render the results of the controller action. Often this is HTML,
 * but can also take the form of JSON, XML, PDF's or streaming files.
 *
 * CakePHP uses a two-step-view pattern. This means that the view content is rendered first,
 * and then inserted into the selected layout. This also means you can pass data from the view to the
 * layout using `$this->set()`
 *
 * Since 2.1, the base View class also includes support for themes by default. Theme views are regular
 * view files that can provide unique HTML and static assets. If theme views are not found for the
 * current view the default app view files will be used. You can set `$this->theme = 'Mytheme'`
 * in your Controller to use the Themes.
 *
 * Example of theme path with `$this->theme = 'SuperHot';` Would be `Plugin/SuperHot/Template/Posts`
 *
 * @property      \Cake\View\Helper\CacheHelper $Cache
 * @property      \Cake\View\Helper\FormHelper $Form
 * @property      \Cake\View\Helper\HtmlHelper $Html
 * @property      \Cake\View\Helper\NumberHelper $Number
 * @property      \Cake\View\Helper\PaginatorHelper $Paginator
 * @property      \Cake\View\Helper\RssHelper $Rss
 * @property      \Cake\View\Helper\SessionHelper $Session
 * @property      \Cake\View\Helper\TextHelper $Text
 * @property      \Cake\View\Helper\TimeHelper $Time
 * @property      \Cake\View\ViewBlock $Blocks
 */
class CustomView extends View {

	/**
	 * Returns layout filename for this template as a string.
	 *
	 * @param string $name The name of the layout to find.
	 * @return string Filename for layout file (.ctp).
	 * @throws \Cake\View\Error\MissingLayoutException when a layout cannot be located
	 */
		protected function _getLayoutFileName($name = null) {
			if ($name === null) {
				$name = $this->layout;
			}
			$subDir = null;

			if ($this->layoutPath !== null) {
				$subDir = $this->layoutPath . DS;
			}
			list($plugin, $name) = $this->pluginSplit($name);
			$paths = $this->_paths($plugin);

			$layoutPaths = ['Layout' . DS . $subDir];
			if (!empty($this->request->params['prefix'])) {
				array_unshift(
					$layoutPaths,
					Inflector::camelize($this->request->params['prefix']) . DS . $layoutPaths[0]
				);
			}

			foreach ($paths as $path) {
				foreach ($layoutPaths as $layoutPath) {
					if (file_exists($path . $layoutPath . $name . $this->_ext)) {
						return $path . $layoutPath . $name . $this->_ext;
					}
				}
			}
			throw new Error\MissingLayoutException(array(
				'file' => $layoutPath[0] . $name . $this->_ext
			));
		}

}
