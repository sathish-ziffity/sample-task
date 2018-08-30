<?php

namespace Ziffity\TaskManagement\Controller\Index;

class Add extends \Magento\Framework\App\Action\Action
{
    protected $resultForwardFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory
    ) {
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->resultForwardFactory->create();
        return $result->forward('edit');
    }
}
