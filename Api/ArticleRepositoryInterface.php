<?php

namespace Aleksanteris\Blog\Api;

/**
 * @api
 */
interface ArticleRepositoryInterface
{
    /**
     * @param \Aleksanteris\Blog\Api\Data\ArticleInterface $article
     * @return \Aleksanteris\Blog\Api\Data\ArticleInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(\Aleksanteris\Blog\Api\Data\ArticleInterface $article);

    /**
     * @param int $articleId
     * @return \Aleksanteris\Blog\Api\Data\ArticleInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($articleId);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return  \Aleksanteris\Blog\Api\Data\ArticleSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * @param \Aleksanteris\Blog\Api\Data\ArticleInterface $article
     * @return bool true on success
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete(\Aleksanteris\Blog\Api\Data\ArticleInterface $article);

    /**
     * @param int $articleId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function deleteById($articleId);
}
