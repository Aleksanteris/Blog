<?php

namespace Aleksanteris\Blog\Model;

use Aleksanteris\Blog\Api\Data\AdvertisementInterface;

class Advertisement extends \Magento\Framework\Model\AbstractModel implements AdvertisementInterface
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Aleksanteris\Blog\Model\ResourceModel\Advertisement::class);

    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(self::ADVERTISEMENT_ID);
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(self::ADVERTISEMENT_ID, $id);
    }

    /**
     * @return string|null
     */
    public function getCategory()
    {
        return $this->getData(self::CATEGORY);
    }

    /**
     * @param string $category
     * @return $this
     */
    public function setCategory($category)
    {
        return $this->setData(self::CATEGORY, $category);
    }

    /**
     * @return string|null
     */
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * @return float|null
     */
    public function getPrice()
    {
        return $this->getData(self::PRICE);
    }

    /**
     * @param float $price
     * @return $this
     */
    public function setPrice($price)
    {
        return $this->setData(self::PRICE, $price);
    }

    /**
     * @return int|null
     */
    public function getCount()
    {
        return $this->getData(self::COUNT);
    }

    /**
     * @param int $count
     * @return $this
     */
    public function setCount($count)
    {
        return $this->setData(self::COUNT, $count);
    }

    /**
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * @return string|null
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }
}
