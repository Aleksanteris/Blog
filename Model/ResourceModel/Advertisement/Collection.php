<?php

namespace Aleksanteris\Blog\Model\ResourceModel\Advertisement;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Aleksanteris\Blog\Model\Advertisement::class,
            \Aleksanteris\Blog\Model\ResourceModel\Advertisement::class
        );
    }
}
