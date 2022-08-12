<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Entities\Todo;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TodoController
{
    public function __construct(
        private readonly EntityManagerInterface $em,
    ) {
    }

    public function index(): View
    {
        return view('todo.index', [
            'list' => $this->em->getRepository(Todo::class)->findAll(),
        ]);
    }

    public function new(): View
    {
        return view('todo.new');
    }

    public function create(Request $request): RedirectResponse
    {
        $todo = new Todo();
        $todo->title = $request->get('title');
        $todo->description = $request->get('title');

        $this->em->persist($todo);
        $this->em->flush();

        return new RedirectResponse(route('todo.index'));
    }
}
