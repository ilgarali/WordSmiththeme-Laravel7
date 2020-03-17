<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['3 Benefits of Minimalism In Interior Design.','10 Interesting Facts About Caffeine.','The Power of Music to Reduce Stress.',
        'The Pomodoro Technique Really Works.','Visiting Theme Parks Improves Your Health.','What Your Music Preference Says About You and Your Personality.'
        ];
        foreach ($titles as $title) {
            DB::table('posts')->insert([
                'category_id' => rand(1,5),
                'user_id'=>1,
                'slide'=>0,
                'title'=>$title,
                'slug'=>Str::slug($title),
                'content'=>$title,
                'img'=>'https://i2.cnnturk.com/i/cnnturk/75/630x0/5e1da70db57f150cb840ccb3.jpg'

            ]);
        }
        
    }
}
