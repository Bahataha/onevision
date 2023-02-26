<?php

namespace App\Request;

use Illuminate\Support\Facades\Http;

class ApiRequest
{
    public function request(string $uri): mixed
    {
        return Http::get(config('dummy.url') . $uri)->json();
    }

    public function update(string $string, $data)
    {
        return Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->put(config('dummy.url') . $string, $data);
    }
}
