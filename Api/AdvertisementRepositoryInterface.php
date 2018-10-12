<?php

namespace Aleksanteris\Blog\Api;

/**
 * @api
 */
interface AdvertisementRepositoryInterface
{
    /**
     * @param \Aleksanteris\Blog\Api\Data\AdvertisementInterface $advertisement
     * @return \Aleksanteris\Blog\Api\Data\AdvertisementInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(\Aleksanteris\Blog\Api\Data\AdvertisementInterface $advertisement);

    /**
     * @param int $advertisementId
     * @return \Aleksanteris\Blog\Api\Data\AdvertisementInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($advertisementId);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return  \Aleksanteris\Blog\Api\Data\AdvertisementSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * @param \Aleksanteris\Blog\Api\Data\AdvertisementInterface $advertisement
     * @return bool true on success
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete(\Aleksanteris\Blog\Api\Data\AdvertisementInterface $advertisement);

    /**
     * @param int $advertisementId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function deleteById($advertisementId);
}
