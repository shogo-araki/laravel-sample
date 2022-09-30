<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\Gate;
use Illuminate\Auth\AuthManager;

final class RetrieveAction extends Controller
{
    private $gate;
    private $authManager;

    // public function __construct(Gate $gate)
    // {
    //     $this->gate = $gate;
    // }

    public function __construct(AuthManager $manager)
    {
        $this->authManager = $manager;
    }

    public function __invoke(string $id)
    {
        // if ($this->gate->allows('user-access', $id)) {
        //     // 例えば/user/{id}にアクセスした場合にログインユーザーとアクセスしたページのIDが同じであれば処理を認可できる
        // }

        $content = Content::find((int)$id);
        $user = $this->authManager->guard()->user();
        if ($user->can('update', '$content')) {
        }
    }
}
