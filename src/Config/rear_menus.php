<?php
$config = [
	'RearEngine' => [
		'menu' => [
			'top' => [
				/*
				'add' => [
					'title' => __d('rear_engine', 'Add...'),
					'weight' => 10,
					'options' => [
						'dropdown' => 'dropdown-quick-actions',
						'icon' => 'fa fa-plus'
					],
					'children' => [
						'users' => [
							'title' => __d('rear_engine', 'Add User'),
							'weight' => 999,
							'url' => [
								'plugin' => 'rear_engine',
								'admin' => true,
								'controller' => 'users',
								'action' => 'add'
							],
							'options' => [
								'icon' => 'fa fa-user'
							]
						]
					]
				],
				'notifications' => [
					'title' => '',
					'weight' => 10,
					'options' => [
						'dropdown' => 'dropdown-quick-actions',
						'icon' => 'fa fa-bell'
					],
					'children' => [
						'notifications-list' => [
							'type' => 'cell',
							'weight' => 999,
							'cell' => 'RearEngine.Notifications',
						]
					]
				],
				*/
			],
			'main' => [
				'sidebar-search' => [
					'type' => 'cell',
					'weight' => 0,
					'cell' => 'RearEngine.SearchTools',
				],
				'dashboard' => [
					'title' => __d('rear_engine', 'Dashboard'),
					'url' => '/',
					'weight' => 10,
					'options' => [
						'icon' => 'fa fa-home'
					]
				],
				/*
				'tools' => [
					'title' => __d('rear_engine', 'Tools'),
					'weight' => 9999,
					'options' => [
						'icon' => 'fa fa-wrench'
					],
					'children' => [
						'settings' => [
							'title' => __d('rear_engine', 'Settings'),
							'url' => [
								'plugin' => 'rear_engine',
								'controller' => 'settings',
								'action' => 'index'
							],
							'weight' => 0,
							'options' => [
								'icon' => 'fa fa-cogs'
							]
						]
					]
				]
				*/
			]
		]
	]
];
