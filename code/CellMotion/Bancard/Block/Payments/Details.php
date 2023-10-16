<?php declare(strict_types=1);

    namespace CellMotion\Bancard\Block\Payments;

    use Magento\Store\Model\StoreManagerInterface;
    use Magento\Customer\Model\Session as CustomerSession;
    use DigitalHub\Bancard\Gateway\CreditCard\Http\Connection;
    use DigitalHub\Bancard\Helper\Config;
    use DigitalHub\Bancard\Helper\Data;

    class Details extends \Magento\Framework\View\Element\Template
    {
        /**
         * @param \Magento\Framework\View\Element\Template\Context $context
         * @param array $data
         */
        public function __construct(
            public StoreManagerInterface $storeManager,
            public CustomerSession $customerSession,
            public Connection $connection,
            public Config $config,
            public Data $helper,
            \Magento\Framework\View\Element\Template\Context $context,
            array $data = []
        ) {
            parent::__construct($context, $data);
        }

    }
