<?php

namespace Training\AdminGridLogs\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Training\AdminGridLogs\Model\ResourceModel\UserAction as ResourceModelUserAction;

class UserAction extends AbstractExtensibleModel {

    protected function _construct()
    {
        $this->_init(ResourceModelUserAction::class);
    }
}
