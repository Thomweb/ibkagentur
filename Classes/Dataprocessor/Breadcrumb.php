<?php


/**
 * This file is part of the "IbkAgentur" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024 Thomas Berscheid <thom@thomweb.de>, Agentur IBK Köln
 */

namespace Ibk\Ibkagentur\Dataprocessor;

use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;
use Ibk\Ibkblog\Domain\Repository\BlogRepository;

class Breadcrumb implements DataProcessorInterface
{
    /**
     * @param Ibk\Ibkblog\Domain\Repository\BlogRepository $blogRepository
     */
    private BlogRepository $blogRepository;

    public function __construct(
        BlogRepository $blogRepository
    )
    {
        $this->blogRepository = $blogRepository;
    }

    /**
     * Process
     *
     * @param ContentObjectRenderer $cObj The data of the content element or page
     * @param array $contentObjectConfiguration The configuration of Content Object
     * @param array $processorConfiguration The configuration of this processor
     * @param array $processedData Key/value store of processed data (e.g. to be passed to a Fluid View)
     * @return array the processed data as key/value store
     */
    public function process(ContentObjectRenderer $cObj, array $contentObjectConfiguration, array $processorConfiguration, array $processedData): array
    {

        if (array_key_exists('tx_ibkblog_blog', $_GET)) {
            $arrayBlogTemp = $_GET['tx_ibkblog_blog'];

            if (array_key_exists('bloguid', $arrayBlogTemp)) {
                $blogUid = $arrayBlogTemp['bloguid'];
                $blog = $this->blogRepository->findByUid($blogUid);
                $blogTitel = $blog->getTitel();
                $processedData['blogPostTitle'] = $blogTitel;
            }
        }

        return $processedData;
    }
}