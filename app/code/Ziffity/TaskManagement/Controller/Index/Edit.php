<?php

namespace Ziffity\TaskManagement\Controller\Index;

class Edit extends \Magento\Framework\App\Action\Action
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /* Task Management Model
     * @var \Ziffity\TaskManagement\Model\TaskmanagementFactory
     */
    protected $model;
    
    protected $_resultPageFactory;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\Registry $registry
     * @param \Ziffity\TaskManagement\Model\TaskmanagementFactory $_model
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry,
        \Ziffity\TaskManagement\Model\TaskmanagementFactory $model
    ) {
        $this->model = $model->create();
        $this->_coreRegistry = $registry;
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            $this->model->load($id);
            if (!$this->model->getId()) {
                $this->messageManager->addError(__('This item no longer exists.'));
                /** \Magento\Framework\Controller\Result\RedirectFactory $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('current_task', $this->model);
        $resultPage = $this->_resultPageFactory->create();
        $title = $id ? __('Edit Task `%1`', ucwords($this->model->getName())) : __('Add New Task');
        $resultPage->getConfig()->getTitle()->prepend($title);
        $this->_view->renderLayout();
    }
}
