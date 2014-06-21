<?php
/**
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) iTeam s.r.o. (http://iteam-pro.org)
 * @link          http://iteam-pro.com RearEngine Project
 * @since         0.0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<?php
if (!isset($channel)):
	$channel = array();
endif;
if (!isset($channel['title'])):
	$channel['title'] = $title_for_layout;
endif;

echo $this->Rss->document(
	$this->Rss->channel(
		array(), $channel, $this->fetch('content')
	)
);
?>
