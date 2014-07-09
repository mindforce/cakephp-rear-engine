DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scope` varchar(100) NOT NULL,
  `key` varchar(64) NOT NULL,
  `value` text,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'text',
  `default` text,
  `editable` tinyint(1) NOT NULL DEFAULT '1',
  `options` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_index` (`key`),
  KEY `settings_scope_key_index` (`scope`,`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
