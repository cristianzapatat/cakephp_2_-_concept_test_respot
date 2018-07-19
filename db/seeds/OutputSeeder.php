<?php


use Phinx\Seed\AbstractSeed;

class OutputSeeder extends AbstractSeed
{
    public function getDependencies() {
        return [
            'ProductSeeder',
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
        for ($i=1; $i <= 300; $i++) { 
            $data[] = [
                'id' => $i,
                'product_id' => $faker->numberBetween(1, 150),
                'count' => $faker->randomDigit,
                'unit_value' => $faker->randomFloat(2, $min = 0, $max = 3580000),
                'date' => $faker->dateTimeBetween('now', '3 months', null)->format('Y-m-d H:i:s')
            ];
        }

        $outputs = $this->table('outputs');
        $outputs->insert($data)
            ->save();

        // empty data table
        // $outputs->truncate();
    }
}
