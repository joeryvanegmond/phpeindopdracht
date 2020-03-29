<?php

namespace Tests\Unit;

use App\Course;
use App\Http\Controllers\TeacherController;
use App\Teacher;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function Store_In_TeacherController_Works()
    {
        Event::fake();
        $request = Request::create('/store', 'POST', [
            'name' => 'ger',
            'lastname' => 'saris',
        ]);

        $controller = new TeacherController();
        $response = $controller->store($request);
        $this->assertEquals(302, $response->getStatusCode());
    }
}
