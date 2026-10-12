<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_the_singular_student_url_redirects_to_the_student_list(): void
    {
        $response = $this->get('/student');

        $response->assertRedirect('/students');
    }

    public function test_a_student_can_be_created(): void
    {
        $response = $this->post('/students', [
            'name' => 'Alex Student',
            'email' => 'alex@example.com',
            'course' => 'Information Technology',
        ]);

        $response->assertRedirect(route('students.index'));
        $this->assertDatabaseHas('students', [
            'name' => 'Alex Student',
            'email' => 'alex@example.com',
            'course' => 'Information Technology',
        ]);
    }
}
