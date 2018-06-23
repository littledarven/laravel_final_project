<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Course;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateCourse()
    {
        Course::create([
            'name' => 'Educação Fisíca',
            'total_time' => 50,

        ]);
        $this->assertDatabaseHas('courses',['name'=>'Educação Fisíca']);
    }
}
