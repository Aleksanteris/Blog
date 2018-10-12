<?php

namespace Aleksanteris\Blog\Controller\Eav;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Aleksanteris\Blog\Model\ArticleFactory;
use Aleksanteris\Blog\Model\ResourceModel\Article\CollectionFactory;
use Aleksanteris\Blog\Model\ResourceModel\Article as ArticleResource;

class ShowCollection extends \Magento\Framework\App\Action\Action
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
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param ArticleFactory $articleFactory
     * @param ArticleResource $articleResource
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        ArticleFactory $articleFactory,
        ArticleResource $articleResource,
        CollectionFactory $collectionFactory
    ){
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->articleFactory = $articleFactory;
        $this->articleResource = $articleResource;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @return \Magento\Framework\View\Result\Page
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Exception
     */
    public function execute()
    {
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Show Collection'));

        /** @var \Aleksanteris\Blog\Model\Article $article */
        $article = $this->articleFactory->create();

        /** @var \Aleksanteris\Blog\Model\ResourceModel\Article\Collection $collection */
        $collection = $this->collectionFactory->create();

//        $collection->addAttributeToFilter('views', ['eq' => 28]);

/*        $this->articleResource->load($article, 2);
        $article->setViews(25);
        $this->articleResource->saveAttribute($article,'views');*/

        var_dump($collection->addAttributeToSelect('*')->toArray());

//        var_dump($collection->getItemsByColumnValue('country','ESP'));

        /** @var \Aleksanteris\Blog\Model\Article $article2 */
/*        $article2 = $this->articleFactory->create();
        $this->articleResource->load( $article2, 5, ['publication_price', 'content']);
        var_dump($article2->toArray());*/

        exit();

        return $resultPage;
    }
}
