<?php

namespace Tests\Feature;

use App\Contact;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function client_can_contact_us_by_email()
    {
        $contact = factory(Contact::class)->make();
        $response = $this->postJson(route('contact.store'), $contact->toArray());
        $response->assertStatus(201);
        $this->assertDatabaseHas('contacts', [
            'email' => $contact->email,
            'text' => $contact->text,
        ]);
    }

    /** @test */
    public function email_is_required_and_should_be_valid_to_contact()
    {
        $contact = factory(Contact::class)->make(['email' => null]);
        $response = $this->postJson(route('contact.store'), $contact->toArray());
        $response->assertStatus(422);
        $response->assertJsonValidationErrors('email');

        $contact = factory(Contact::class)->make(['email' => 'something']);
        $response = $this->postJson(route('contact.store'), $contact->toArray());
        $response->assertStatus(422);
        $response->assertJsonValidationErrors('email');
    }

    /** @test */
    public function text_is_required_to_contact()
    {
        $contact = factory(Contact::class)->make(['text' => null]);
        $response = $this->postJson(route('contact.store'), $contact->toArray());
        $response->assertStatus(422);
        $response->assertJsonValidationErrors('text');
    }
}
