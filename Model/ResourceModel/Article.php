<?php

namespace Aleksanteris\Blog\Model\ResourceModel;

class Article extends \Magento\Eav\Model\Entity\AbstractEntity
{
    protected function _construct()
    {
        $this->_read = \Aleksanteris\Blog\Model\Article::ENTITY . '_read';
        $this->_write = \Aleksanteris\Blog\Model\Article::ENTITY . '_write';
    }

    /**
     * @return \Magento\Eav\Model\Entity\Type
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getEntityType()
    {
        if (empty($this->_type)) {
            $this->setType(\Aleksanteris\Blog\Model\Article::ENTITY);
        }
        return parent::getEntityType();
    }
}
