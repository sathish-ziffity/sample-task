<?php
namespace Ziffity\TaskManagement\Model;

class Taskmanagement extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Ziffity\TaskManagement\Model\ResourceModel\Taskmanagement');
    }
}