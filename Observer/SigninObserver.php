<?php
namespace Training\AdminGridLogs\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Training\AdminGridLogs\Model\UserActionFactory;
use Training\AdminGridLogs\Model\ResourceModel\UserAction as UserActionResource;

class SigninObserver implements ObserverInterface
{
    protected $UserActionFactory;
    protected $UserActionResource;

    public function __construct(UserActionFactory $UserActionFactory, UserActionResource $UserActionResource)
    {
        $this->UserActionFactory = $UserActionFactory;
        $this->UserActionResource = $UserActionResource;
    }

    /**
     * Save sign-in information to custom table.
     * @param \Magento\Framework\Event\Observer $observer
     */
    public function execute(Observer $observer)
    {
        $user = $observer->getUser();
        if ($user && $user->getId()) {
            $data = [
                'login_date' => date('Y-m-d H:i:s'),
                'username' => $user->getUserName(),
                'session_id' => '', // Set session ID if available
                'user_id' => $user->getId(),
                'email' => $user->getEmail(),
                'ip_address' => '', // Set IP address if available
                'logout_date' => '', // Set logout date if available
                'action_type' => 'signin', // Set the appropriate action type
                'affected_module' => 'Sign in', // Set the affected module if applicable
            ];

            $model = $this->UserActionFactory->create();

            $model->setData($data);

            $this->UserActionResource->save($model);

        }
    }
}
