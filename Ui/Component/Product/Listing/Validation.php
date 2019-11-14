<?php

namespace Magenest\Junior\Ui\Component\Product\Listing;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class Validation extends Column
{
    protected $authSession;

    public function __construct(\Magento\Backend\Model\Auth\Session $authSession, ContextInterface $context, UiComponentFactory $uiComponentFactory, array $components = [], array $data = [])
    {
        $this->authSession = $authSession;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }


    public function prepare()
    {
        $currentAdmin = $this->authSession->getUser();
        $adminName = $currentAdmin->getFirstName();
        $firstCharacter = substr($adminName,0,1);
        if($firstCharacter >= 'A' && $firstCharacter <= 'Z')
        {
            $this->_data['config']['componentDisabled'] = false;
        }
        parent::prepare();
    }
}