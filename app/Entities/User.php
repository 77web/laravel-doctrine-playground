<?php

declare(strict_types=1);

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;
use Illuminate\Contracts\Auth\Authenticatable;

#[ORM\Entity]
class User implements Authenticatable
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    public int $id;

    #[ORM\Column(type: 'string', length: 255)]
    public ?string $email = null;

    #[ORM\Column(type: 'string', length: 255)]
    public ?string $password = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    public ?string $rememberToken = null;

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->rememberToken;
    }

    public function setRememberToken($value)
    {
        $this->rememberToken = (string) $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
