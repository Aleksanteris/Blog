<?php

namespace Aleksanteris\Blog\Api\Data;

/**
 * @api
 */
interface ArticleInterface
{
    /**#@+
     * Constants
     */
    const ENTITY_ID = 'entity_id';

    const RUBRIC = 'rubric';

    const COUNTRY = 'country';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    const TITLE = 'title';

    const NOTE = 'note';

    const CONTENT = 'content';

    const VIEWS = 'views';

    const PUBLICATION_PRICE = 'publication_price';

    const PAYMENT_DATE = 'payment_date';

    /**#@-*/

    /**
     * @return int|null
     */
    public function getId();

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * @return string|null
     */
    public function getRubric();

    /**
     * @param string $rubric
     * @return $this
     */
    public function setRubric($rubric);

    /**
     * @return string|null
     */
    public function getCountry();

    /**
     * @param string $country
     * @return $this
     */
    public function setCountry($country);

    /**
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);

    /**
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt);

    /**
     * @return string|null
     */
    public function getTitle();

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

    /**
     * @return string|null
     */
    public function getNote();

    /**
     * @param string $note
     * @return $this
     */
    public function setNote($note);

    /**
     * @return string|null
     */
    public function getContent();

    /**
     * @param string $content
     * @return $this
     */
    public function setContent($content);

    /**
     * @return int|null
     */
    public function getViews();

    /**
     * @param int $views
     * @return $this
     */
    public function setViews($views);

    /**
     * @return float|null
     */
    public function getPublicationPrice();

    /**
     * @param float $publicationPrice
     * @return $this
     */
    public function setPublicationPrice($publicationPrice);

    /**
     * @return string|null
     */
    public function getPaymentDate();

    /**
     * @param string $paymentDate
     * @return $this
     */
    public function setPaymentDate($paymentDate);
}
