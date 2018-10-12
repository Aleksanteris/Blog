<?php

namespace Aleksanteris\Blog\Model\ResourceModel\Article;

class Collection extends \Magento\Eav\Model\Entity\Collection\AbstractCollection
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Aleksanteris\Blog\Model\Article::class,
            \Aleksanteris\Blog\Model\ResourceModel\Article::class
        );
    }
}
