<?php
namespace CellMotion\Bancard\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Cards extends AbstractDb
{
    const MAIN_TABLE    = 'cellmotion_bancard_cards';
    const ID_FIELD_NAME = 'id';
    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
    }
}
