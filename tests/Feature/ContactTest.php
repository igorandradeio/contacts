<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactTest extends TestCase
{

    use RefreshDatabase;

    public function test_validations_create_contact()
    {

        $user = User::factory()->make();

        $response = $this->actingAs($user)
            ->postJson('/contact', [
                'name' => 'Igo',
                'contact' => '1568755874',
                'email' => 'igor@test.com',
            ]);

        $response->assertStatus(422);
    }

    public function test_validations_update_contact()
    {
        $user = User::factory()->make();
        $contact = Contact::factory()->create();

        $response = $this->actingAs($user)
            ->putJson("/contact/update/{$contact->id}", [
                'name' => 'Igo',
                'contact' => '1568755874',
                'email' => 'igor@test.com',
            ]);

        $response->assertStatus(422);
    }

    public function test_validations_post_user_unauthorized_contact()
    {

        $response = $this->postJson('/contact', [
            'name' => 'Igor Andrade',
            'contact' => '1568755874',
            'email' => 'igor@test.com',
        ]);

        $response->assertStatus(401);
    }

    public function test_validations_update_user_unauthorized_contact()
    {

        $contact = Contact::factory()->create();

        $response = $this->putJson("/contact/update/{$contact->id}", [

            'name' => 'Igor Andrade',
            'contact' => '1568755874',
            'email' => 'igor@test.com',
        ]);

        $response->assertStatus(401);
    }
}
