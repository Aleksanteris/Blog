<?php

namespace Aleksanteris\Blog\Controller\Eav\Repository;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Aleksanteris\Blog\Api\ArticleRepositoryInterface;

class DeleteById extends \Magento\Framework\App\Action\Action
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
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param ArticleRepositoryInterface $articleRepository
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        ArticleRepositoryInterface $articleRepository
    ){
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
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
        $resultPage->getConfig()->getTitle()->prepend(__('Delete By Id'));

        var_dump($this->articleRepository->deleteById(7));

        exit();

        return $resultPage;
    }
}
