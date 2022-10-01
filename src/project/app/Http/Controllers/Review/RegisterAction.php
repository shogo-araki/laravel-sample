<?php

namespace App\Http\Controllers\Review;

use App\DataProvider\RegisterReviewInterface;
use App\Http\Controllers\Controller;
use App\DataProvider\RegisterReviewProviderInterface;
use App\Events\ReviewRegistered;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

class RegisterAction extends Controller
{
    private $provider;
    private $dispatcher;

    public function __construct(
        RegisterReviewProviderInterface $provider,
        Dispatcher $dispatcher
    ) {
        $this->provider = $provider;
        $this->dispatcher = $dispatcher;
    }

    public function __invoke(Request $request): Response
    {
        $crated = Carbon::now()->toDateTimeString();
        $id = $this->provider->save(
            $request->get('title'),
            $request->get('content'),
            $request->get('user_id', 1),
            $crated,
            $request->get('tags'),
        );

        $this->dispatcher->dispatch(
            new ReviewRegistered(
                $id,
                $request->get('title'),
                $request->get('content'),
                $request->get('user_id', 1),
                $crated,
                $request->get('tags'),
            )
        );

        return new Response('', Response::HTTP_OK);
    }
}
