<?php

namespace Tests\Feature\Content;

use Database\Seeders\AdminsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CreateContentFeatureTest extends TestCase
{
    // use RefreshDatabase; // clear all data in database 

    public $token = '';

    protected function setUp(): void
    {

        parent::setUp();

        $data = [
            'email' => 'nguyenvanmanh2001it1@gmail.com',
            'password' => '123456',
        ];
        $response = $this->post('api/user/login', $data);
        $this->token = $response->json('data.access_token');
    }

    private function getAuthorizationHeaders()
    {
        return [
            'Authorization' => 'Bearer ' . $this->token,
        ];
    }
    
    public function testCreateContentTextSuccessful()
    {
        $data = [
            "content_type" => "text",
            "content_data" => [
                "type" => "text",
                "text" => "Hello, world"
            ]
        ];
        $response = $this->post('api/content/add', $data, $this->getAuthorizationHeaders());
        $response->assertStatus(200);
        $response->assertJson([
            "messages" => [
                "Add new content successfully !"
            ],
            "status" => 200
        ]);
    }

    public function testCreateContentImageSuccessful()
    {
        // Storage::fake('thumbnails');
        $thumbnail = UploadedFile::fake()->image('thumbnail.jpg');
        $data = [
            "content_type" => "image",
            "image_content" => $thumbnail
        ];
        $response = $this->post('api/content/add', $data, $this->getAuthorizationHeaders());
        $response->assertStatus(200);
        $response->assertJson([
            "messages" => [
                "Add new content successfully !"
            ],
            "status" => 200
        ]);
    }

    public function test_orders_can_be_created(): void
    {
        $this->seed(AdminsSeeder::class);
    }
}
