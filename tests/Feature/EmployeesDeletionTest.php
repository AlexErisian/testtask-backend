<?php

namespace Tests\Feature;

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class EmployeesDeletionTest extends TestCase
{
    private $sameId = 5;

    public function testDeletesSuccessfully()
    {
        Artisan::call('db:seed --class=EmployeeSeeder');

        $employee = Employee::orderBy('id', 'DESC')->first();

        $this->sameId = $employee->id;

        $this->json('DELETE',
            route('api.employees.destroy', [$employee->id]))
            ->assertStatus(200)
            ->assertJson($employee->toArray());
    }

    /**
     * @depends testDeletesSuccessfully
     */
    public function testNotFoundDeleted()
    {
        $this->json('DELETE',
            route('api.employees.destroy', [$this->sameId]))
            ->assertStatus(404);
    }
}
