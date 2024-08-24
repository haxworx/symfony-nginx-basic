<?php

declare(strict_types=1);

/*
 * (c) Alastair Poole <mail@alastairpoole.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (!file_exists(__DIR__.'/src')) {
    exit(0);
}

$fileHeaderComment = <<<'EOF'
    (c) Alastair Poole <mail@alastairpoole.com>
    For the full copyright and license information, please view the LICENSE
    file that was distributed with this source code.
    EOF;

$config = new PhpCsFixer\Config();

return $config
    ->setRules([
        '@PER-CS' => true,
        '@DoctrineAnnotation' => true,
        '@PSR1' => true,
        '@PSR12' => true,
        '@PSR2' => true,
        '@PhpCsFixer' => true,
        '@Symfony' => true,
        'concat_space' => false,
        'protected_to_private' => false,
        'native_constant_invocation' => ['strict' => false],
        'no_superfluous_phpdoc_tags' => ['remove_inheritdoc' => true],
        'header_comment' => ['header' => $fileHeaderComment],
        'modernize_strpos' => true,
        'get_class_to_class_keyword' => true,
        'declare_strict_types' => true,
        '@PHP82Migration' => true,
    ])
    ->setRiskyAllowed(true)
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__.'/src')
            ->append([__FILE__])
    )
    ->setCacheFile('.php-cs-fixer.cache')
;
