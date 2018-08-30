<?php

namespace Ziffity\TaskManagement\Model\ResourceModel\Taskmanagement;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Ziffity\TaskManagement\Model\Taskmanagement', 'Ziffity\TaskManagement\Model\ResourceModel\Taskmanagement');
    }

}