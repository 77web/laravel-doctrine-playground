<?php

declare(strict_types=1);

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Todo
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    public int $id;

    #[ORM\Column(type: 'string', length: 255)]
    public ?string $title = null;

    #[ORM\Column(type: 'text', nullable: true)]
    public ?string $description = null;

    #[ORM\Column(type: 'boolean')]
    public bool $done = false;
}
