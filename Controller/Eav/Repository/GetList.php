<?php

namespace Aleksanteris\Blog\Controller\Eav\Repository;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Aleksanteris\Blog\Api\ArticleRepositoryInterface;
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
     * @var ArticleRepositoryInterface
     */
    protected $articleRepository;

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
     * @param ArticleRepositoryInterface $articleRepository
     * @param FilterBuilder $filterBuilder
     * @param FilterGroupBuilder $filterGroupBuilder
     * @param SearchCriteriaInterfaceFactory $searchCriteriaFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        ArticleRepositoryInterface $articleRepository,
        FilterBuilder $filterBuilder,
        FilterGroupBuilder $filterGroupBuilder,
        SearchCriteriaInterfaceFactory $searchCriteriaFactory

    ){
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->articleRepository = $articleRepository;
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

        $filter1 = $this->filterBuilder
            ->setField('country')
            ->setValue('RUS')
            ->setConditionType('eq')
            ->create();

        $filter2 = $this->filterBuilder
            ->setField('country')
            ->setValue('ESP')
            ->setConditionType('eq')
            ->create();

        $filter3 = $this->filterBuilder
            ->setField('views')
            ->setValue(15)
            ->setConditionType('gt')
            ->create();

        $filterGroup1 = $this->filterGroupBuilder
            ->setFilters([$filter1, $filter2])
            ->create();

        $filterGroup2 = $this->filterGroupBuilder
            ->setFilters([$filter3])
            ->create();

        /** @var \Magento\Framework\Api\SearchCriteria $searchCriteria */
        $searchCriteria = $this->searchCriteriaFactory->create();
        $searchCriteria->setFilterGroups([$filterGroup1, $filterGroup2]);

        $result = $this->articleRepository->getList($searchCriteria);
        var_dump($result->getItems());

        exit();

        return $resultPage;
    }
}
