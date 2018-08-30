<?php

namespace Ziffity\TaskManagement\Controller\Index;

use \Magento\Framework\Controller\ResultFactory;

class Data extends \Magento\Framework\App\Action\Action
{
    /* Task Management Model
     * @var \Ziffity\TaskManagement\Model\TaskmanagementFactory
     */
    protected $model;

    protected $resultFactory;
        
    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Ziffity\TaskManagement\Model\TaskmanagementFactory $_model
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Ziffity\TaskManagement\Model\TaskmanagementFactory $_model
    ) {
        $this->model = $_model->create();
        $this->resultFactory = $context->getResultFactory();
        parent::__construct($context);
    }

    /**
     * prepare collections
     * @return string
     */
    public function execute()
    {
        $data = $this->model->getCollection()->addFieldToSelect('*')->getData();
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setContents($data ? json_encode($data) : '');
        return $result;
    }
}
