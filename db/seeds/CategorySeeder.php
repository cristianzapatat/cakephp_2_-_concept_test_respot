<?php


use Phinx\Seed\AbstractSeed;

class CategorySeeder extends AbstractSeed
{
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
        for ($i = 1; $i < 6; $i++) {
            $data[] = [
                'id' => $i,
                'name' => $faker->unique()->word,
                'description' => $faker->text(100)
            ];
        }

        $categories = $this->table('categories');
        $categories->insert($data)
              ->save();

        // empty the table
        // $categories->truncate();
    }
}
