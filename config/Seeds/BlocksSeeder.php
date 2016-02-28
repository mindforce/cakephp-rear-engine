<?php

use Phinx\Seed\AbstractSeed;

class BlocksSeeder extends AbstractSeed
{
    public function run()
    {
        $data = [
            [
    			'title' => 'Dashboard Top',
    			'slug' => 'dashboard-top',
    			'admin' => true,
    			'cell_count' => 0,
    		],
    		[
    			'title' => 'Dashboard Left Column',
    			'slug' => 'dashboard-left',
    			'admin' => true,
    			'cell_count' => 0,
    		],
    		[
    			'title' => 'Dashboard Right Column',
    			'slug' => 'dashboard-right',
    			'admin' => true,
    			'cell_count' => 0,
    		],
    		[
    			'title' => 'Dashboard Bottom',
    			'slug' => 'dashboard-bottom',
    			'admin' => true,
    			'cell_count' => 0,
    		],
        ];

        $blocks = $this->table('platform_blocks');
        $blocks->insert($data)
            ->save();
    }
}
