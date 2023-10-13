<?php

namespace CellMotion\Bancard\Api;

use CellMotion\Bancard\Api\Data\CardsInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * CellMotion Bancard Cards CRUD interface.
 * @api
 * @since 1.0.0
 */
interface CardsRepositoryInterface
{
    /**
     * @param int $id
     * @return CardsInterface
     * @throws LocalizedException
     */
    public function getById(int $id): CardsInterface;

    /**
     * @param CardsInterface $card
     * @return CardsInterface
     * @throws LocalizedException
     */
    public function save(CardsInterface $card): CardsInterface;

    /**
     * @param int $id
     * @return bool
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function deleteById(int $id): bool;
}