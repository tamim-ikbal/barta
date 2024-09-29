<?php

namespace App\Services;

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\GithubFlavoredMarkdownConverter;

class MarkdownServices
{
    public static function render(string $string, array $options = [], array $extensions = []): string
    {
        $converter = new CommonMarkConverter($options);

        $environment = $converter->getEnvironment();

        foreach ($extensions as $extension) {
            $environment->addExtension($extension);
        }

        return (string) $converter->convert($string);
    }
}
