<?php

namespace Training\AdminGridLogs\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;


class UserAction extends AbstractDb {

   protected function _construct()
   {
        $this->_init('user_action','id');
   }
}
