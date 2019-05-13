<?php
declare(strict_types=1);

use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

/**
 * Class UsersTableSeeder
 */
class UsersTableSeeder extends Seeder
{
    protected $faker;
    
    /**
     * UsersTableSeeder constructor.
     */
    public function __construct()
    {
        $this->faker = Factory::create();
    }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $token = Str::random(20);
    
        User::create([
            'name' => $this->faker->name,
            'email' => 'demo@demo.com',
            'email_verified_at' => now(),
            'password' => bcrypt('demo'),
            'remember_token' => Str::random(10),
            'api_token' => substr(hash('sha256', $token),0,20),
        ]);
        
        factory(User::class, 50)->create();
    }
}
