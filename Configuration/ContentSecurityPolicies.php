<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Security\ContentSecurityPolicy\Directive;
use TYPO3\CMS\Core\Security\ContentSecurityPolicy\Mutation;
use TYPO3\CMS\Core\Security\ContentSecurityPolicy\MutationCollection;
use TYPO3\CMS\Core\Security\ContentSecurityPolicy\MutationMode;
use TYPO3\CMS\Core\Security\ContentSecurityPolicy\Scope;
use TYPO3\CMS\Core\Security\ContentSecurityPolicy\SourceKeyword;
use TYPO3\CMS\Core\Security\ContentSecurityPolicy\SourceScheme;
use TYPO3\CMS\Core\Security\ContentSecurityPolicy\UriValue;
use TYPO3\CMS\Core\Type\Map;

return Map::fromEntries([
    Scope::frontend(),

    new MutationCollection(
        // Einstellungen für gesamte Sourcen
        new Mutation(
            MutationMode::Set,
            Directive::DefaultSrc,
            SourceKeyword::self
        ),

        // Optionen für Bilder
        new Mutation(
            MutationMode::Extend,
            Directive::ImgSrc,
            SourceScheme::data,
            new UriValue('https://test.agentur-ibk.de')
        ),
        new Mutation(
            MutationMode::Extend,
            Directive::ImgSrc,
            SourceScheme::data,
            new UriValue('https://www.agentur-ibk.de')
        ),
        new Mutation(
            MutationMode::Extend,
            Directive::ImgSrc,
            SourceScheme::data,
            new UriValue('*.adsimple.at')
        ),
        new Mutation(
            MutationMode::Extend,
            Directive::ImgSrc,
            SourceScheme::data,
            new UriValue('https://*.googleapis.com')
        ),
        new Mutation(
            MutationMode::Extend,
            Directive::ImgSrc,
            SourceScheme::data,
            new UriValue('https://*.gstatic.com')
        ),
        new Mutation(
            MutationMode::Extend,
            Directive::ImgSrc,
            SourceScheme::data,
            new UriValue('*.google.com')
        ),
        new Mutation(
            MutationMode::Extend,
            Directive::ImgSrc,
            SourceScheme::data,
            new UriValue('*.googleusercontent.com')
        ),
        new Mutation(
            MutationMode::Extend,
            Directive::ImgSrc,
            SourceScheme::data,
            new UriValue('https://www.googletagmanager.com')
        ),

        // Optionen für Scripte die geladen werden dürfen
        new Mutation(
            MutationMode::Extend,
            Directive::ScriptSrc,
            SourceKeyword::nonceProxy
        ),
        new Mutation(
            MutationMode::Extend,
            Directive::ScriptSrc,
            SourceScheme::data,
            new UriValue('http://localhost.agentur2020')
        ),

        new Mutation(
            MutationMode::Extend,
            Directive::ScriptSrc,
            SourceScheme::data,
            new UriValue('https://test.agentur-ibk.de')
        ),
        new Mutation(
            MutationMode::Extend,
            Directive::ScriptSrc,
            SourceScheme::data,
            new UriValue('https://www.agentur-ibk.de')
        ),


        // Optionen für Script Source Elements
        new Mutation(
            MutationMode::Extend,
            Directive::ScriptSrcElem,
            SourceScheme::data,
            new UriValue('https://test.agentur-ibk.de')
        ),
        new Mutation(
            MutationMode::Extend,
            Directive::ScriptSrcElem,
            SourceScheme::data,
            new UriValue('https://www.agentur-ibk.de')
        ),
        new Mutation(
            MutationMode::Extend,
            Directive::ScriptSrcElem,
            SourceScheme::data,
            new UriValue('https://www.agentur-ibk.de/typo3conf/ext/om_cookie_manager/Resources/Public/Js/om_cookie_main.min.js')
        ),
        new Mutation(
            MutationMode::Extend,
            Directive::ScriptSrcElem,
            SourceScheme::data,
            SourceKeyword::strictDynamic,
            new UriValue('https://www.googletagmanager.com')
        ),

        // Optionen für Blob Sourcen
        new Mutation(
            MutationMode::Set,
            Directive::WorkerSrc,
            SourceScheme::blob
        ),

        // Optionen für Fonts aus anderen Quellen
        new Mutation(
            MutationMode::Extend,
            Directive::FontSrc,
            SourceScheme::data,
            new UriValue('https://fonts.gstatic.com')
        ),
        new Mutation(
            MutationMode::Extend,
            Directive::FontSrc,
            SourceScheme::data,
            new UriValue('https://use.fontawesome.com')
        ),

        // Optionen für Verbindungen
        new Mutation(
            MutationMode::Extend,
            Directive::ConnectSrc,
            SourceScheme::data,
            new UriValue('https://*.googleapis.com')
        ),
        new Mutation(
            MutationMode::Extend,
            Directive::ConnectSrc,
            SourceScheme::data,
            new UriValue('https://*.gstatic.com')
        ),
        new Mutation(
            MutationMode::Extend,
            Directive::ConnectSrc,
            SourceScheme::data,
            new UriValue('https://www.google-analytics.com')
        ),
        new Mutation(
            MutationMode::Extend,
            Directive::ConnectSrc,
            SourceScheme::data,
            new UriValue('https://region1.google-analytics.com')
        ),

        // Optionen für Frame Sources
        new Mutation(
            MutationMode::Extend,
            Directive::FrameSrc,
            SourceScheme::data,
            new UriValue('https://www.google.com')
        ),

        // Optionen für Object Sources
        new Mutation(
            MutationMode::Extend,
            Directive::ObjectSrc,
            SourceKeyword::none
        ),

        // Optionen für Style Source Elemente
        new Mutation(
            MutationMode::Extend,
            Directive::StyleSrcElem,
            SourceScheme::data,
            new UriValue('*.v2.scr.kaspersky-labs.com')
        ),
    ),
]);