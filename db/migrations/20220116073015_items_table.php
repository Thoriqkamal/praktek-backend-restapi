<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class ItemsTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $items = $this->table('items', array('id' => 'id_item'));

        $items->addColumn('name', 'string', ['limit' => 99])
            ->addColumn('price', 'string', ['limit' => 99])
            ->addColumn('quantity', 'string', ['limit' => 99])
            ->addColumn('production_time','integer', ['limit' => 11])
            ->addColumn('start', 'datetime')
            ->addColumn('end', 'datetime')
            ->create();
    }
}
