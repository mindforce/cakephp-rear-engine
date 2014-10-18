<?php

use Phinx\Migration\AbstractMigration;
use Cake\ORM\TableRegistry;

class InitialMigration extends AbstractMigration
{

	protected $blocks = [
		[
			'id' => 1,
			'title' => 'Dasboard Top',
			'slug' => 'dashboard-top',
			'admin' => true,
			'cell_count' => 0,
		],
		[
			'id' => 2,
			'title' => 'Dasboard Left Column',
			'slug' => 'dashboard-left',
			'admin' => true,
			'cell_count' => 0,
		],
		[
			'id' => 3,
			'title' => 'Dasboard Right Column',
			'slug' => 'dashboard-right',
			'admin' => true,
			'cell_count' => 0,
		],
		[
			'id' => 4,
			'title' => 'Dasboard Bottom',
			'slug' => 'dashboard-bottom',
			'admin' => true,
			'cell_count' => 0,
		],
	];

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
     * Uncomment this method if you would like to use it.
     *
    public function change()
    {
    }
    */
    
    /**
     * Migrate Up.
     */
    public function up()
    {
	    $blocks =  $this->table('blocks');
	    $blocks->addColumn('title', 'string', ['limit' => 255])
            ->addColumn('slug', 'string', ['limit' => 255])
            ->addColumn('admin', 'boolean', ['null' => true])
            ->addColumn('created', 'datetime', ['null' => true])
            ->addColumn('modified', 'datetime', ['null' => true])
		    ->addColumn('cell_count', 'integer', ['null' => true, 'default' => 0])
		    ->addIndex(['slug'], array('unique' => true, 'name' => 'blocks_slug_idx'))
		    ->addIndex(['slug', 'admin'], array('unique' => true, 'name' => 'blocks_slug_admin_idx'))
            ->save();

	    $cells =  $this->table('cells');
	    $cells->addColumn('block_id', 'integer', ['default' => 0])
			->addColumn('parent_id', 'integer', ['null' => true])
		    ->addColumn('title', 'string', ['limit' => 255])
		    ->addColumn('slug', 'string', ['limit' => 255])
		    ->addColumn('cell', 'string', ['limit' => 255, 'null' => true])
		    ->addColumn('text', 'text', ['null' => true])
		    ->addColumn('state', 'boolean', ['default' => 0])
		    ->addColumn('lft', 'integer', ['null' => true])
		    ->addColumn('rght', 'integer', ['null' => true])
		    ->addColumn('created', 'datetime', ['null' => true])
			->addColumn('modified', 'datetime', ['null' => true])
		    ->addColumn('options', 'text', ['null' => true])
		    ->addColumn('visibility', 'string', ['limit' => 11, 'default' => 'all'])
		    ->addColumn('visible_on', 'text', ['null' => true])
		    ->addIndex(['slug'], array('unique' => true, 'name' => 'cells_slug_idx'))
		    //->addForeignKey('block_id', 'blocks', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
		    ->addIndex(['block_id', 'state'], array('unique' => false, 'name' => 'cells_block_id_state_admin_idx'))
		    ->addIndex(['parent_id'], array('unique' => false, 'name' => 'cells_parent_id_idx'))
		    ->addIndex(['visibility'], array('unique' => false, 'name' => 'cells_visibility_idx'))
			->save();

	    $settings =  $this->table('settings');
	    $settings->addColumn('plugin', 'string', ['limit' => 32, 'default' => 'App'])
			->addColumn('path', 'string', ['limit' => 64])
		    ->addColumn('value', 'text', ['null' => true])
		    ->addIndex(['path'], array('unique' => true, 'name' => 'settings_key_idx'))
			->save();

	    //Seed blocks table by default data
	    $blocks = TableRegistry::get('RearEngine.Blocks');
	    foreach ($this->blocks as $block){
		    $block = $blocks->newEntity($block);
		    $blocks->save($block);
	    }

    }

    /**
     * Migrate Down.
     */
    public function down()
    {
	    $this->dropTable('blocks');
	    $this->dropTable('cells');
	    $this->dropTable('settings');

    }
}