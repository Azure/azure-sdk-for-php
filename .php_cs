<?php

return Symfony\CS\Config\Config::create()
    ->fixers([
        'psr2',
    ])
    ->finder(
        Symfony\CS\Finder\DefaultFinder::create()
            ->in(__DIR__.'/WindowsAzure')
    )
;
