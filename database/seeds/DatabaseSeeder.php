<?php

use Illuminate\Database\Seeder;
use App\Model\Hut;
use App\Model\Discussion;
use App\Model\Reply;
use App\User;
use App\Model\Like;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(User::class,10)->create();
        factory(Hut::class,5)->create();
        factory(Discussion::class,10)->create();
        factory(Reply::class,50)->create()->each(function($reply){
            return $reply->like()->save(factory(Like::class)->make());
        });
    }
}
