<?php
namespace CellMotion\Bancard\Model\ResourceModel\Cards;

use CellMotion\Bancard\Model\Cards;
use CellMotion\Bancard\Model\ResourceModel\Cards as CardsResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init(Cards::class, CardsResourceModel::class);
    }
}
