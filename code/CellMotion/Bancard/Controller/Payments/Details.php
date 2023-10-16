<?php
namespace CellMotion\Bancard\Controller\Payments;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Magento\Customer\Model\Session as CustomerSession;
use Magento\Framework\Controller\ResultFactory;

class Details implements HttpGetActionInterface
{

    public function __construct(
        protected CustomerSession $customerSession,
        private PageFactory $pageFactory,
        private RequestInterface $request,
        private ResultFactory $resultFactory
    )
    {}

    public function execute(): Page
    {
        if (!$this->customerSession->isLoggedIn()) {
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setPath('customer/account/login');
            return $resultRedirect;
        }
        return $this->pageFactory->create();
    }
}
