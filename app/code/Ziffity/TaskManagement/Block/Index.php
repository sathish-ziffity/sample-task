<?php

namespace Ziffity\TaskManagement\Block;

class Index extends \Magento\Framework\View\Element\Template
{
    /**
     * Retrieve Status
     * @var Ziffity\TaskManagement\Model\Status
     */
    public $status;
    
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $coreRegistry = null;

    /**
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Ziffity\TaskManagement\Model\Status $status
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Ziffity\TaskManagement\Model\Status $status,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->coreRegistry = $registry;
        $this->status = $status;
        parent::__construct($context, $data);
    }

    /**
     * Get Form Action URL
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl('task/index/save', ['id' => $this->getTask()->getData('id')]);
    }

    /**
     * To get current task
     * @return mixed
     */
    public function getTask()
    {
        return $this->coreRegistry->registry('current_task');
    }
}
