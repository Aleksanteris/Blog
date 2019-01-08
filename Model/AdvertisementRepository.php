<?php

namespace Aleksanteris\Blog\Model;

use Aleksanteris\Blog\Model\ResourceModel\Advertisement as AdvertisementResource;
use Aleksanteris\Blog\Model\ResourceModel\Advertisement\CollectionFactory;
use Aleksanteris\Blog\Api\Data\AdvertisementSearchResultsInterfaceFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class AdvertisementRepository implements \Aleksanteris\Blog\Api\AdvertisementRepositoryInterface
{
    //TODO: Перенести все работы с данными в репозиорий
    /**
     * @var \Aleksanteris\Blog\Model\AdvertisementFactory;
     */
    protected $advertisementFactory;

    /**
     * @var \Aleksanteris\Blog\Model\ResourceModel\Advertisement
     */
    protected $advertisementResource;

    /**
     * @var \Aleksanteris\Blog\Model\ResourceModel\Advertisement\CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var \Aleksanteris\Blog\Api\Data\AdvertisementSearchResultsInterfaceFactory
     */
    protected $searchResultFactory;

    /**
     * @var \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @param \Aleksanteris\Blog\Model\AdvertisementFactory $advertisementFactory
     * @param \Aleksanteris\Blog\Model\ResourceModel\Advertisement $advertisementResource
     * @param \Aleksanteris\Blog\Model\ResourceModel\Advertisement\CollectionFactory $collectionFactory
     * @param \Aleksanteris\Blog\Api\Data\AdvertisementSearchResultsInterfaceFactory $searchResultFactory
     * @param \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        AdvertisementFactory $advertisementFactory,
        AdvertisementResource $advertisementResource,
        CollectionFactory $collectionFactory,
        AdvertisementSearchResultsInterfaceFactory $searchResultFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->advertisementFactory = $advertisementFactory;
        $this->advertisementResource = $advertisementResource;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultFactory = $searchResultFactory;
        $this->collectionProcessor = $collectionProcessor;
    }
//TODO: Поставить CodeSniffer MPQ
    /**
     * @param \Aleksanteris\Blog\Api\Data\AdvertisementInterface $advertisement
     * @return \Aleksanteris\Blog\Api\Data\AdvertisementInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(\Aleksanteris\Blog\Api\Data\AdvertisementInterface $advertisement)
    {
        try {
            $this->advertisementResource->save($advertisement);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $advertisement;
    }

    /**
     * @param int $advertisementId
     * @return \Aleksanteris\Blog\Api\Data\AdvertisementInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($advertisementId)
    {
        $advertisement = $this->advertisementFactory->create();
        $this->advertisementResource->load($advertisement, $advertisementId);
        if (!$advertisement->getId()) {
            throw new NoSuchEntityException(__('Advertisement with id "%1" does not exist!', $advertisementId));
        }
        return $advertisement;
    }

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return  \Aleksanteris\Blog\Api\Data\AdvertisementSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        /** @var \Aleksanteris\Blog\Model\ResourceModel\Advertisement\Collection $collection */
        $collection = $this->collectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        /** @var \Aleksanteris\Blog\Api\Data\advertisementSearchResultsInterface $searchResults */
        $searchResults = $this->searchResultFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @param \Aleksanteris\Blog\Api\Data\AdvertisementInterface $advertisement
     * @return bool true on success
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete(\Aleksanteris\Blog\Api\Data\AdvertisementInterface $advertisement)
    {
        try {
            $this->advertisementResource->delete($advertisement);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    /**
     * @param int $advertisementId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function deleteById($advertisementId)
    {
        return $this->delete($this->getById($advertisementId));
    }
}
