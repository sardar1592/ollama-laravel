<?php

namespace App\Http\Controllers;

use App\Services\OllamaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AskController extends Controller
{

    private OllamaService $OllamaService;

    public function __construct(OllamaService $OllamaService)
    {
        $this->OllamaService = $OllamaService;
    }


    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        Log::info($request->all());

        $request->validate([

            'question' => 'required|min:3|max:500',
            'role_description' => 'required'

        ]);

        $response = $this->OllamaService->ask($request);

        Log::info($response);

        return $response;


    }
}
