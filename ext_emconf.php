<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "ibkagentur"
 *
 * Auto generated by Extension Builder 2018-07-07
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title' => 'IBK Provider Extension (Site Package)',
    'description' => 'Konfiguration und Templates für Webseite der Internetagentur Irma Berscheid-Kimeridze Köln',
    'category' => 'plugin',
    'author' => 'Thomas Berscheid',
    'author_email' => 'thom@thomweb.de',
    'state' => 'stable',
    'internal' => '',
    'uploadfolder' => '0',
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '12.4.141',
    'constraints' => [
        'depends' => [
            'php' => '7.4.0-8.9.99',
            'typo3' => '11.5.11-12.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => ['Ibk\\Ibkagentur\\' => 'Classes'],
        'classmap' => ['Classes'],
    ]

];
