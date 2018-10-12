<?php

namespace Aleksanteris\Blog\Setup;

class ArticleSetup extends \Magento\Eav\Setup\EavSetup
{
    /**
     * @return array
     */
    public function getDefaultEntities()
    {
        return [
            \Aleksanteris\Blog\Model\Article::ENTITY => [
                'entity_model' => \Aleksanteris\Blog\Model\ResourceModel\Article::class,
                'table' => \Aleksanteris\Blog\Model\Article::ENTITY . '_entity',
                'attributes' => [
                    'rubric' => [
                        'type' => 'static',
                    ],
                    'country' => [
                        'type' => 'static',
                    ],
                    'created_at' => [
                        'type' => 'static',
                    ],
                    'updated_at' => [
                        'type' => 'static',
                    ],
                    'title' => [
                        'type' => 'varchar',
                    ],
                    'note' => [
                        'type' => 'varchar',
                    ],
                    'content' => [
                        'type' => 'text',
                    ],
                    'views' => [
                        'type' => 'int',
                    ],
                    'publication_price' => [
                        'type' => 'decimal',
                    ],
                    'payment_date' => [
                        'type' => 'datetime',
                    ],
                ],
            ],
        ];
    }
}
