<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersListsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     * We have to make sure that if any user tries to fetch the Users List page
     * he/she will be redirected to the login page.
     * @return void
     */
    public function onlyLoggedInUsersCanSeeTheUsersList()
    {
        $response = $this->get('/users/list')->assertRedirect('/login');
    }

    /**
     * @test
     * We have to make sure that if a user is logged in (authenticated) will see the Users List page
     * @return void
     */
    public function loggedInUsersCanSeeTheUsersList()
    {
        $this->actingAs(factory(User::class)->create());
        $response = $this->get('/users/list')->assertOk();
    }
}
