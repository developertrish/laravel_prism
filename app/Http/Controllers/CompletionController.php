<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AI\GenerateCompletion;

class CompletionController extends Controller
{
    public function generateCompletion(Request $request)
    {
        $prompt = $request->input('prompt');

        $completionGenerator = new GenerateCompletion();

        try
        {
            $response = $completionGenerator->generate($prompt);

            return response()->json(['response' => $response]);
        }
        catch (\Exception $e)
        {
            return response()->json(['error' => 'Error: ' . $e->getMessage()], 500);
        }
    }
}
