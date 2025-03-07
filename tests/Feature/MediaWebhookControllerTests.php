<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MediaWebhookControllerTests extends TestCase
{
    #[Test]
    public function canUploadFiles()
    {
        $response = $this->post('/api/webhooks/media', [
            'file' => UploadedFile::fake()->image('avatar.jpg'),
        ]);

        $response->assertStatus(201);


        $this->assertDatabaseHas('media', [
            'name' => $response->json('name'),
            'ext' => 'jpg',
            'type' => 'image/jpeg',
        ]);
    }

}
