<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Entities\Todo;
use App\Http\Middleware\VerifyCsrfToken;
use Doctrine\ORM\EntityManagerInterface;
use Tests\TestCase;

class TodoControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(VerifyCsrfToken::class);
        @unlink(config('database.connections.sqlite.database'));
        $this->artisan('doctrine:schema:create');
    }

    public function test_todoIndex()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_todoNew()
    {
        $response = $this->get('/new');

        $response->assertStatus(200);
    }

    public function test_todoCreate()
    {
        $response = $this->post('/create', [
            'title' => 'aaa',
            'description' => 'bbb',
        ]);

        $response->assertStatus(302);

        /** @var EntityManagerInterface $em */
        $em = $this->app->get(EntityManagerInterface::class);
        $em->clear();
        $savedTodo = $em->find(Todo::class, 1);
        $this->assertNotNull($savedTodo);
        $this->assertEquals('aaa', $savedTodo->title);
        $this->assertFalse($savedTodo->done);
    }
}
