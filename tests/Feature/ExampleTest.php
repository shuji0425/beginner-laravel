<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * トップページが表示できることを確認します。
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Todo リスト');
    }

    /**
     * Todo を新規作成できることを確認します。
     *
     * @return void
     */
    public function test_a_todo_can_be_created(): void
    {
        $response = $this->post('/todos', [
            'title' => 'テスト Todo',
            'memo' => 'Feature テストから作成',
            'due_date' => '2026-06-03',
        ]);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('todos', [
            'title' => 'テスト Todo',
            'is_done' => false,
        ]);
    }
}
