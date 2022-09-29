<?php

namespace App\DataProvider;

use Illuminate\Database\DatabaseManager;
use stdClass;

final class UserToken implements UserTokenProviderInterface
{
    private $manager;
    private $table = 'user_tokens';

    public function __construct(DatabaseManager $manager)
    {
        $this->manager = $manager;
    }

    public function retriveUserByToken(string $token): ?stdClass
    {
        return $this->manager->connection()->table($this->manager)
            ->join('users', 'users.id', '=', 'user_tokens.user_id')
            ->where('api_token', $token)
            ->first(['user_id', 'api_token', 'name', 'email']);
    }
}
