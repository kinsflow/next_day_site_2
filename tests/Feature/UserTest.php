<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testUserAuthentication()
    {
        $user_cred_instance = new Request([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);
        $response = $this->post('/login', [$user_cred_instance]);

        $response->assertStatus(302);
    }

    public function testStudentAccountCreation()
    {
        $applicant_details = new Request([
            'first_name' => 'kaybaba',
            'last_name' => 'kay-baba',
            'email' => 'kay@kay.com',
            'role_id' => 2,
            'password' => bcrypt('password')
        ]);

        $response = $this->post('/create-account', [$applicant_details]);
        $response->assertStatus(302);
    }

    public function testStudentApplication()
    {
        $response = $this->post('/apply/2');

        $response->assertStatus(302);
    }
}
