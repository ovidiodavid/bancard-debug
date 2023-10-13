<?php
namespace CellMotion\Bancard\Api\Data;

/**
 * Bancard Cards interface.
 * @api
 * @since 1.0.0
 */
interface CardsInterface
{
    const ID = 'id';
    const CUSTOMER_ID = 'customer_id';
    const CREATED_AT = 'created_at';
    const CARD_ALIAS = 'card_alias';
    const CARD_NUMBER = 'card_number';
    const CARD_BRAND = 'card_brand';
    const CARD_EXPIRATION = 'card_expiration';
    const CARD_TYPE = 'card_type';
    const SORT_ORDER = 'sort_order';
    const DELETED = 'deleted';
    const DELETED_AT = 'deleted_at';

    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * @return int
     */
    public function getCustomerId();

    /**
     * @param int $customer_id
     * @return $this
     */
    public function setCustomerId($customer_id);

    /**
     * @return string
     */
    public function getCreatedAt();

    /**
     * @return string
     */
    public function getCardAlias();

    /**
     * @param string $card_alias
     * @return $this
     */
    public function setCardAlias($card_alias);

    /**
     * @return string
     */
    public function getCardNumber();

    /**
     * @param string $card_number
     * @return $this
     */
    public function setCardNumber($card_number);

    /**
     * @return string
     */
    public function getCardBrand();

    /**
     * @param string $card_brand
     * @return $this
     */
    public function setCardBrand($card_brand);

    /**
     * @return string
     */
    public function getCardExpiration();

    /**
     * @param string $card_expiration
     * @return $this
     */
    public function setCardExpiration($card_expiration);

    /**
     * @return string
     */
    public function getCardType();

    /**
     * @param string $card_type
     * @return $this
     */
    public function setCardType($card_type);

    /**
     * @return int
     */
    public function getSortOrder();

    /**
     * @param int $sort_order
     * @return $this
     */
    public function setSortOrder($sort_order);

    /**
     * @param int $deleted
     * @return $this
     */
    public function setDeleted($deleted);

    /**
     * @param string $deleted_at
     * @return $this
     */
    public function setDeletedAt($deleted_at);
}