<?php


/**
 * This file is part of the "IbkAgentur" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024 Thomas Berscheid <thom@thomweb.de>, Agentur IBK Köln
 */

namespace Ibk\Ibkagentur\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use TYPO3\CMS\Core\Page\PageRenderer;
use Ibk\Ibkagentur\Helper\HelperFunctions;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class Metataggenerator implements MiddlewareInterface
{
    public function __construct(
        PageRenderer $pageRenderer,
        HelperFunctions $helperFunctions
    )
    {
        $this->pageRenderer = $pageRenderer;
        $this->helperFunctions = $helperFunctions;
    }

    /**
     * Handler für Daten: Aufruf der Funktion um META Tags mit eigenen Inhalten zu füllen
     *
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $this->request = $request;
        $this->addMetaTagsForPwa();
        return $handler->handle($request);
    }

    /**
     * META Tags mit eigenen Inhalten füllen
     *
     * @return void
     */
    protected function addMetaTagsForPwa(): void
    {
        $androidChromeDataArray = $this->helperFunctions::getAndroidChromeIconSizes();
        $faviconDataArray = $this->helperFunctions::getFaviconIconSizes();
        $appleDataArray = $this->helperFunctions::getAppleIconSizes();
        $metaDataArray = $this->helperFunctions::getMetaNameContent();

        $headerData = '<link rel="manifest" href="/manifest.json">';
        $this->pageRenderer->addHeaderData($headerData);

        foreach ($metaDataArray as $metaDataKey => $metaDataValue) {
            $metaName = $metaDataValue['name'];
            $metaContent = $metaDataValue['content'];

            $headerData = '<meta name="' . $metaName . '" content="' . $metaContent . '">';
            $this->pageRenderer->addHeaderData($headerData);
        }

        foreach ($appleDataArray as $appleDataKey => $appleDataValue) {
            $headerData = self::setLinkRelAppleTouchIcon($appleDataValue);
            $this->pageRenderer->addHeaderData($headerData);
        }

        foreach ($faviconDataArray as $faviconDataKey => $faviconDataValue) {
            $headerData = self::setLinkRelIcon($faviconDataValue, 'favicon');
            $this->pageRenderer->addHeaderData($headerData);
        }

        foreach ($androidChromeDataArray as $androidChromeDataKey => $androidChromeDataValue) {
            $headerData = self::setLinkRelIcon($androidChromeDataValue, 'android');
            $this->pageRenderer->addHeaderData($headerData);
        }
    }

    /**
     * Generate META Tag for Apple Touch Icon by Image Size
     *
     * @param int $_png_size
     * @return string
     */
    protected function setLinkRelAppleTouchIcon(int $_png_size): string
    {
        $linkRelTag = '';

        if ($_png_size > 0) {
            $imgSize = $_png_size . "x" . $_png_size;
            $linkRelTag = '<link rel="apple-touch-icon" sizes="' . $imgSize . '" href="/icon/apple-icon-' . $imgSize . '.png">';
        }

        return $linkRelTag;
    }


    /**
     * Generate META Tag for Icon by Image Size and File Name Part
     *
     * @param int $_png_size
     * @param string $_file_name
     * @return string
     */
    protected function setLinkRelIcon(int $_png_size, string $_file_name): string
    {
        $linkRelTag = '';
        $fileName= '';

        switch ($_file_name) {
            case 'android':
                $fileName = 'android-chrome';
                break;
            case 'favicon':
                $fileName = 'favicon';
                break;
        }

        if ($_png_size > 0) {
            $imgSize = $_png_size . "x" . $_png_size;
            $linkRelTag = '<link rel="icon" sizes="' . $imgSize . '" href="/icon/' . $fileName . '-' . $imgSize . '.png">';
        }

        return $linkRelTag;
    }
}