<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class Posts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $response = Http::get('https://jsonplaceholder.typicode.com/posts');
            foreach ($response->object() as $key => $value) {
                DB::table('posts')->insert([
                    ['userId' => $value->userId,'title' => $value->title,'body' => $value->body, 'created_at' => date("Y-m-d H:i:s")],
                ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }


    }
}
