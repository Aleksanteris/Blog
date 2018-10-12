<?php

namespace Aleksanteris\Blog\Model\ResourceModel;

class Advertisement extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('a_advertisement','advertisement_id');
    }
}
