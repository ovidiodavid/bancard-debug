<?php
/**
 * CellMotion | Bancard
 *
 * @category CellMotion
 *
 * @copyright Copyright (c) 2023 CellMotion
 *
 * @author Ing. David Arévalos <david.a@cellshop.com>
 */
declare(strict_types=1);
use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'CellMotion_Bancard',
    __DIR__
);
