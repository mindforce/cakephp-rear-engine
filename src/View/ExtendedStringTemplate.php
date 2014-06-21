<?php
namespace RearEngine\View;

use Cake\Core\Plugin;
use Cake\Configure\Engine\PhpConfig;
use Cake\View\StringTemplate;

/**
 * Provides an interface for registering and inserting
 * content into simple logic-less string templates.
 *
 * Used by several helpers to provide simple flexible templates
 * for generating HTML and other content.
 */
class ExtendedStringTemplate extends StringTemplate {

	protected $_defaultPlaceholders = [ 'attrs', 'text',
		'name', 'value','input', 'label',
		'year', 'month', 'day', 'hour', 'minute', 'second', 'meridian',
		'content', 'type', 'required', 'error'
	];

/**
 * Load a config file containing templates.
 *
 * Template files should define a `$config` variable containing
 * all the templates to load. Loaded templates will be merged with existing
 * templates.
 *
 * @param string $file The file to load
 * @return void
 */
	public function load($file) {
		list($plugin, $file) = pluginSplit($file);
		$path = APP;
		if (!empty($plugin)) $path = Plugin::path($plugin);
		$loader = new PhpConfig($path . 'src' . DS .'Config' . DS);
		$templates = $loader->read($file);
		$this->add($templates);
	}

/**
 * Format a template string with $data
 *
 * @param string $name The template name.
 * @param array $data The data to insert.
 * @return string
 */


	public function format($name, array $data) {
		list($template, $placeholders) = $this->compile($name);
		if ($template === null) {
			return '';
		}

		foreach ($placeholders as $placeholder) {
			if(isset($data['attrs'])&&!in_array($placeholder, $this->_defaultPlaceholders)){
				if(preg_match('#'.$placeholder.'="([^"]*)"#', $data['attrs'], $matches)){
					$data[$placeholder] = $this->format($placeholder, ['content' => html_entity_decode($matches[1])]);
					if(empty($data[$placeholder])) $data[$placeholder] = html_entity_decode($matches[1]);
					$data['attrs'] = preg_replace('#'.$placeholder.'="([^"]*)"#', '', $data['attrs']);
				}
			}
		}

		return parent::format($name, $data);
	}

}
