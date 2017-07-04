<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for ($i = 1;$i <= 8000;$i++) {
            $data[] = [
                'name' => "name{$i}",
                'created' => date('Y-m-d'),
                'modified' => date('Y-m-d')
            ];
        }
        $table = $this->table('users');
        $table->insert($data)->save();

        $data = [];
        for ($i = 1;$i <= 1000;$i++) {
            $data[] = [
                'name' => "product{$i}",
                'created' => date('Y-m-d'),
                'modified' => date('Y-m-d')
            ];
        }
        $table = $this->table('products');
        $table->insert($data)->save();

        for ($i = 1;$i <= 8000;$i++) {
            for ($j = 1;$j <= 1000;$j++) {
                $data = [
                    'user_id' => $i,
                    'product_id' => $j,
                    'random_hash' => substr(md5($i), 0 ,10),
                    'purchase_count' => rand(0 , 5),
                    'created' => date('Y-m-d'),
                    'modified' => date('Y-m-d')
                ];
                $table = $this->table('logs');
                $table->insert($data)->save();
            }
        }
    }
}
