<?php

namespace Viet\Max\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'Viet\Max\Model\Post',
            'Viet\Max\Model\ResourceModel\Post'
        );
    }
}
