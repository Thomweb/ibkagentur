<?php

declare(strict_types=1);

use TYPO3\CMS\Core\MetaTag\MetaTagManagerRegistry;
use TYPO3\CMS\Core\Utility\GeneralUtility;

defined('TYPO3') or die();

$ibkTagManager = GeneralUtility::makeInstance(MetaTagManagerRegistry::class)->getManagerForProperty('viewport');
$ibkTagManager->removeProperty('viewport');
$ibkTagManager->addProperty('viewport', 'width=device-width, initial-scale=1.0, user-scalable=yes');

$ibkTagManager = GeneralUtility::makeInstance(MetaTagManagerRegistry::class)->getManagerForProperty('og:type');
$ibkTagManager->removeProperty('og:type');
$ibkTagManager->addProperty('og:type', 'website');

$ibkTagManager = GeneralUtility::makeInstance(MetaTagManagerRegistry::class)->getManagerForProperty('twitter:creator');
$ibkTagManager->removeProperty('twitter:creator');
$ibkTagManager->addProperty('twitter:creator', '@thomweb');

$ibkTagManager = GeneralUtility::makeInstance(MetaTagManagerRegistry::class)->getManagerForProperty('twitter:site');
$ibkTagManager->removeProperty('twitter:site');
$ibkTagManager->addProperty('twitter:site', '@thomweb');

$ibkTagManager = GeneralUtility::makeInstance(MetaTagManagerRegistry::class)->getManagerForProperty('profile:first_name');
$ibkTagManager->removeProperty('profile:first_name');
$ibkTagManager->addProperty('profile:first_name', 'Thomas');

$ibkTagManager = GeneralUtility::makeInstance(MetaTagManagerRegistry::class)->getManagerForProperty('profile:last_name');
$ibkTagManager->removeProperty('profile:last_name');
$ibkTagManager->addProperty('profile:last_name', 'Berscheid');

// Add Google META Tags
$ibkTagManager = GeneralUtility::makeInstance(MetaTagManagerRegistry::class)->getManagerForProperty('google-site-verification');
$ibkTagManager->addProperty('google-site-verification', 'EYMrUD_U1heQDTvQu6S4jGyWT8VQ1bDfV55honDGQHQ');


