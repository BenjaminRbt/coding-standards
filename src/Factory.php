<?php

declare(strict_types=1);

namespace CodingStandards;

use PhpCsFixer;

class Factory
{
    public static function createPhpCsFixerConfig(string $rootDirectory, array $options = []): PhpCsFixer\Config
    {
        $defaults = [
            'dirs' => ['lib', 'vendor', 'var'],
        ];
        $config = array_merge_recursive($defaults, $options);

        $finder = (new PhpCsFixer\Finder())
            ->exclude($config['dirs'])
            ->in($rootDirectory);

        return (new PhpCsFixer\Config())
            ->setUsingCache(false)
            ->setRiskyAllowed(true)
            ->setRules([
                '@PSR12' => true,
                '@Symfony' => true,
                '@Symfony:risky' => true,
                'single_line_throw' => false,
            ])
            ->setFinder($finder);
    }
}
