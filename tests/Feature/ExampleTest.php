<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Media;
use App\Models\Employee;
use App\Models\FormSubmission;
use PHPUnit\Framework\Attributes\Test;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** upload to s3 */
    #[Test]
    public function upload_to_s_3()
    {
        \Config::set('database.connections.temp', [
            'driver' => 'mysql',
            'host' => '192.168.0.5',
            'port' => '33071',
            'database' => 'html',
            'username' => 'admin',
            'password' => 'Platahalcon13!!',
        ]);
//        https://deboerbuildingcom-main-onrn89.laravel.cloud/curator/media/260dba1c-6ac5-4d36-b516-9cc7cedb47d8.jpg


        $disk =  \Storage::disk('s3');

        dd(
            $disk->url('media/260dba1c-6ac5-4d36-b516-9cc7cedb47d8.jpg'),
            $disk->allFiles(),
        );


        Employee::on('temp')->get()->each(function (Employee $e) use ($disk) {
            dump("Uploading: {$e->image}");

            dd(
                \Storage::disk('public')->get($e->image)
            );

            if ($path = $e->image) {
                $data = \Storage::disk('public')->get($path);
                $disk->put(
                    $path,
                    $data
                );
            }
        });

        dd('done');

        dd($disk->directories());

        dd($disk->get("media/959b3057-a9d3-496d-a093-0370ab91cf13.jpg"));

        dump("Deleting: media directory");
        $disk->deleteDirectory('media');

        Media::on('temp')->get()->each(function ($media) use ($disk) {
            dump("Uploading: {$media->path}");

            $disk->put(
                $media->path,
                \Storage::disk($media->disk)->get($media->path),
            );

            dump("done.");
        });



    }


    /** form-submissions */
    #[Test]
    public function form_submissions()
    {
//        $http =  \Http::();

        $faker = \Faker\Factory::create();
        FormSubmission::create([
            'form' => 'contact',
            'data' => [
                'name' => $faker->name(),
                'email' => $faker->email(),
                'message' => $faker->text(100),
            ],
        ]);

//        $http->assertSent(function ($request) {
//            dd($request);
//
//        });
    }


}
