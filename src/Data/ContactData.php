<?php

namespace App\Data;

use Symfony\Component\Validator\Constraints as Assert;

class ContactData
{
    #[Assert\NotBlank]
    public ?string $email;

    public ?string $message;
}
