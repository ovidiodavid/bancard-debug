<?php
namespace CellMotion\Bancard\Model;

use CellMotion\Bancard\Api\Data\CardsInterface;
use Magento\Framework\Model\AbstractModel;
use  CellMotion\Bancard\Model\ResourceModel\Cards as ResourceModelCards;

class Cards extends AbstractModel implements CardsInterface
{
   public function _construct()
   {
    $this->_init(ResourceModelCards::class);
   }

   public function getCustomerId()
   {
      return $this->getData(self::CUSTOMER_ID);
   }

   public function setCustomerId($customer_id)
   {
      return $this->setData(self::CUSTOMER_ID, $customer_id);
   }

   public function getCreatedAt()
   {
      return $this->getData(self::CREATED_AT);
   }

   public function getCardAlias()
   {
      return $this->getData(self::CARD_ALIAS);
   }

   public function setCardAlias($card_alias)
   {
      return $this->setData(self::CARD_ALIAS,$card_alias);
   }

   public function getCardBrand()
   {
      return $this->getData(self::CARD_BRAND);
   }

   public function setCardBrand($card_brand)
   {
      return $this->setData(self::CARD_BRAND ,$card_brand );
   }

   public function getCardNumber()
   {
      return $this->getData(self::CARD_NUMBER);
   }

   public function setCardNumber($card_number)
   {
      return  $this->setData(self::CARD_NUMBER ,$card_number);
   }

   public function getCardExpiration()
   {
      return $this->getData(self::CARD_EXPIRATION);
   }

   public function setCardExpiration($card_expiration)
   {
      return $this->setData(self::CARD_EXPIRATION, $card_expiration);
   }

   public function getCardType()
   {
      return $this->getCardType(self::CARD_TYPE);
   }

   public function setCardType($card_type)
   {
      return $this->setData(self::CARD_TYPE, $card_type);
   }

   public function getSortOrder()
   {
      return $this->getData(self::SORT_ORDER);
   }

   public function setSortOrder($sort_order)
   {
      return $this->setData(self::SORT_ORDER, $sort_order);
   }

   public function getDeletedAt()
   {
      return $this->getData(self::DELETED_AT);
   }

   public function setDeletedAt($deleted_at)
   {
      return $this->setData(self::DELETED_AT, $deleted_at);
   }

   public function getDeleted()
   {
      return $this->getData(self::DELETED);
   }

   public function setDeleted($deleted)
   {
      return $this->setData(self::DELETED, $deleted);
   }
}
