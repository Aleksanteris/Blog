<?php

namespace Aleksanteris\Blog\Controller\Flat\Repository;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Aleksanteris\Blog\Api\AdvertisementRepositoryInterface;

class DeleteById extends \Magento\Framework\App\Action\Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var AdvertisementRepositoryInterface
     */
    protected $advertisementRepository;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param AdvertisementRepositoryInterface $advertisementRepository
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        AdvertisementRepositoryInterface $advertisementRepository
    ){
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
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
        $resultPage->getConfig()->getTitle()->prepend(__('Delete By Id'));

        var_dump($this->advertisementRepository->deleteById(4));

        exit();

        return $resultPage;
    }
}
