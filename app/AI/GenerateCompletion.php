<?php

namespace App\AI;

use Prism\Prism\Prism;
use Prism\Prism\Enums\Provider;
use Prism\Prism\ValueObjects\ProviderTool;

class GenerateCompletion
{
    public function generate($prompt)
    {
        try
        {
            $response = Prism::text()
            ->using(Provider::Gemini, 'gemini-2.0-flash')
            ->withPrompt($prompt)
            ->withProviderTools([
                    new ProviderTool('google_search')
                ])
            ->asText();
        }
        catch (\Exception $e)
        {
            return 'Error: ' . $e->getMessage();
        }
    }
}