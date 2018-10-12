<?php

namespace Aleksanteris\Blog\Controller\Flat\Repository;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Aleksanteris\Blog\Api\AdvertisementRepositoryInterface;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\Search\FilterGroupBuilder;
use Magento\Framework\Api\SearchCriteriaInterfaceFactory;

class GetList extends \Magento\Framework\App\Action\Action
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
     * @var FilterBuilder
     */
    protected $filterBuilder;

    /**
     * @var FilterGroupBuilder
     */
    protected $filterGroupBuilder;

    /**
     * @var SearchCriteriaInterfaceFactory
     */
    protected $searchCriteriaFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param AdvertisementRepositoryInterface $advertisementRepository
     * @param FilterBuilder $filterBuilder
     * @param FilterGroupBuilder $filterGroupBuilder
     * @param SearchCriteriaInterfaceFactory $searchCriteriaFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        AdvertisementRepositoryInterface $advertisementRepository,
        FilterBuilder $filterBuilder,
        FilterGroupBuilder $filterGroupBuilder,
        SearchCriteriaInterfaceFactory $searchCriteriaFactory

    ){
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->advertisementRepository = $advertisementRepository;
        $this->filterBuilder = $filterBuilder;
        $this->filterGroupBuilder = $filterGroupBuilder;
        $this->searchCriteriaFactory = $searchCriteriaFactory;
    }

    /**
     * @return \Magento\Framework\View\Result\Page
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute()
    {
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Get List'));
        //TODO: Заполнить значения под свою таблицу
        $filter1 = $this->filterBuilder
            ->setField('name')
            ->setValue('Play Station')
            ->setConditionType('like')
            ->create();

        $filter2 = $this->filterBuilder
            ->setField('goods_id')
            ->setValue('5')
            ->setConditionType('like')
            ->create();

        $filter3 = $this->filterBuilder
            ->setField('name')
            ->setValue('Play St%')
            ->setConditionType('like')
            ->create();

        $filter_group1 = $this->filterGroupBuilder
            ->setFilters([$filter1, $filter2])
            ->create();

        $filter_group2 = $this->filterGroupBuilder
            ->setFilters([$filter3])
            ->create();

        $search_criteria = $this->searchCriteriaFactory->create();
        $search_criteria->setFilterGroups([$filter_group1, $filter_group2]);

        $result = $this->advertisementRepository->getList($search_criteria);
        var_dump($result->getItems());

        exit();

        return $resultPage;
    }
}
