<?php
namespace Training\AdminGridLogs\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Training\AdminGridLogs\Model\UserActionFactory;
use Training\AdminGridLogs\Model\ResourceModel\UserAction as UserActionResource;
use Magento\Backend\Model\Auth\Session as AuthSession;
use Training\AdminGridLogs\Model\Config;
use UAParser\Parser;

class AdminActionObserver implements ObserverInterface
{
    protected $UserActionFactory;
    protected $UserActionResource;

    public function __construct(UserActionFactory $UserActionFactory, UserActionResource $UserActionResource, AuthSession $authSession, Config $config)
    {
        $this->UserActionFactory = $UserActionFactory;
        $this->UserActionResource = $UserActionResource;
        $this->authSession = $authSession;
        $this->config = $config;
    }

    /**
     * Save sign-in information to custom table.
     * @param \Magento\Framework\Event\Observer $observer
     */
    public function execute(Observer $observer)
    {
        $adminUser = $this->authSession->getUser();
        $controllerAction = $observer->getData('controller_action');

        //dd($controllerAction->getRequest()->getFullActionName());

        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $userAgent = $_SERVER['HTTP_USER_AGENT'];

        // Parse the User-Agent string
        $parser = Parser::create();
        $result = $parser->parse($userAgent);

        // Extract browser and os info
        $browser = $result->ua->toString();
        $os = $result->os->toString();

        if ($controllerAction->getRequest()->getFullActionName() === 'adminhtml_system_store_index' && $this->config->isTrackingStoresEnabled()) {
            $data = [
                'action_date' => date('Y-m-d H:i:s'),
                'username' => $adminUser->getUsername(),
                'session_id' => '', // Set session ID if available
                'user_id' => $adminUser->getId(),
                'email' => $adminUser->getEmail(),
                'platform' => $browser . ' / ' . $os . ' / ' . $ipAddress,
                'action_type' => 'list all stores!!', // Set the appropriate action type
                'affected_module' => 'Stores', // Set the affected module if applicable
            ];
            $model = $this->UserActionFactory->create();
            $model->setData($data);

            $this->UserActionResource->save($model);
        }

        if ($controllerAction->getRequest()->getFullActionName() === 'customer_index_index' && $this->config->isTrackingCustomersEnabled()) {
            $data = [
                'action_date' => date('Y-m-d H:i:s'),
                'username' => $adminUser->getUsername(),
                'session_id' => '', // Set session ID if available
                'user_id' => $adminUser->getId(),
                'email' => $adminUser->getEmail(),
                'platform' => $browser . ' / ' . $os . ' / ' . $ipAddress,
                'action_type' => 'list all customers!!', // Set the appropriate action type
                'affected_module' => 'Customers', // Set the affected module if applicable
            ];
            $model = $this->UserActionFactory->create();
            $model->setData($data);

            $this->UserActionResource->save($model);
        }
        if ($controllerAction->getRequest()->getFullActionName() === 'catalog_product_index' && $this->config->isTrackingProductsEnabled()) {
            $data = [
                'action_date' => date('Y-m-d H:i:s'),
                'username' => $adminUser->getUsername(),
                'session_id' => '', // Set session ID if available
                'user_id' => $adminUser->getId(),
                'email' => $adminUser->getEmail(),
                'platform' => $browser . ' / ' . $os . ' / ' . $ipAddress,
                'action_type' => 'list all products!!', // Set the appropriate action type
                'affected_module' => 'Products', // Set the affected module if applicable
            ];
            $model = $this->UserActionFactory->create();
            $model->setData($data);

            $this->UserActionResource->save($model);
        }
        if ($controllerAction->getRequest()->getFullActionName() === 'catalog_category_index' && $this->config->isTrackingCategoriesEnabled()) {
            $data = [
                'action_date' => date('Y-m-d H:i:s'),
                'username' => $adminUser->getUsername(),
                'session_id' => '', // Set session ID if available
                'user_id' => $adminUser->getId(),
                'email' => $adminUser->getEmail(),
                'platform' => $browser . ' / ' . $os . ' / ' . $ipAddress,
                'action_type' => 'list all categories!!', // Set the appropriate action type
                'affected_module' => 'Categories', // Set the affected module if applicable
            ];
            $model = $this->UserActionFactory->create();
            $model->setData($data);

            $this->UserActionResource->save($model);
        }
        if ($controllerAction->getRequest()->getFullActionName() === 'adminhtml_system_config_index' && $this->config->isTrackingConfigEnabled()) {
            $data = [
                'action_date' => date('Y-m-d H:i:s'),
                'username' => $adminUser->getUsername(),
                'session_id' => '', // Set session ID if available
                'user_id' => $adminUser->getId(),
                'email' => $adminUser->getEmail(),
                'platform' => $browser . ' / ' . $os . ' / ' . $ipAddress,
                'action_type' => 'Configuration Access!!', // Set the appropriate action type
                'affected_module' => 'Configuration', // Set the affected module if applicable
            ];
            $model = $this->UserActionFactory->create();
            $model->setData($data);

            $this->UserActionResource->save($model);
        }
        if ($controllerAction->getRequest()->getFullActionName() === 'sales_order_index' && $this->config->isTrackingOrdersEnabled()) {
            $data = [
                'action_date' => date('Y-m-d H:i:s'),
                'username' => $adminUser->getUsername(),
                'session_id' => '', // Set session ID if available
                'user_id' => $adminUser->getId(),
                'email' => $adminUser->getEmail(),
                'platform' => $browser . ' / ' . $os . ' / ' . $ipAddress,
                'action_type' => 'list all orders!!', // Set the appropriate action type
                'affected_module' => 'Orders', // Set the affected module if applicable
            ];
            $model = $this->UserActionFactory->create();
            $model->setData($data);

            $this->UserActionResource->save($model);
        }
        if ($controllerAction->getRequest()->getFullActionName() === 'adminhtml_user_index' && $this->config->isTrackingUsersEnabled()) {
            $data = [
                'action_date' => date('Y-m-d H:i:s'),
                'username' => $adminUser->getUsername(),
                'session_id' => '', // Set session ID if available
                'user_id' => $adminUser->getId(),
                'email' => $adminUser->getEmail(),
                'platform' => $browser . ' / ' . $os . ' / ' . $ipAddress,
                'action_type' => 'list all users!!', // Set the appropriate action type
                'affected_module' => 'Users', // Set the affected module if applicable
            ];
            $model = $this->UserActionFactory->create();
            $model->setData($data);

            $this->UserActionResource->save($model);
        }
        if ($controllerAction->getRequest()->getFullActionName() === 'inventory_stock_index' && $this->config->isTrackingStockEnabled()) {
            $data = [
                'action_date' => date('Y-m-d H:i:s'),
                'username' => $adminUser->getUsername(),
                'session_id' => '', // Set session ID if available
                'user_id' => $adminUser->getId(),
                'email' => $adminUser->getEmail(),
                'platform' => $browser . ' / ' . $os . ' / ' . $ipAddress,
                'action_type' => 'list all stock!!', // Set the appropriate action type
                'affected_module' => 'Stock', // Set the affected module if applicable
            ];
            $model = $this->UserActionFactory->create();
            $model->setData($data);

            $this->UserActionResource->save($model);
        }
    }
}
