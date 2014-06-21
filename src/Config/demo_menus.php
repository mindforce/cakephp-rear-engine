<?php
$config = [
	'RearEngine' => [
		'menu' => [
			'top' => [
				'user' => [
					'title' => '',
					'weight' => 100000,
					'children' => [
						'login' => [
							'title' => __d('rear_engine', 'Login'),
							'url' => [
								'plugin' => 'rear_engine',
								'controller' => 'demos',
								'action' => 'login'
							],
							'weight' => 20,
						]
					],
					'options' => [
						'icon' => 'fa fa-user',
						'dropdown' => true
					]
				]
			],
			'main' => [
				'demo-menu' => [
					'title' => __d('rear_engine', 'Demo Pages'),
					'weight' => 100000,
					'children' => [
						'dashboard' => [
							'title' => __d('rear_engine', 'Dashboard'),
							'url' => [
								'plugin' => 'rear_engine',
								'controller' => 'demos',
								'action' => 'index'
							],
							'weight' => 10,
							'options' => [
								'icon' => 'fa fa-home'
							]
						],
						'charts' => [
							'title' => __d('rear_engine', 'Charts'),
							'weight' => 20,
							'options' => [
								'icon' => 'fa fa-bar-chart-o'
							],
							'children' => [
								'flot' => [
									'title' => __d('rear_engine', 'Flot Charts'),
									'url' => [
										'plugin' => 'rear_engine',
										'controller' => 'demos',
										'action' => 'flot'
									],
									'weight' => 10,
								],
								'morris' => [
									'title' => __d('rear_engine', 'Morris.js Charts'),
									'url' => [
										'plugin' => 'rear_engine',
										'controller' => 'demos',
										'action' => 'morris'
									],
									'weight' => 20,
								]
							]
						],
						'tables' => [
							'title' => __d('rear_engine', 'Tables'),
							'url' => [
								'plugin' => 'rear_engine',
								'controller' => 'demos',
								'action' => 'tables'
							],
							'weight' => 30,
							'options' => [
								'icon' => 'fa fa-table'
							]
						],
						'forms' => [
							'title' => __d('rear_engine', 'Forms'),
							'url' => [
								'plugin' => 'rear_engine',
								'controller' => 'demos',
								'action' => 'forms'
							],
							'weight' => 40,
							'options' => [
								'icon' => 'fa fa-edit'
							]
						],
						'ui-elements' => [
							'title' => __d('rear_engine', 'UI Elements'),
							'weight' => 50,
							'options' => [
								'icon' => 'fa fa-wrench'
							],
							'children' => [
								'panels-and-wells' => [
									'title' => __d('rear_engine', 'Panels and Wells'),
									'url' => [
										'plugin' => 'rear_engine',
										'controller' => 'demos',
										'action' => 'panels_wells'
									],
									'weight' => 10,
								],
								'buttons' => [
									'title' => __d('rear_engine', 'Buttons'),
									'url' => [
										'plugin' => 'rear_engine',
										'controller' => 'demos',
										'action' => 'buttons'
									],
									'weight' => 20,
								],
								'notifications' => [
									'title' => __d('rear_engine', 'Notifications'),
									'url' => [
										'plugin' => 'rear_engine',
										'controller' => 'demos',
										'action' => 'notifications'
									],
									'weight' => 30,
								],
								'typography' => [
									'title' => __d('rear_engine', 'Typography'),
									'url' => [
										'plugin' => 'rear_engine',
										'controller' => 'demos',
										'action' => 'typography'
									],
									'weight' => 40,
								],
								'grid' => [
									'title' => __d('rear_engine', 'Grid'),
									'url' => [
										'plugin' => 'rear_engine',
										'controller' => 'demos',
										'action' => 'grid'
									],
									'weight' => 50,
								]

							]
						],
						'sample_pages' => [
							'title' => __d('rear_engine', 'Sample Pages'),
							'weight' => 60,
							'options' => [
								'icon' => 'fa fa-files-o'
							],
							'children' => [
								'blank' => [
									'title' => __d('rear_engine', 'Blank Page'),
									'url' => [
										'plugin' => 'rear_engine',
										'controller' => 'demos',
										'action' => 'blank'
									],
									'weight' => 10,
								],
								'login' => [
									'title' => __d('rear_engine', 'Login Page'),
									'url' => [
										'plugin' => 'rear_engine',
										'controller' => 'demos',
										'action' => 'login'
									],
									'weight' => 20,
								]
							]
						]
					]
				]
			]
		]
	]
];
