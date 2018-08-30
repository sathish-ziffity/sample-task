<?php

namespace Ziffity\TaskManagement\Controller\Index;

use \Magento\Framework\Controller\ResultFactory;

class Delete extends \Magento\Framework\App\Action\Action
{
    /* Task Management Model
     * @var \Ziffity\TaskManagement\Model\TaskmanagementFactory
     */
    protected $model;

    protected $resultFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Ziffity\TaskManagement\Model\TaskmanagementFactory $model
    ) {
        $this->model = $model->create();
        $this->resultFactory = $context->getResultFactory();
        parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setContents('');
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            try {
                $this->model->load($id);
                $this->model->delete();
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        return $result;
    }
}
