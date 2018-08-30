<?php
namespace Ziffity\TaskManagement\Controller\Index;

class Save extends \Magento\Framework\App\Action\Action
{
    /* Task Management Model
     * @var \Ziffity\TaskManagement\Model\TaskmanagementFactory
     */
    protected $model;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Ziffity\TaskManagement\Model\TaskmanagementFactory $model
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Ziffity\TaskManagement\Model\TaskmanagementFactory $model
    ) {
        $this->model = $model->create();
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            $id = $this->getRequest()->getParam('id');

            if ($id) {
                $this->model->load($id);
            }
            
            $this->model->addData($data);

            try {
                $this->model->save();
                $this->messageManager->addSuccess(__('The Task has been saved Successfully.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the Task.'));
            }
            return $resultRedirect->setPath('*/*/*', ['id' => $this->getRequest()->getParam('id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
