<?php


use Phinx\Seed\AbstractSeed;

class Users extends AbstractSeed
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
                'email'   => 'admin@admin.com',
                'api_key' => '1234',
                'hit'     => '0'
            ),   
        );

        $user = $this->table('users');
        $user->insert($data)->save();
    }
}
