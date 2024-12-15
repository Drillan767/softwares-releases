<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoftwaresController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'This API handles Joseph Levarato\'s automatic releases.']);
    }

    public function orchestrationTools(string $target, string $current_version)
    {
        \Log::info(compact('target', 'current_version'));
        return response()->json([
            'version' => '1.0.0',
            'notes' => 'This is a test',
            'pub_date' => '2024-12-01',
            'platforms' => [
                'linux-x86_64' => [
                    'signature' => '',
                    'url' => '',
                ],
                'windows-x86_64' => [
                    'signature' => '',
                    'url' => '',
                ],
                'darwin-x86_64' => [
                    'signature' => '',
                    'url' => '',
                ],
            ]
        ]);
    }
}
