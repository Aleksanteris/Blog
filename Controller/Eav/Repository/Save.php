<?php

namespace Aleksanteris\Blog\Controller\Eav\Repository;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Aleksanteris\Blog\Model\ArticleFactory;
use Aleksanteris\Blog\Model\ResourceModel\Article as ArticleResource;
use Aleksanteris\Blog\Api\ArticleRepositoryInterface;

class Save extends \Magento\Framework\App\Action\Action
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
     * @param AdvertisementFactory $articleFactory
     * @param AdvertisementResource $articleResource
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
        $resultPage->getConfig()->getTitle()->prepend(__('Save'));

        /** @var \Aleksanteris\Blog\Model\Article $article1 */
        $article1 = $this->articleFactory->create();
        //TODO: Заполнить значения под свою таблицу
        $article1->setRubric('');
        $article1->setCountry('');
        $article1->setTitle('');
        $article1->setNote('');
        $article1->setContent('');
        $article1->setViews(4);
        $article1->setPublicationPrice(11.44);
        $article1->setPaymentDate('2018-10-11');

        var_dump($this->articleRepository->save($article1));

        exit();

        return $resultPage;
    }
}
