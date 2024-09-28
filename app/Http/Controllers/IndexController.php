<?php

namespace App\Http\Controllers;


use App\Services\FeedService;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function __invoke():View
    {
        return view('index',[
            'feeds' => (new FeedService())->getFeed()
        ]);
    }
}
