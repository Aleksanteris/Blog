<?php

namespace Aleksanteris\Blog\Model;

use Aleksanteris\Blog\Api\Data\ArticleInterface;

class Article extends \Magento\Framework\Model\AbstractModel implements ArticleInterface
{
    /**
     * Entity code.
     */
    const ENTITY = 'a_article';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Aleksanteris\Blog\Model\ResourceModel\Article::class);
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(self::ENTITY_ID, $id);
    }

    /**
     * @return string|null
     */
    public function getRubric()
    {
        return $this->getData(self::RUBRIC);
    }

    /**
     * @param string $rubric
     * @return $this
     */
    public function setRubric($rubric)
    {
        return $this->setData(self::RUBRIC, $rubric);
    }

    /**
     * @return string|null
     */
    public function getCountry()
    {
        return $this->getData(self::COUNTRY);
    }

    /**
     * @param string $country
     * @return $this
     */
    public function setCountry($country)
    {
        return $this->setData(self::COUNTRY, $country);
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

    /**
     * @return string|null
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * @return string|null
     */
    public function getNote()
    {
        return $this->getData(self::NOTE);
    }

    /**
     * @param string $note
     * @return $this
     */
    public function setNote($note)
    {
        return $this->setData(self::NOTE, $note);
    }

    /**
     * @return string|null
     */
    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    /**
     * @param string $content
     * @return $this
     */
    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }

    /**
     * @return int|null
     */
    public function getViews()
    {
        return $this->getData(self::VIEWS);
    }

    /**
     * @param int $views
     * @return $this
     */
    public function setViews($views)
    {
        return $this->setData(self::VIEWS, $views);
    }

    /**
     * @return float|null
     */
    public function getPublicationPrice()
    {
        return $this->getData(self::PUBLICATION_PRICE);
    }

    /**
     * @param float $publicationPrice
     * @return $this
     */
    public function setPublicationPrice($publicationPrice)
    {
        return $this->setData(self::PUBLICATION_PRICE, $publicationPrice);
    }

    /**
     * @return string|null
     */
    public function getPaymentDate()
    {
        return $this->getData(self::PAYMENT_DATE);
    }

    /**
     * @param string $paymentDate
     * @return $this
     */
    public function setPaymentDate($paymentDate)
    {
        return $this->setData(self::PAYMENT_DATE, $paymentDate);
    }
}
