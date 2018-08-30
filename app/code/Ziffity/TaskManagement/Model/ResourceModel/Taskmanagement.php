<?php
namespace Ziffity\TaskManagement\Model\ResourceModel;

class Taskmanagement extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('task_management', 'id');
    }
}