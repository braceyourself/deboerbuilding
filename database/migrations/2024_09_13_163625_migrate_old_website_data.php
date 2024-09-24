<?php

use App\Models\Client;
use App\Models\Employee;
use App\Models\PageContent;
use App\Models\Testimonial;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        PageContent::query()->delete();

        PageContent::create([
            'title' => 'The Project Process',
            'slug' => 'the-project-process',
            'page' => 'about',
            'markdown' => true,
            'content' => <<<EOF
            When you contact DeBoer Building, we will discuss your project plans and the goals you wish to accomplish with your home improvement. At that time, we will acquire basic information about you and your needs and will schedule an appointment for one of our representatives to evaluate your project.

            At the appointment we will walk with you through five steps:

            - Step 1. Look at your project and listen to the needs you have.
            - Step 2. Share with you the distinguishing characteristics and values of DeBoer Building.
            - Step 3. When applicable, determine a range of cost for the project.
            - Step 4. Determine whether DeBoer Building can team with you in accomplishing your goals for this project.
            - Step 5. If we choose to team together, we will write and sign a proposal or, when applicable, a contract.

            In some projects, we may determine together that a feasibility study will be needed or that design, layout, and plans need to be drawn. In those cases, a retainer will be required to begin detailing the project so that accurate estimates for the work can be given. We will then submit a detailed written estimate for the work to be completed. Drawings will be available for your project if necessary. Upon written agreement of the detailed estimate, we will proceed to draw up a proposal containing a payment schedule and legalities. After the proposal is signed, we will arrange a start date to begin your home improvement as soon as our availability allows.

            We will be working on your project Monday through Friday, 8-5 PM unless other arrangements are necessary. Our team and trade contractors (electricians, plumbers, etc) will be professional and considerate of your environment.

            We seek to give each customer an enjoyable remodeling experience. Our employees give personal attention, value and quality that meet and exceed our customers' expectations. Take a look at our customer’s evaluations and consider adding your name to the list of people we have been able to serve.
            EOF
        ]);

        PageContent::create([
            'title' => 'Job Opportunities',
            'slug' => 'job-opportunities',
            'page' => 'about',
            'content' => <<<EOF
            DeBoer Building LLC is always looking for **highly motivated, skilled employees**. Job tasks include but are not limited to:

            - Demolition
            - Framing
            - Insulation
            - Drywall
            - Painting
            - Trim
            - Siding
            - Roofing

            We prefer that applicants have **2-3 years of experience** in most of the tasks listed, though **on-the-job training** may be needed. A key part of this job is the **ability to take instruction and turn it into systematic production**.

            ## Key Considerations for Applicants
            - **Attitude** towards co-workers, customers, and the work itself is a key factor in the hiring decision.
            - All employees are **representatives of DeBoer Building** and are expected to meet **high standards** in:
              - Appearance
              - Behavior
              - Language
              - Attitude

            ## Trial Period
            There will be a **90-day trial period** during which either party may terminate the relationship. This trial period helps ensure a **good fit** between the employee and DeBoer Building LLC.

            ## Work Hours and Meetings
            - **Normal hours**: 8:00 AM – 5:00 PM (with ½ hour for lunch)
            - Some projects may require **schedule adjustments**.
            - All employees are expected to attend **team meetings** every other week to discuss:
              - Projects
              - Schedules
              - Updates
              - Training

            ## Working Conditions
            - Employees will generally work with another team member but may occasionally work alone.
            - **Truck ownership** is preferred but not required.
              
            ## Compensation and Tools
            - Pay will depend on **skill level**.
            - Applicants can list the **tools** they currently possess.

            ## Expectations for Continued Improvement
            At DeBoer Building, we seek employees who are committed to **continued improvement** in:
            - Work ethic
            - Product knowledge
            - Attitude
            - Motivation
            - Skills

            We encourage improvement through reading, seminars, workshops, and internet research.

            ## How to Apply
            - **Resumes** are preferred and should be submitted with the application.
            - Applications and a detailed job description are available upon request by:
              - Calling (616) 363-3277
              - Emailing us at **deboerbuilding@gmail.com**
            EOF
        ]);

        PageContent::create([
            'title' => 'Mission Statement',
            'slug' => 'mission-statement',
            'page' => 'about',
            'content' => <<<EOF
            Our goal at DeBoer Building is to use the talents God has given us to improve homes while building lasting relationships of trust and respect with all the people we come in contact with. We seek to give each customer an enjoyable remodeling experience by giving personal attention, value and quality that meets and exceeds their expectations.
            EOF
        ]);

        PageContent::create([
            'title' => 'Company History',
            'slug' => 'company-history',
            'page' => 'about',
            'content' => <<<EOF
            DeBoer Building and Repair was launched in May of 1985 by its founder and current owner, Ben DeBoer. Ben’s interest in building began when he worked his father’s rental properties as a young adult. As with many small businesses, for the first few years the employees consisted of only Ben and one helper and they remodeled anything and everything. Customer satisfaction was top priority right from the start.

            The mindset that the customer’s needs come first helped DeBoer Building and Repair grow through the late 80’s and into the 90’s. During this time, 2 lead carpenters were hired, one of which was Ben’s brother Ron who is a driving force behind the success of DeBoer Building.

            In 1999 DeBoer Building and Repair changed its name to DeBoer Building, LLC. We have had the privilege of working with so many wonderful people over the years and we are grateful for the opportunities and talents we have been given.

            The strength of DeBoer Building comes from our commitment to customer satisfaction and attention to detail as well as providing quality workmanship at a fair price. We look forward to helping you remodel your home to fit your lifestyle.
            EOF
        ]);



        Employee::query()->delete();
        Employee::create([
            'name' => 'Ben DeBoer',
            'position' => 'Owner',
            'blurb' => <<<EOF
            Founder and owner of DeBoer Building, LLC since 1985, Ben has worked hard every day to make the business successful. 
            Working in the office and out in the field, Ben meets with customers providing estimates and making sure they're set prior and during projects. 
            He has been married thirty-six years with 5 children, 3 of whom work in the family business. 
            Ben is an avid golfer, but loves any activities with his kids especially softball, hockey and board games. 
            EOF,
            'image' => 'employees/ben-deboer.jpg'
        ]);

        Employee::create([
            'name' => 'David DeBoer',
            'position' => 'Lead Carpenter/Owner',
            'blurb' => <<<EOF
            David attained his associates in architectural technology and his bachelors in construction management at Ferris University. In the process of taking over the family business, David works full time managing our employees and projects at the job sites. 
            David and his wife have two children, a son and a daughter, and are expecting their third child, a son, in July 2024. David loves being outside, playing volleyball, hockey, softball or any competitive game, and hunting. 
            EOF,
            'image' => 'employees/david-kelsie.jpg'
        ]);

        Employee::create([
            'name' => 'Courtney Aquino',
            'position' => 'Office Manager',
            'blurb' => <<<EOF
            Courtney started working for DeBoer Building in 2015 and is Ben's niece. She attended GRCC and Calvin College. Courtney helps facilitate customer selections, scheduling and the office work needed to keep things rolling.
            Courtney and her husband have two wonderful daughters. When they're not too busy with them, they love mountain biking, running and spending their time outside or fixing up their house. 
            EOF,
            'image' => 'employees/courtney-arnold.jpg'
        ]);

        Employee::create([
            'name' => 'Brittany Wasnich',
            'position' => 'Office Manager',
            'blurb' => <<<EOF
            Brittany is Ben's oldest "child" and started working in the office part time in 2021. She tag-teams with Courtney in facilitating customer selections and managing office duties. Brittany also works part time as the Children's Ministry Director at her church.
            Brittany and her husband have three children and she loves any get together that involves family and friends, including running, camping and being outdoors.
            EOF,
            'image' => 'employees/britt-joe.jpg',
            'image_properties' => 'style="object-position: 10%"'
        ]);

        Employee::create([
            'name' => 'Dan DeBoer',
            'blurb' => <<<EOF
            Dan is Ben's second oldest son and has worked with the company since 2011, starting as his Summer job in high school. Dan is a skilled worker that you will find on almost all our jobs. He loves sports and anything competitive, always up for a laugh and hanging out with friends. Some of Dan's hobbies include hunting, volleyball, hockey and softball.
            EOF,
            'image' => 'employees/danny.jpg'
        ]);

        Employee::create([
            'name' => 'Gary Steiner',
            'blurb' => <<<EOF
              Gary has been at DeBoer Building since early 2016 and is an expert in all things drywalling, mudding, and painting. If you ask him, he says he loves his job, because he gets to, "play in the mud all day."
              Gary is a family man, who has been with his wife since 1979. They have 9 children and many more grandchildren. Gary enjoys spending time with his children, and especially his grandchildren!
            EOF,
            'image' => 'employees/gary-denise-picture-crop.jpg',
            'image_properties' => 'style="object-position: 94%"'
        ]);

        Employee::create([
            'name' => 'Trent Saunders',
            'blurb' => <<<EOF
            Trent started working for DeBoer Building mid-2018. He started with us right out of high school, and continues to learn the trade and gain responsibility at each job. Recently Trent has been learning the art of drywall & mud from our resident expert, Gary. He has a great sense of humor and loves getting to know new people.
            Trent loves motorcycles and basketball and has recently picked up hunting and shooting!
            EOF,
            'image' => 'employees/trent.jpg',
        ]);

        Employee::create([
            'name' => 'Derek Williamson',
            'blurb' => <<<EOF
            Derek started with DeBoer Building in May of 2023. Previously he was a sushi chef at PF Chang's. He works with great initiative and is very friendly, he has advanced quickly in this new career at DeBoer Building and we have been thrilled to have him on our team.
            Derek loves playing golf and creating art. He still enjoys cooking and loves doing things with his girlfriend and friends.
            EOF,
            'image' => 'employees/derek-nina.jpg',
        ]);

        Testimonial::query()->delete();
        Testimonial::create([
            'content'   => "The entire team (Dave particularly) was responsive to us. We particularly appreciate the care you all showed in cleaning up at the end of the day. All subs reflected the values of DeBoer Building.",
            'client_id' => Client::firstOrCreate([
                'name' => 'Paul K.'
            ])->id
        ]);

        Testimonial::create([
            'content'   => "Ben was very straightforward and made me feel at ease/like I was being treated fairly. All work was exceptional. DeBoer guys were awesome, very kind and easy going, and accomododating with our animals. DeBoer is phenomenal, we love everything!",
            'client_id' => Client::firstOrCreate([
                'name' => 'Meghan M.'
            ])->id
        ]);

        Testimonial::create([
            'content'   => "DeBoer Building had transparency in costs, high quality work, great communication, willingness to find solutions within our budget. The whole team was great. My husband, Matt, reached out to Dave a lot with questions & he was always responsive & helpful! Thanks for another great remodel!",
            'client_id' => Client::firstOrCreate([
                'name' => 'Matt & Caitlin C.'
            ])->id
        ]);

        Testimonial::create([
            'content'   => "We really appreciate the great work and couldn't be more please with how it (the kitchen) turned out!",
            'client_id' => Client::firstOrCreate([
                'name' => 'Tim & Annie B.'
            ])->id
        ]);

        Testimonial::create([
            'content'   => "We chose DeBoer Building because of prior experience - we trust your team to do the work, timely and completely. You do great work! DeBoer Building is our first call for any new project!",
            'client_id' => Client::firstOrCreate([
                'name' => 'Allison M.'
            ])->id
        ]);

        Testimonial::create([
            'content'   => "Thanks for a great job! We really like our new bathroom & reveice compliments on it from visitors.",
            'client_id' => Client::firstOrCreate([
                'name' => 'Bob & Linda P.'
            ])->id
        ]);

        Testimonial::create([
            'content'   => "DeBoer Building had fair pricing, everything was explained well. We had great selection of products and sales people that worked with us to find the best products for us within out budget. All employees were great. Good and timely communication. They listened to our wants & needs.",
            'client_id' => Client::firstOrCreate([
                'name' => 'Nancy B.'
            ])->id
        ]);

        Testimonial::create([
            'content'   => "Everyone was great! Responsive and detailed information provided. I wouldn't hesitate to hire DeBoer Building again and recommend to others. Thank you!",
            'client_id' => Client::firstOrCreate([
                'name' => 'Maria A.'
            ])->id
        ]);

        Testimonial::create([
            'content'   => "We used DeBoer Building because we just clicked during the initial visit. We knew that the project would be exactly what I wanted. The finished bathroom was exactly as we imagined.",
            'client_id' => Client::firstOrCreate([
                'name' => 'Heather L.'
            ])->id
        ]);

        Testimonial::create([
            'content'   => "DeBoer came highly recommended by Godwin Plumbing and Ben made a great first impression. The list of refrences was very impressive. Dave was very responsive & helpful. I really appreciated the 'can do' attitude to all our questions. We had one issue where the demolition created too much dust for our furnace. The issue was addressed right away.",
            'client_id' => Client::firstOrCreate([
                'name' => 'Jim B.'
            ])->id
        ]);

        Testimonial::create([
            'content'   => "I found DeBoer Building from a recommendation from my neighbor. DeBoer had good communication from staff during the project & I appreciated the follow-up calls from Ben.",
            'client_id' => Client::firstOrCreate([
                'name' => 'Nancy K.'
            ])->id
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
