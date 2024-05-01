<?php


namespace App\Services;
use Cloudstudio\Ollama\Facades\Ollama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OllamaService {


    public function ask(Request $request) {


        $response = Ollama::agent($request->role_description)
                            ->prompt($request->question.' '.'Respond using JSON')
                            ->model(config('ollama-laravel.model'))
                            ->options(['temperature' => floatval(config('ollama-laravel.temprature'))])
                            ->format(config('ollama-laravel.format'), 'json')
                            ->stream(false)
                            ->ask();

        return response()->json($response);

    }





}