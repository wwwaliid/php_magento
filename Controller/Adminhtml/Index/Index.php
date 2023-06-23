<?php

namespace Training\AdminGridLogs\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
    public function execute()
    {
        $test = 'oomgggggg';
        consoleLog('helloooooooo' . ' this woooooorkssss' . ' ' . $test);
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
