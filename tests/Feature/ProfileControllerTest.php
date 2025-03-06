<?php

// tests/Feature/ProfileControllerTest.php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Profile; // Import the Profile model
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that the user can access the profile index page and sees their profiles.
     *
     * @return void
     */
    public function test_user_can_access_profile_page()
    {
        // Create a user
        $user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        // Create a profile for the user (to ensure there's something to display)
        Profile::factory()->create(['user_id' => $user->id]);

        // Visit the profile index page
        $response = $this->get(route('profiles.index'));

        // Assert that the response is successful
        $response->assertStatus(200);

        // Assert that the user's profile name is displayed on the page (adjust as needed)
        $response->assertSee($user->name); //checking if the user's name is displayed on the page

        // Assert that the profile information is displayed (example, adjust based on your actual view)
        $response->assertSee('Vos Profils'); // Example:  Assert that the page title is present
    }

    /**
     * Test that the homepage is accessible.
     *
     * @return void
     */
    public function test_example()
    {
        // Visit the homepage
        $response = $this->get('/');

        // Assert that the response is successful
        $response->assertStatus(200);
    }
}


//php artisan make:test ProfileControllerTest
//php artisan test tests/Feature/ProfileControllerTest.php