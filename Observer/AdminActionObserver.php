<?php
namespace Training\AdminGridLogs\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Training\AdminGridLogs\Model\UserActionFactory;
use Training\AdminGridLogs\Model\ResourceModel\UserAction as UserActionResource;
use Magento\Backend\Model\Auth\Session as AuthSession;

class AdminActionObserver implements ObserverInterface
{
    protected $UserActionFactory;
    protected $UserActionResource;

    public function __construct(UserActionFactory $UserActionFactory, UserActionResource $UserActionResource, AuthSession $authSession)
    {
        $this->UserActionFactory = $UserActionFactory;
        $this->UserActionResource = $UserActionResource;
        $this->authSession = $authSession;
    }

    /**
     * Save sign-in information to custom table.
     * @param \Magento\Framework\Event\Observer $observer
     */
    public function execute(Observer $observer)
    {
        $adminUser = $this->authSession->getUser();
        $controllerAction = $observer->getData('controller_action');

        if ($controllerAction->getRequest()->getFullActionName() === 'adminhtml_system_store_index') {
            $data = [
                'login_date' => date('Y-m-d H:i:s'),
                'username' => $adminUser->getUsername(),
                'session_id' => '', // Set session ID if available
                'user_id' => $adminUser->getId(),
                'email' => $adminUser->getEmail(),
                'ip_address' => '', // Set IP address if available
                'logout_date' => '', // Set logout date if available
                'action_type' => 'list all stores!!', // Set the appropriate action type
                'affected_module' => 'Stores', // Set the affected module if applicable
            ];

        }
        $model = $this->UserActionFactory->create();
        $model->setData($data);

        $this->UserActionResource->save($model);
    }
}
