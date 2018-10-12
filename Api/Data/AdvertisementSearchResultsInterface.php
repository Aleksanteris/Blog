<?php

namespace Aleksanteris\Blog\Api\Data;

/**
 * @api
 */
interface AdvertisementSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * @return \Aleksanteris\Blog\Api\Data\AdvertisementInterface[]
     */
    public function getItems();

    /**
     * @param \Aleksanteris\Blog\Api\Data\AdvertisementInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
