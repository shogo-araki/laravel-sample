<?php

namespace App\DataProvider;

use stdClass;

interface UserTokenProviderInterface{
    public function retriveUserByToken(string $token):?stdClass;
}