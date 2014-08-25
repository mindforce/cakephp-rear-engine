SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plugin` varchar(255) NOT NULL DEFAULT 'App',
  `scope` varchar(100) NOT NULL,
  `key` varchar(64) NOT NULL,
  `value` text,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `cell` varchar(255) DEFAULT NULL,
  `default` text,
  `editable` tinyint(1) NOT NULL DEFAULT '1',
  `options` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_index` (`key`),
  UNIQUE KEY `settings_scope_key_index` (`scope`,`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

INSERT INTO `settings` (`id`, `plugin`, `scope`, `key`, `value`, `title`, `description`, `cell`, `default`, `editable`, `options`) VALUES
(36, 'RearEngine', 'Cache', 'default.duration', '300', 'Cache lifetime', 'in seconds', NULL, '300', 1, NULL),
(37, 'RearEngine', 'Cache', 'default.className', NULL, 'Cache engine', 'Choose engine for cache storage (default: File). Always choose <strong>File</strong> if you are not sure in other options', 'RearEngine.CacheEngine', 'File', 1, '{"type":"select", "options":{"File":"File cache is a simple cache that uses local files","Apc":"APC cache uses the PHP APC extension","Wincache":"Wincache uses the Wincache extension","Xcache":" Xcache is a PHP extension that provides similar features to APC","Memcached":"Uses the Memcached extension","Redis":"Redis uses the phpredis extension"}}'),
(38, 'RearEngine', 'Cache', 'default.probability', '100', 'Cache probability', 'in seconds', NULL, '100', 1, NULL),
(39, 'RearEngine', 'Cache', 'check', '0', 'Static cache', 'Enable full page caching. Usable for huge sites but may cache dynamic blocks', NULL, '0', 1, '{"type":"radio", "options":{"0":"No","1":"Yes"}}'),
(41, 'RearEngine', 'Meta', 'description', 'My site for any people', 'Meta description', NULL, NULL, 'My site for any people', 1, '{"type":"textarea"}'),
(42, 'RearEngine', 'Meta', 'generator', 'RearEngine - helpful plugin for apps bakers', 'Meta generator', NULL, NULL, 'RearEngine - helpful plugin for apps bakers', 1, NULL),
(43, 'RearEngine', 'Meta', 'keywords', 'RearEngine, CakePHP admin, plugin', 'Meta keywords', NULL, NULL, 'RearEngine, CakePHP admin, plugin', 1, '{"type":"textarea"}'),
(44, 'RearEngine', 'Meta', 'robots', 'index, follow', 'Robots directive', NULL, NULL, 'index, follow', 1, NULL),
(57, 'RearEngine', 'Session', 'defaults', 'php', 'Session engine', 'Choose engine for session storage. Database is prefered for small sites. PHP for big sites under heavy traffik', NULL, 'php', 1, '{"type":"radio", "options":{"php":"PHP sessions","database":"Database"}}'),
(58, 'RearEngine', 'Session', 'timeout', '15', 'Session timeout', 'in minutes', NULL, '15', 1, NULL),
(59, 'RearEngine', '', 'debug', '1', 'Debug mode', 'Choose debug level for your site (default: File). If your site is ready for visitors, please choose <strong>Production</strong>.  <strong>Debug</strong> recommended if you want to track errors.', NULL, '1', 1, '{"type":"radio", "options":{"0":"Production","1":"Debug"}}'),
(64, 'RearEngine', 'App', 'theme', '', 'Frontend theme', NULL, NULL, NULL, 0, NULL),
(65, 'RearEngine', 'App', 'status', '1', 'Enabled for visitors', NULL, NULL, '1', 1, '{"type":"radio", "options":{"0":"Offline","1":"Online"}}'),
(67, 'RearEngine', 'App', 'timezone', '0', 'Site timezone', 'zero (0) for GMT', NULL, '0', 1, '{"type":"select", "options":{"-12":"(GMT -12:00) International Date Line West","-11":"(GMT -11:00) Midway Island","-10":"(GMT -10:00) Hawaii","-9":"(GMT -9:00) Alaska","-8":"(GMT -8:00) Pacific Time","-7":"(GMT -7:00) Mountain Time","-6":"(GMT -6:00) Central Time","-5":"(GMT -5:00) Eastern Time","-4":"(GMT -4:00) Atlantic Time","-3":"(GMT -3:00) Greenland","-2":"(GMT -2:00) Brazil, Mid-Atlantic","-1":"(GMT -1:00) Portugal","0":"(GMT +0:00) Greenwich Mean Time","+1":"(GMT +1:00) Germany, Italy, Spain","+2":"(GMT +2:00) Greece, Israel, Turkey, Zambia","+3":"(GMT +3:00) Iraq, Kenya, Russia (Moscow)","+4":"(GMT +4:00) Azerbaijan, Afghanistan, Russia (Izhevsk)","+5":"(GMT +5:00) Pakistan, Uzbekistan","+5.5":"(GMT +5:30) India, Sri Lanka","+6":"(GMT +6:00) Bangladesh, Bhutan","+6.5":"(GMT +6:30) Burma, Cocos","+7":"(GMT +7:00) Thailand, Vietnam","+8":"(GMT +8:00) China, Malaysia, Taiwan, Australia","+9":"(GMT +9:00) Japan, Korea, Indonesia","+9.5":"(GMT +9:30) Australia","+10":"(GMT +10:00) Australia, Guam, Micronesia","+11":"(GMT +11:00) Solomon Islands, Vanuatu","+12":"(GMT +12:00) New Zealand, Fiji, Nauru","+13":"(GMT +13:00) Tonga"}}'),
(68, 'RearEngine', 'Meta', 'title', 'My Site', 'Default site title', NULL, NULL, 'My Site', 1, NULL),
(69, 'RearEngine', 'App', 'admin.theme', 'RearEngine', NULL, NULL, 'RearEngine.Theme', 'RearEngine', 0, NULL);
