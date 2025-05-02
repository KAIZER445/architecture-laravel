<?php

namespace App\Http\Controllers;

use App\Http\Resources\TestResource;
use App\Services\TestService;
use Illuminate\Http\JsonResponse;

class Test extends Controller
{
    protected $testService;

    public function __construct(TestService $testService)
    {
        $this->testService = $testService;
    }

    public function index(): JsonResponse
    {
        $tests = $this->testService->getAll();
        return TestResource::collection($tests)->response();
    }
}