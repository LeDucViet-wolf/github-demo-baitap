<?php

namespace Viet\Max\Controller\Index;

use Exception;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Filesystem;
use Magento\Framework\View\Result\PageFactory;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Viet\Max\Model\PostFactory;

class Save extends Action
{
    protected $_pageFactory;
    protected $_postsFactory;
    protected $_filesystem;
    protected $_request;
    protected $_uploaderFactory;
    protected $_mediaDirectory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        PostFactory $postsFactory,
        Filesystem $filesystem,
        Http $request,
        UploaderFactory $uploaderFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_postsFactory = $postsFactory;
        $this->_filesystem = $filesystem;
        $this->_mediaDirectory = $filesystem->getDirectoryWrite(DirectoryList::MEDIA);
        $this->_request = $request;
        $this->_uploaderFactory = $uploaderFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        if ($this->getRequest()->isPost()) {
            $input = $this->getRequest()->getParams();
            $post = $this->_postsFactory->create();
            $id = $this->_request->getParam('id');
            try {
                $target = $this->_mediaDirectory->getAbsolutePath('image/');
                $uploader = $this->_uploaderFactory->create(['fileId' => 'image']);
                $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png', 'zip', 'doc']);
                $uploader->setAllowRenameFiles(true);
                $extension = $uploader->getFileExtension();
                $result = $uploader->save($target, time() . '.' . $extension);
                $path = substr($target . $result['file'], 28);
                $input['image'] = $path;
            } catch (Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
            $this->resultRedirectFactory->create()->setPath(
                '*/*/save', ['_secure' => $this->getRequest()->isSecure()]
            );
            if (isset($id)) {
//                die('Abc');
                $post->load($id);
                $post->addData($input);
                $post->setId($id);
                $post->save();
            } else {
                if ($post->setData($input)->save()){
                    $this->messageManager->addSuccessMessage(__('You saved the data.'));
                } else {
                    $this->messageManager->addErrorMessage(__('Data was not saved.'));
                }
            }
            return $this->_redirect('Viet/index/view');
        }

    }
}
