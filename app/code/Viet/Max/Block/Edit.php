<?php

namespace Viet\Max\Block;

use Magento\Framework\App\Request\Http;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Result\PageFactory;
use Viet\Max\Model\PostFactory;

class Edit extends Template
{
    protected $_pageFactory;
    protected $_postsLoader;
    protected $_request;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        PostFactory $postsLoader,
        Http $request,
        array $data = []
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_postsLoader = $postsLoader;
        $this->_request = $request;
        return parent::__construct($context, $data);
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }

    public function get($id)
    {
        $customModel = $this->_postsLoader->create();
        $customModel->load($id);
        if (!$customModel->getId()) {
            echo 'CustomModel with id "%1" does not exist.';
            echo $id;
//            throw new NoSuchEntityException(__('CustomModel with id "%1" does not exist.', $id));
        }
        return $customModel;
    }

    public function getId()
    {
        $id = $this->_request->getParam('id');
        return $id;
    }
}
