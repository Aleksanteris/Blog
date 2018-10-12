<?php

namespace Aleksanteris\Blog\Controller\Flat;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Aleksanteris\Blog\Model\AdvertisementFactory;
use Aleksanteris\Blog\Model\ResourceModel\Advertisement\CollectionFactory;
use Aleksanteris\Blog\Model\ResourceModel\Advertisement as AdvertisementResource;

class ShowCollection extends \Magento\Framework\App\Action\Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var AdvertisementFactory;
     */
    protected $advertisementFactory;

    /**
     * @var AdvertisementResource
     */
    protected $advertisementResource;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param AdvertisementFactory $advertisementFactory
     * @param AdvertisementResource $advertisementResource
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        AdvertisementFactory $advertisementFactory,
        AdvertisementResource $advertisementResource,
        CollectionFactory $collectionFactory
    ){
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->advertisementFactory = $advertisementFactory;
        $this->advertisementResource = $advertisementResource;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @return \Magento\Framework\View\Result\Page
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute()
    {
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Show Collection'));

        /** @var \Aleksanteris\Blog\Model\ResourceModel\Advertisement\Collection $collection */
        $collection = $this->collectionFactory->create();

        var_dump($collection->toArray());

        exit();

        return $resultPage;
    }
}
