<?php

namespace Viet\Max\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Request\Http;
use Magento\Framework\View\Result\PageFactory;
use Viet\Max\Model\PostFactory;

class Delete extends Action
{
    protected $_pageFactory;
    protected $_request;
    protected $_postsFactory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        Http $request,
        PostFactory $postsFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_request = $request;
        $this->_postsFactory = $postsFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->_request->getParam('id');
        $post = $this->_postsFactory->create();
        $result = $post->setId($id);
        if ($result = $result->delete()){
            $this->messageManager->addSuccessMessage(__('You deleted the data.'));
        } else {
            $this->messageManager->addErrorMessage(__('Data was not deleted.'));
        }
        return $this->_redirect('Viet/index/view');
    }
}
