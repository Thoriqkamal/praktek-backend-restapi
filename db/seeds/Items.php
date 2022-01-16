<?php


use Phinx\Seed\AbstractSeed;

class Items extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $data = array(
            array(
                'name'            => 'item-a',            # Nama Item
                'price'           => 70000,               # Harga Maximum
                'quantity'        => 1000,                # Jumlah item yang akan dikerjakan
                'production_time' => 8,                   # Lama pengerjaan dalam hari
                'start'           => '2017-11-14 10:00',  # Mulai bidding
                'end'             => '2017-11-14 12:00'   # Akhir bidding
              ),
        );

        $item = $this->table('items');
        $item->insert($data)->save();
    }
}
