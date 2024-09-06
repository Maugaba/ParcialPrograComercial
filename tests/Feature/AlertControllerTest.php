<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Alert;
use App\Models\Project;
use Carbon\Carbon;
use Exception;

class AlertControllerTest extends TestCase
{

    public function test_index()
    {
        try {
            $project = Project::create([
                'name' => 'Test Project',
                'start_date' => now(),
                'end_date' => now()->addDays(5),
                'completion_percentage' => 50,
            ]);

            Alert::create(['project_id' => $project->id]);

            $response = $this->get('/api/alerts');
            $response->assertStatus(200)
                     ->assertJsonFragment([
                         'project_id' => $project->id
                     ]);
        } catch (Exception $e) {
            $this->fail('Test failed with exception: ' . $e->getMessage());
        }
    }

    public function test_store()
    {
        try {
            $project = Project::create([
                'name' => 'Test Project',
                'start_date' => now(),
                'end_date' => now()->addDays(5),
                'completion_percentage' => 50,
            ]);

            $response = $this->post('/api/alerts', [
                'project_id' => $project->id
            ]);

            $response->assertStatus(201)
                     ->assertJson([
                         'project_id' => $project->id
                     ]);

            $this->assertDatabaseHas('alerts', [
                'project_id' => $project->id
            ]);
        } catch (Exception $e) {
            $this->fail('Test failed with exception: ' . $e->getMessage());
        }
    }

    public function test_show()
    {
        try {
            $project = Project::create([
                'name' => 'Test Project',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(5),
                'completion_percentage' => 50,
            ]);

            $alert = Alert::create(['project_id' => $project->id]);

            $response = $this->get('/api/alerts/' . $alert->id);
            $response->assertStatus(200)
                     ->assertJson([
                         'project_id' => $project->id
                     ]);
        } catch (Exception $e) {
            $this->fail('Test failed with exception: ' . $e->getMessage());
        }
    }

    public function test_update()
    {
        try {
            $project = Project::create([
                'name' => 'Test Project',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(5),
                'completion_percentage' => 50,
            ]);

            $alert = Alert::create(['project_id' => $project->id]);

            $response = $this->put('/api/alerts/' . $alert->id, [
                'project_id' => $project->id
            ]);

            $response->assertStatus(200)
                     ->assertJson([
                         'project_id' => $project->id
                     ]);
        } catch (Exception $e) {
            $this->fail('Test failed with exception: ' . $e->getMessage());
        }
    }

    public function test_destroy()
    {
        try {
            $project = Project::create([
                'name' => 'Test Project',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(5),
                'completion_percentage' => 50,
            ]);

            $alert = Alert::create(['project_id' => $project->id]);

            $response = $this->delete('/api/alerts/' . $alert->id);
            $response->assertStatus(204);

            $this->assertDatabaseMissing('alerts', [
                'id' => $alert->id
            ]);
        } catch (Exception $e) {
            $this->fail('Test failed with exception: ' . $e->getMessage());
        }
    }
}