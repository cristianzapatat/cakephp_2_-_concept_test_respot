<?php


use Phinx\Seed\AbstractSeed;

class ProductSeeder extends AbstractSeed
{   

    public function getDependencies()
    {
        return [
            'CategorySeeder',
        ];
    }

    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 1; $i <= 150; $i++) {
            $data[] = [
                'id' => $i,
                'code' => $faker->unique()->word,
                'category_id' => $faker->numberBetween(1, 5),
                'name' => $faker->word,
                'description' => $faker->text(100)
            ];
        }

        $products = $this->table('products');
        $products->insert($data)
              ->save();

        // empty the table
        // $products->truncate();
    }
}
