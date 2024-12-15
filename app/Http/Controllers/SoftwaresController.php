<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

    public function testGithubCurl()
    {
        $tags = Http::withToken(env('GITHUB_ACCESS_TOKEN'))
            ->get('https://api.github.com/repos/Drillan767/orchestral-range-tool/tags');

        $latestTag = $tags->json()[0]['name'];

        /* $latestJsonFile = Http::withToken(env('GITHUB_ACCESS_TOKEN'))
            ->get('https://api.github.com/repos/Drillan767/orchestral-range-tool/releases/latest');
 */
        $jsonFileContent = Http::withToken(env('GITHUB_ACCESS_TOKEN'))
            ->withHeaders(['Accept' => 'application/octet-stream'])
            ->get('https://api.github.com/repos/Drillan767/orchestral-range-tool/releases/assets/213428528');

        return [
            'latests_tag' => $latestTag,
            'json_test' => $jsonFileContent->body(),
        ];

        /* curl -L \
  -H "Accept: application/vnd.github+json" \
  -H "Authorization: Bearer env('GITHUB_ACCESS_TOKEN')" \
  -H "X-GitHub-Api-Version: 2022-11-28" \
  https://github.com/Drillan767/orchestral-range-tool/releases/download/app-v0.2.2/latest.json */
    }
}
