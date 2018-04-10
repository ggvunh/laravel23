<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryControllerTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testListAllCategory()
    {
        $response = $this->get('/categories');
        $response->assertStatus(200);
        $content = json_decode($response->getContent());
        $this->assertEquals(2, count($content));
    }

    public function testGetCategoryNotFound()
    {
        $response = $this->get('/categories/100');
        $response->assertStatus(400);
    }

    public function testFindCategorySuccess()
    {
        $response = $this->get('/categories/2');
        $response->assertStatus(200);
        $content = json_decode($response->getContent());
        $this->assertEquals(2, $content->id);
        $this->assertEquals('Apple', $content->name);
    }

    public function testCreateCategory()
    {
        $response = $this->post('/categories', ['name' => 'Nokia']);
        $response->assertStatus(200);
        $content = json_decode($response->getContent());
        $this->assertEquals('Nokia', $content->name);
        $this->assertDatabaseHas('categories', ['name' => 'Nokia']);
    }

    public function testDeleteCategoryFail()
    {
        $response = $this->delete('/categories/100');
        $response->assertStatus(404);
    }

    public function testDeleteCategorySuccess()
    {
        $response = $this->delete('/categories/2');
        $response->assertStatus(200);
        $this->assertDatabaseMissing('categories', ['id' => 2]);
    }

    public function testUpdateFail()
    {
        $response = $this->patch('/categories/100');
        $response->assertStatus(404);
    }

    public function testUpdateCategorySuccess()
    {
        $response = $this->patch('/categories/2', ['name' => 'Apple2']);
        $response->assertStatus(200);
        $content = json_decode($response->getContent());
        $this->assertEquals('Apple2', $content->name);

        $this->assertDatabaseHas('categories', ['name' => 'Apple2', 'id' => 2]);
        $this->assertDatabaseMissing('categories', ['name' => 'Apple1', 'id' => 2]);
    }
}
