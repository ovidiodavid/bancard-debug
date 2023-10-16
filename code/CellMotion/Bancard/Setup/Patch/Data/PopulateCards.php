<?php
namespace CellMotion\Bancard\Setup\Patch\Data;

use CellMotion\Bancard\Model\CardsFactory;
use CellMotion\Bancard\Api\CardsRepositoryInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;

class PopulateCards implements DataPatchInterface
{
    public function __construct(
        private ModuleDataSetupInterface $moduleDataSetup,
        private CardsFactory $cardsFactory,
        private CardsRepositoryInterface $cardsRepository,
    ) {}

    public static function getDependencies(): array
    {
        return [];
    }

    public function getAliases(): array
    {
        return [];
    }

    public function apply()
    {
        $this->moduleDataSetup->startSetup();

        $card = $this->cardsFactory->create();
        $card->setData([
            'card_alias' => 'Tarjeta MasterCard',
            'card_number' => '4111********8**7',
            'card_type' => 'credit',
            'card_expiration' => '12/31',
            'card_brand' => 'mastercard',
            'sort_order' => 1,
            'deleted' => 0,
            'customer_id' => 15002
        ],
        [
            'card_alias' => 'Tarjeta Visa',
            'card_number' => '5800********4744',
            'card_type' => 'credit',
            'card_expiration' => '07/27',
            'card_brand' => 'visa',
            'sort_order' => 1,
            'deleted' => 0,
            'customer_id' => 15002
        ]);
        $this->cardsRepository->save($card);

        $this->moduleDataSetup->endSetup();
    }
}
