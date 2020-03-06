<?php

namespace App\Security;

use  Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

class Sha1PasswordEncoder implements PasswordEncoderInterface
{
    public function encodePassword(string $raw, ?string $salt = null): string
    {
        return sha1($raw, true);
    }

    public function isPasswordValid(string $encoded, string $raw, ?string $salt): bool
    {
        return $encoded = $this->encodePassword($raw);
    }

    public function needsRehash(string $encoded): bool
    {
        return false;
    }
}