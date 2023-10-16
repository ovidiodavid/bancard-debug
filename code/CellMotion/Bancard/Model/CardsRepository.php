<?php
namespace CellMotion\Bancard\Model;

use CellMotion\Bancard\Api\Data\CardsInterface;
use CellMotion\Bancard\Model\ResourceModel\Cards as CardsResModel;
use CellMotion\Bancard\Api\CardsRepositoryInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

class CardsRepository implements CardsRepositoryInterface
{
    public function __construct(
        private CardsFactory $cardsFactory,
        private CardsResModel $cardsResourceModel
    ){}

    public function getById(int $id): CardsInterface
    {
        $card = $this->cardsFactory->create();
        $this->cardsResourceModel->load($card, $id);

        if(!$card->getById()){
            throw new NoSuchEntityException(__('La tarjeta no existe. %1', [$id]));
        }
        return $card;
    }

    public function save(CardsInterface $cards): CardsInterface
    {
        try{
            $this->cardsResourceModel->save($cards);
        }catch(\Exception $exception){
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $cards;
    }

    public function deleteById(int $id): bool
    {
        $card = $this->getById($id);
        try{
            $this->cardsResourceModel->delete($card);
        }catch(\Exception $exception){
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }
}
