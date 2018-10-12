<?php

namespace Aleksanteris\Blog\Model;

use Aleksanteris\Blog\Model\ResourceModel\Article as ArticleResource;
use Aleksanteris\Blog\Model\ResourceModel\Article\CollectionFactory;
use Aleksanteris\Blog\Api\Data\ArticleSearchResultsInterfaceFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class ArticleRepository implements \Aleksanteris\Blog\Api\ArticleRepositoryInterface
{
    /**
     * @var \Aleksanteris\Blog\Model\ArticleFactory;
     */
    protected $articleFactory;

    /**
     * @var \Aleksanteris\Blog\Model\ResourceModel\Article
     */
    protected $articleResource;

    /**
     * @var \Aleksanteris\Blog\Model\ResourceModel\Article\CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var \Aleksanteris\Blog\Api\Data\ArticleSearchResultsInterfaceFactory
     */
    protected $searchResultFactory;

    /**
     * @var \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @param \Aleksanteris\Blog\Model\ArticleFactory $articleFactory
     * @param \Aleksanteris\Blog\Model\ResourceModel\Article $articleResource
     * @param \Aleksanteris\Blog\Model\ResourceModel\Article\CollectionFactory $collectionFactory
     * @param \Aleksanteris\Blog\Api\Data\ArticleSearchResultsInterfaceFactory $searchResultFactory
     * @param \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ArticleFactory $articleFactory,
        ArticleResource $articleResource,
        CollectionFactory $collectionFactory,
        ArticleSearchResultsInterfaceFactory $searchResultFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->articleFactory = $articleFactory;
        $this->articleResource = $articleResource;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultFactory = $searchResultFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @param \Aleksanteris\Blog\Api\Data\ArticleInterface $article
     * @return \Aleksanteris\Blog\Api\Data\ArticleInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(\Aleksanteris\Blog\Api\Data\ArticleInterface $article)
    {
        try {
            $this->articleResource->save($article);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $article;
    }

    /**
     * @param int $articleId
     * @return \Aleksanteris\Blog\Api\Data\ArticleInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($articleId)
    {
        $article = $this->articleFactory->create();
        $this->articleResource->load($article, $articleId);
        if (!$article->getId()) {
            throw new NoSuchEntityException(__('Article with id "%1" does not exist!', $articleId));
        }
        return $article;
    }

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return  \Aleksanteris\Blog\Api\Data\ArticleSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        /** @var \Aleksanteris\Blog\Model\ResourceModel\Article\Collection $collection */
        $collection = $this->collectionFactory->create();
        $collection->addAttributeToSelect('*');

        $this->collectionProcessor->process($searchCriteria, $collection);

        /** @var \Aleksanteris\Blog\Api\Data\ArticleSearchResultsInterface $searchResults */
        $searchResults = $this->searchResultFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @param \Aleksanteris\Blog\Api\Data\ArticleInterface $article
     * @return bool true on success
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete(\Aleksanteris\Blog\Api\Data\ArticleInterface $article)
    {
        try {
            $this->articleResource->delete($article);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    /**
     * @param int $articleId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function deleteById($articleId)
    {
        return $this->delete($this->getById($articleId));
    }
}
