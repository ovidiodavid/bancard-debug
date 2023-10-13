<?php
/**
 * Cellshop Development Team
 *
 * @author Ing. David Arévalos <david.a@cellshop.com>
 *
 *
 */
namespace CellMotion\Bancard\Block\Payments;

use Magento\Store\Model\StoreManagerInterface;
use Magento\Customer\Model\Session as CustomerSession;
use DigitalHub\Bancard\Gateway\CreditCard\Http\Connection;
use DigitalHub\Bancard\Helper\Config;
use DigitalHub\Bancard\Helper\Data;

class PaymentsCards extends \Magento\Framework\View\Element\Template
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

    public function getStoreId(){
        return $this->storeManager->getStore()->getId();
    }

    public function getReturnUrl(){
        return $this->_urlBuilder->getUrl("bancard/payments/cards/");
    }

    public function setNewCard(){

        $card_id    = 6;
        $user_id    = $this->customerSession->getCustomer()->getID();
        $user_phone = $this->customerSession->getCustomer()->getCellphone();
        $user_email = $this->customerSession->getCustomer()->getEmail();
        $token      = md5($this->config->getPrivateKeyByStore($this->getStoreId()).$card_id. $user_id."request_new_card");

        $request = $this->connection->setEndpoint("vpos/api/0.3/cards/new")
            ->setData([
                "public_key" => $this->config->getPublicKeyByStore($this->getStoreId()),
                "operation" => [
                    "token" => $token,
                    "card_id" => $card_id,
                    "user_id" => $user_id,
                    "user_cell_phone" => $user_phone,
                    "user_mail" => $user_email,
                    "return_url" => $this->getReturnUrl()
                ],
                //"test_client" => !(boolean)$this->config->getMode()
            ]);

        $response = $request->post();

       return $response['process_id'];
    }

    public function getCards(){

        $user_id    = $this->customerSession->getCustomer()->getID();
        $token      = md5($this->config->getPrivateKeyByStore($this->getStoreId()).$user_id."request_user_cards");

        $request = $this->connection->setEndpoint("vpos/api/0.3/users/".$user_id."/cards")
            ->setData([
                "public_key" => $this->config->getPublicKeyByStore($this->getStoreId()),
                "operation" => [
                    "token" => $token
                ],
                //"test_client" => !(boolean)$this->config->getMode()
            ]);

        $response = $request->post();

        if($response['status'] == 'success'){
            return $response['cards'];
        }

        return false;

    }

    public function deleteCard($card_token){
        $user_id    = $this->customerSession->getCustomer()->getID();
        $token      = md5($this->config->getPrivateKeyByStore($this->getStoreId())."delete_card".$user_id.$card_token);

        $request = $this->connection->setEndpoint("vpos/api/0.3/users/".$user_id."/cards")
        ->setData([
            "public_key" => $this->config->getPublicKeyByStore($this->getStoreId()),
            "operation" => [
                "token" => $token,
                "alias_token" => $card_token
            ],
            //"test_client" => !(boolean)$this->config->getMode()
        ]);

        $response = $request->delete();

        return $response['status'];
    }

    public function setPayWithTokenCard(){

       /* $token      = md5($this->config->getPrivateKeyByStore($this->getStoreId()).$user_id."request_user_cards");
        md5(private_key + shop_process_id + "charge" + amount + currency + alias_token)


        $request = $this->connection->setEndpoint("vpos/api/0.3/charge")
            ->setData([
                "public_key" => $this->config->getPublicKeyByStore($this->getStoreId()),
                "operation" => [
                    "token" => $token
                ],
                //"test_client" => !(boolean)$this->config->getMode()
            ]);

        $response = $request->post();*/

    }



}