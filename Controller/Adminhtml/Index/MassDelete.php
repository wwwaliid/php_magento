<?php

namespace Training\AdminGridLogs\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Training\AdminGridLogs\Model\UserAction;

class MassDelete extends Action
{
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    public function execute()
    {

        $ids = $this->getRequest()->getParam('selected');
        if (!is_array($ids)) {
            $this->messageManager->addError(__('Please select item(s) to delete.'));
        } else {
            try {
                foreach ($ids as $id) {
                    //deletion logic for each selected item
                    $model = $this->_objectManager->create(UserAction::class);
                    $model->load($id);
                    if ($model->getId()) {
                        $model->delete();
                    }
                }
                $this->messageManager->addSuccess(__('Items have been deleted.'));
            } catch (\Exception $e) {
                $this->messageManager->addError(__('An error occurred while deleting items.'));
            }
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setPath('*/*/');
        return $resultRedirect;
    }
}
