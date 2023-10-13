<?php
namespace CellMotion\Bancard\Block\Payments;

use \Magento\Framework\HTTP\Client\Curl;

class Cards extends \Magento\Framework\View\Element\Template
{
    public function __construct(private Curl $curl) {

    }
}
