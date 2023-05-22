<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Moderator;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModeratorTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test moderator list page.
     *
     * @return void
     */
    public function testModeratorsListPage()
    {
        $response = $this->get('/moderators');
        $response->assertStatus(200);
    }

    /**
     * Test moderator create page.
     *
     * @return void
     */
    public function testModeratorCreate()
    {
        $response = $this->get('/moderators/create');
        $response->assertStatus(200);
    }

    /**
     * Test moderator view page.
     *
     * @return void
     */
    public function testModeratorView()
    {
        $moderator = Moderator::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com'
        ]);
        $response = $this->get('/moderators/' . $moderator->id);
        $response->assertStatus(200);
    }

    /**
     * Test moderator model storage.
     *
     * @return void
     */
    public function testModeratorStorage()
    {
        $moderatorData = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com'
        ];
        $moderator = Moderator::create($moderatorData);
        $this->assertDatabaseHas('moderators', [
            'id' => $moderator->id,
            'name' => $moderatorData['name'],
            'email' => $moderatorData['email'],
        ]);
    }

    /**
     * Test moderator model update.
     *
     * @return void
     */
    public function testModeratorUpdate()
    {
        $moderator = Moderator::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com'
        ]);
        $updatedName = 'Jane Doe';
        $moderator->name = $updatedName;
        $moderator->save();
        $this->assertDatabaseHas('moderators', [
            'id' => $moderator->id,
            'name' => $updatedName,
            'email' => $moderator->email,
        ]);
    }

    /**
     * Test moderator model deletion.
     *
     * @return void
     */
    public function testModeratorDeletion()
    {
        $moderator = Moderator::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com'
        ]);
        $moderator->delete();
        $this->assertDatabaseMissing('moderators', [
            'id' => $moderator->id,
        ]);
    }
}
