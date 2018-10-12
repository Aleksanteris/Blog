<?php

namespace Aleksanteris\Blog\Controller\Eav\Repository;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Aleksanteris\Blog\Model\ArticleFactory;
use Aleksanteris\Blog\Model\ResourceModel\Article as ArticleResource;
use Aleksanteris\Blog\Api\ArticleRepositoryInterface;

class Delete extends \Magento\Framework\App\Action\Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var ArticleFactory;
     */
    protected $articleFactory;

    /**
     * @var ArticleResource
     */
    protected $articleResource;

    /**
     * @var ArticleRepositoryInterface
     */
    protected $articleRepository;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param ArticleFactory $articleFactory
     * @param ArticleResource $articleResource
     * @param ArticleRepositoryInterface $articleRepository
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        ArticleFactory $articleFactory,
        ArticleResource $articleResource,
        ArticleRepositoryInterface $articleRepository
    ){
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->articleFactory = $articleFactory;
        $this->articleResource = $articleResource;
        $this->articleRepository = $articleRepository;
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

        /** @var \Aleksanteris\Blog\Model\Article $article1 */
        $article1 = $this->articleFactory->create();

        $this->articleResource->load($article1, 5);

        var_dump($this->articleRepository->delete($article1));

        exit();

        return $resultPage;
    }
}
