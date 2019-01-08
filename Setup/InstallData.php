<?php

namespace Aleksanteris\Blog\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Aleksanteris\Blog\Model\ArticleFactory;
use Aleksanteris\Blog\Model\ResourceModel\Article as ArticleResource;

class InstallData implements InstallDataInterface
{
    /**
     * @var ArticleFactory;
     */
    protected $articleFactory;

    /**
     * @var ArticleResource
     */
    protected $articleResource;

    /**
     * @var \Aleksanteris\Blog\Setup\ArticleSetupFactory
     */
    private $articleSetupFactory;

    /**
     * @param \Aleksanteris\Blog\Model\ArticleFactory $articleFactory
     * @param \Aleksanteris\Blog\Model\ResourceModel\Article $articleResource
     * @param \Aleksanteris\Blog\Setup\ArticleSetupFactory $articleSetupFactory
     */
    public function __construct(
        ArticleFactory $articleFactory,
        ArticleResource $articleResource,
        ArticleSetupFactory $articleSetupFactory
    ){
        $this->articleFactory = $articleFactory;
        $this->articleResource = $articleResource;
        $this->articleSetupFactory = $articleSetupFactory;
    }

    /**
     * Installs data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     * @return void
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /**
         * @param \Aleksanteris\Blog\Setup\ArticleSetup $articleSetup
         */
        $articleSetup = $this->articleSetupFactory->create(['setup' => $setup]);
        $articleSetup->installEntities();

        $setup->startSetup();

        $advertisementData = [
            ['category' => 'Cars', 'description' => '2008 Dodge Grand Caravan SE', 'price' => 4900.33, 'count' => 3],
            ['category' => 'Cars', 'description' => '2014 Dodge Journey SXT', 'price' => 18279.62, 'count' => 7],
            ['category' => 'Cars', 'description' => '2015 Infiniti Q50', 'price' => 17354.14, 'count' => 2],
            ['category' => 'Cars', 'description' => '2015 Infiniti JX35', 'price' => 13458.45, 'count' => 1],
            ['category' => 'Phones', 'description' => 'Samsung Galaxy S7', 'price' => 129.94, 'count' => 12],
            ['category' => 'Phones', 'description' => 'Apple iPhone 7', 'price' => 319.99, 'count' => 6],
            ['category' => 'Phones', 'description' => 'Sony Ericsson Xperia St27i', 'price' => 99.78, 'count' => 15],
            ['category' => 'Phones', 'description' => 'SIEMENS S4', 'price' => 179.00, 'count' => 13],
            ['category' => 'DVD', 'description' => 'Harry Potter', 'price' => 11.88, 'count' => 2],
            ['category' => 'DVD', 'description' => 'The Walking Dead', 'price' => 9.39, 'count' => 25],
            ['category' => 'DVD', 'description' => 'Supernatural', 'price' => 9.39, 'count' => 17],
            ['category' => 'Watches', 'description' => 'Citizen Skyhawk A-T', 'price' => 815.55, 'count' => 11],
            ['category' => 'Watches', 'description' => 'Casio Pro Trek', 'price' => 586.55, 'count' => 3],
            ['category' => 'Watches', 'description' => 'Casio Pro Trek', 'price' => 596.34, 'count' => 24],
            ['category' => 'Watches', 'description' => 'Tissot T-Touch II', 'price' => 924.97, 'count' => 7],
        ];

        $setup->getConnection()->insertMultiple($setup->getTable('a_advertisement'), $advertisementData);
//TODO: Можно ли через insertMultiple заполнить таблицы EAV
        /** @var \Aleksanteris\Blog\Model\Article $article1 */
        $article1 = $this->articleFactory->create();
        $article1->setRubric('Sport');
        $article1->setCountry('USA');
        $article1->setTitle('On and offstage brawls erupt after Khabib beats McGregor in UFC fight');
        $article1->setNote('Box');
        $article1->setContent(
            'Punches were thrown in and outside of the ring after Khabib Nurmagomedov beat Conor McGregor'
            . ' and retained his UFC lightweight title on Saturday in Las Vegas.'
            . ' Nurmagomedov jumped out of the cage before leaping feet first at McGregor’s teammate'
            . ' and retained his UFC lightweight title on Saturday in Las Vegas.'
        );
        $article1->setViews(4);
        $article1->setPublicationPrice(11.44);
        $article1->setPaymentDate('2018-10-15 09:09:09');
        $this->articleResource->save($article1);

        /** @var \Aleksanteris\Blog\Model\Article $article2 */
        $article2 = $this->articleFactory->create();
        $article2->setRubric('Sport');
        $article2->setCountry('RUS');
        $article2->setTitle('Russian footballers detained after beating government official');
        $article2->setNote('Football');
        $article2->setContent(
            'Two Russian Premier League footballers have been detained by police after an altercation'
            . ' with a government official at Moscow\'s "Coffeemania" cafe on Monday.'
            . ' Zenit St. Petersburg striker Aleksandr Kokorin, 27, and Krasnodar FC midfielder Pavel'
            . ' Mamayev, 30, have been accused of beating an official from the Russian Ministry for Industry and Trade.'
            . ' The athletes now face up to five years in prison for their involvement in the altercation.'
        );
        $article2->setViews(11);
        $article2->setPublicationPrice(15.24);
        $article2->setPaymentDate('2018-10-11 10:10:10');
        $this->articleResource->save($article2);

        /** @var \Aleksanteris\Blog\Model\Article $article3 */
        $article3 = $this->articleFactory->create();
        $article3->setRubric('Sport');
        $article3->setCountry('ESP');
        $article3->setTitle('Vuelta a Espana: Britain\'s Simon Yates takes a lead into Sunday\'s final');
        $article3->setNote('Cycling');
        $article3->setContent(
            'Spain\'s Enric Mas (Quick-Step Floors) and Colombia\'s Miguel Angel Lopez (Astana) finished'
            . ' first and second to put themselves onto the general classification podium with one stage'
            . ' remaining in the Vuelta a Espana'
        );
        $article3->setViews(15);
        $article3->setPublicationPrice(7.65);
        $article3->setPaymentDate('2018-11-12 11:11:11');
        $this->articleResource->save($article3);

        /** @var \Aleksanteris\Blog\Model\Article $article4 */
        $article4 = $this->articleFactory->create();
        $article4->setRubric('Travel');
        $article4->setCountry('USA');
        $article4->setTitle('Holland America is latest cruise line to hike daily service charges on ship');
        $article4->setNote('Cruise');
        $article4->setContent(
            'Forget the clichés!'
            . ' To discover real Siberia and become its ambassadors...that was the goal of the first group taking part in the'
            . ' \'Follow Up Siberia\' programme, organised by Russian firm Nornickel.'
            . ' Seven travellers chosen from different countries flew to Norilsk. Their first impressions were overwhelming.'
        );
        $article4->setViews(11);
        $article4->setPublicationPrice(11.44);
        $article4->setPaymentDate('2018-10-11 12:12:12');
        $this->articleResource->save($article4);

        /** @var \Aleksanteris\Blog\Model\Article $article5 */
        $article5 = $this->articleFactory->create();
        $article5->setRubric('Travel');
        $article5->setCountry('RUS');
        $article5->setTitle('Follow us in Siberia: The other side of Siberia');
        $article5->setNote('Siberia');
        $article5->setContent(
            'Planning a Holland America cruise for the coming year? Brace yourself for higher daily fees.'
            . ' bills by 7.4% to $14.50 per person, per day for passengers staying in most cabins.'
            . ' Passengers in suites will pay $16 per person, per day — a 6.7% rise.'
        );
        $article5->setViews(28);
        $article5->setPublicationPrice(15.38);
        $article5->setPaymentDate('2018-11-27 13:13:13');
        $this->articleResource->save($article5);

        /** @var \Aleksanteris\Blog\Model\Article $article6 */
        $article6 = $this->articleFactory->create();
        $article6->setRubric('Travel');
        $article6->setCountry('ESP');
        $article6->setTitle('Bull running festival kicks off in Spain despite protests');
        $article6->setNote('Siberia');
        $article6->setContent(
            'Spain\'s internationally famous San Fermin festival kicked off on Friday as normal despite'
            . ' protests over sexual violence and the treatment of bulls.'
        );
        $article6->setViews(34);
        $article6->setPublicationPrice(27.37);
        $article6->setPaymentDate('2018-11-21 14:14:14');
        $this->articleResource->save($article6);

        $setup->endSetup();
    }
}
