<?php
declare(strict_types=1);

namespace Ibk\Ibkagentur\Helper;


class HelperFunctions {
    /**
     * Get Array with Image Sizes for Android Chrome Icons
     *
     * @return array
     */
    public static function getAndroidChromeIconSizes(): array {
        return [192, 512];
    }

    /**
     * Get Array with Image Sizes for Favicons
     *
     * @return array
     */
    public static function getFaviconIconSizes(): array {
        return [16, 32, 96];
    }

    /**
     * Get Array with Image Sizes for Apple Touch Icons
     *
     * @return array
     */
    public static function getAppleIconSizes(): array {
        return [60, 72, 76, 114, 120, 144, 152, 180];
    }

    /**
     * Get Array with META Name and Content
     *
     * @return array
     */
    public static function getMetaNameContent(): array {
        return [
            0 => [
                'name' => 'msapplication-TileImage',
                'content' => '/icon/ms-icon-144x144.png'
            ],
            1 => [
                'name' => 'theme-color',
                'content' => '#275ba4'
            ],
            2 => [
                'name' => 'msapplication-TileColor',
                'content' => '#275ba4'
            ]
        ];

    }

}