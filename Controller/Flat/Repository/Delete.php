<?php

namespace Aleksanteris\Blog\Controller\Flat\Repository;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Aleksanteris\Blog\Model\AdvertisementFactory;
use Aleksanteris\Blog\Model\ResourceModel\Advertisement as AdvertisementResource;
use Aleksanteris\Blog\Api\AdvertisementRepositoryInterface;

class Delete extends \Magento\Framework\App\Action\Action
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
     * @var AdvertisementRepositoryInterface
     */
    protected $advertisementRepository;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param AdvertisementFactory $advertisementFactory
     * @param AdvertisementResource $advertisementResource
     * @param AdvertisementRepositoryInterface $advertisementRepository
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        AdvertisementFactory $advertisementFactory,
        AdvertisementResource $advertisementResource,
        AdvertisementRepositoryInterface $advertisementRepository
    ){
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->advertisementFactory = $advertisementFactory;
        $this->advertisementResource = $advertisementResource;
        $this->advertisementRepository = $advertisementRepository;
    }

    /**
     * @return \Magento\Framework\View\Result\Page
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute()
    {
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Delete'));

        /** @var \Aleksanteris\Blog\Model\Advertisement $advertisement1 */
        $advertisement1 = $this->advertisementFactory->create();

        $this->advertisementResource->load($advertisement1, 5);

        var_dump($this->advertisementRepository->delete($advertisement1));

        exit();

        return $resultPage;
    }
}
