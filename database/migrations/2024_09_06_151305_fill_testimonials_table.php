<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //        "The entire team (Dave particularly) was responsive to us. We particularly appreciate the care you all showed in cleaning up at the end of the day. All subs reflected the values of DeBoer Building."
        //​-Paul K.
        \App\Models\Testimonial::create([
            'content'   => "The entire team (Dave particularly) was responsive to us. We particularly appreciate the care you all showed in cleaning up at the end of the day. All subs reflected the values of DeBoer Building.",
            'client_id' => \App\Models\Client::firstOrCreate([
                'name' => 'Paul K.'
            ])->id
        ]);

        //    "Ben was very straightforward and made me feel at ease/like I was being treated fairly. All work was exceptional. DeBoer guys were awesome, very kind and easy going, and accomododating with our animals. DeBoer is phenomenal, we love everything!"
        //​-Meghan M.
        \App\Models\Testimonial::create([
            'content'   => "Ben was very straightforward and made me feel at ease/like I was being treated fairly. All work was exceptional. DeBoer guys were awesome, very kind and easy going, and accomododating with our animals. DeBoer is phenomenal, we love everything!",
            'client_id' => \App\Models\Client::firstOrCreate([
                'name' => 'Meghan M.'
            ])->id
        ]);

        //    "DeBoer Building had transparency in costs, high quality work, great communication, willingness to find solutions within our budget. The whole team was great. My husband, Matt, reached out to Dave a lot with questions & he was always responsive & helpful! Thanks for another great remodel!"
        //Matt & Caitlin C.
        \App\Models\Testimonial::create([
            'content'   => "DeBoer Building had transparency in costs, high quality work, great communication, willingness to find solutions within our budget. The whole team was great. My husband, Matt, reached out to Dave a lot with questions & he was always responsive & helpful! Thanks for another great remodel!",
            'client_id' => \App\Models\Client::firstOrCreate([
                'name' => 'Matt & Caitlin C.'
            ])->id
        ]);

        //    "We really appreciate the great work and couldn't be more please with how it (the kitchen) turned out!"
        //    -Tim & Annie B.
        \App\Models\Testimonial::create([
            'content'   => "We really appreciate the great work and couldn't be more please with how it (the kitchen) turned out!",
            'client_id' => \App\Models\Client::firstOrCreate([
                'name' => 'Tim & Annie B.'
            ])->id
        ]);

        //    "We chose DeBoer Building because of prior experience - we trust your team to do the work, timely and completely. You do great work! DeBoer Building is our first call for any new project!"
        //    -Allison M.
        \App\Models\Testimonial::create([
            'content'   => "We chose DeBoer Building because of prior experience - we trust your team to do the work, timely and completely. You do great work! DeBoer Building is our first call for any new project!",
            'client_id' => \App\Models\Client::firstOrCreate([
                'name' => 'Allison M.'
            ])->id
        ]);

        //    "Thanks for a great job! We really like our new bathroom & reveice compliments on it from visitors."
        //    -Bob & Linda P.
        \App\Models\Testimonial::create([
            'content'   => "Thanks for a great job! We really like our new bathroom & reveice compliments on it from visitors.",
            'client_id' => \App\Models\Client::firstOrCreate([
                'name' => 'Bob & Linda P.'
            ])->id
        ]);

        //    "DeBoer Building had fair pricing, everything was explained well. We had great selection of products and sales people that worked with us to find the best products for us within out budget. All employees were great. Good and timely communication. They listened to our wants & needs.
        //​-Nancy B.
        \App\Models\Testimonial::create([
            'content'   => "DeBoer Building had fair pricing, everything was explained well. We had great selection of products and sales people that worked with us to find the best products for us within out budget. All employees were great. Good and timely communication. They listened to our wants & needs.",
            'client_id' => \App\Models\Client::firstOrCreate([
                'name' => 'Nancy B.'
            ])->id
        ]);

        //" Everyone was great! Responsive and detailed information provided. I wouldn't hesitate to hire DeBoer Building again and recommend to others. Thank you!"
        //​-Maria A.
        \App\Models\Testimonial::create([
            'content'   => "Everyone was great! Responsive and detailed information provided. I wouldn't hesitate to hire DeBoer Building again and recommend to others. Thank you!",
            'client_id' => \App\Models\Client::firstOrCreate([
                'name' => 'Maria A.'
            ])->id
        ]);

        //"We used DeBoer Building because we just clicked during the initial visit. We knew that the project would be exactly what I wanted. The finished bathroom was exactly as we imagined."
        //-Heather L.
        \App\Models\Testimonial::create([
            'content'   => "We used DeBoer Building because we just clicked during the initial visit. We knew that the project would be exactly what I wanted. The finished bathroom was exactly as we imagined.",
            'client_id' => \App\Models\Client::firstOrCreate([
                'name' => 'Heather L.'
            ])->id
        ]);

        //"DeBoer came highly recommended by Godwin Plumbing and Ben made a great first impression. The list of refrences was very impressive. Dave was very responsive & helpful. I really appreciated the "can do" attitude to all our questions. We had one issue where the demolition created too much dust for our furnace. The issue was addressed right away."
        //- Jim B.
        \App\Models\Testimonial::create([
            'content'   => "DeBoer came highly recommended by Godwin Plumbing and Ben made a great first impression. The list of refrences was very impressive. Dave was very responsive & helpful. I really appreciated the 'can do' attitude to all our questions. We had one issue where the demolition created too much dust for our furnace. The issue was addressed right away.",
            'client_id' => \App\Models\Client::firstOrCreate([
                'name' => 'Jim B.'
            ])->id
        ]);

        //"I found DeBoer Building from a recommendation from my neighbor. DeBoer had good communication from staff during the project & I appreciated the follow-up calls from Ben."
        //- Nancy K.
        \App\Models\Testimonial::create([
            'content'   => "I found DeBoer Building from a recommendation from my neighbor. DeBoer had good communication from staff during the project & I appreciated the follow-up calls from Ben.",
            'client_id' => \App\Models\Client::firstOrCreate([
                'name' => 'Nancy K.'
            ])->id
        ]);
    }
};
