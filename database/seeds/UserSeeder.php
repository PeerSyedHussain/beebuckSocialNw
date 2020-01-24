<?php

use App\Domains\Users\Models\CompanyDetail;
use App\Domains\Users\Models\EducationDetail;
use App\Domains\Users\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'uuid' => \Ramsey\Uuid\Uuid::uuid4(),
            'f_name' => 'Admin',
            'email' => 'admin@beebuck.com',
            'password' => bcrypt('password'),
            'created_by' => 1,
        ]);

        $users = factory(User::class, 5)->create()->each(
            function ($user) {
                $user->educationDetails()->save(
                    factory(EducationDetail::class)->make([
                        'user_id' => $user->id
                    ])
                );
                $user->companyDetails()->save(
                    factory(CompanyDetail::class)->make([
                        'user_id' => $user->id
                    ])
                );
                $user->tags()->saveMany(
                    factory(\App\Domains\Users\Models\Tag::class,5)->create()
                );
                $user->links()->saveMany(
                    factory(\App\Domains\Users\Models\Link::class,5)->make([
                        'user_id' => $user->id
                    ])
                );
            }
        );
    }
}
