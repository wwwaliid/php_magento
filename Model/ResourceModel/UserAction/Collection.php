<?php

namespace Training\AdminGridLogs\Model\ResourceModel\UserAction;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Training\AdminGridLogs\Model\ResourceModel\UserAction as ResourceModelUserAction;
use Training\AdminGridLogs\Model\UserAction;

class Collection extends AbstractCollection {

    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(
            UserAction::class,
            ResourceModelUserAction::class
        );
    }
}
