<?php declare(strict_types=1);

namespace CellMotion\Bancard\ViewModel;

use CellMotion\Bancard\Api\Data\CardsInterface;
use CellMotion\Bancard\Api\CardsRepositoryInterface;
use CellMotion\Bancard\Model\ResourceModel\Cards\Collection;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Cards implements ArgumentInterface
{
    public function __construct(
        private Collection $collection,
        private CardsRepositoryInterface $cardRepository,
        private RequestInterface $request
    )
    {}

    public function getList(): array
    {
        return $this->collection->getItems();
    }

    public function getCount()
    {
        return $this->collection->count();
    }

    public function getDetail(): CardsInterface
    {
        $id = (int) $this->request->getParam('id');
        return $this->cardRepository->getById($id);
    }

    public function getId()
    {
        $id = (int) $this->request->getParam('id');
        return $id;
    }
}
