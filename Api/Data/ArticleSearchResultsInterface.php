<?php

namespace Aleksanteris\Blog\Api\Data;

/**
 * @api
 */
interface ArticleSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * @return \Aleksanteris\Blog\Api\Data\ArticleInterface[]
     */
    public function getItems();

    /**
     * @param \Aleksanteris\Blog\Api\Data\ArticleInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}