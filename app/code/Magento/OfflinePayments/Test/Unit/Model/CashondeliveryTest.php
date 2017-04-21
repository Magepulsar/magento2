<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\OfflinePayments\Test\Unit\Model;

class CashondeliveryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Magento\OfflinePayments\Model\Cashondelivery
     */
    protected $_object;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $_scopeConfig;

    protected function setUp()
    {
        $helper = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);

        $eventManager = $this->getMock(\Magento\Framework\Event\ManagerInterface::class, [], [], '', false);
        $paymentDataMock = $this->getMock(\Magento\Payment\Helper\Data::class, [], [], '', false);

        $this->_scopeConfig = $this->getMock(
            \Magento\Framework\App\Config\ScopeConfigInterface::class,
            [],
            [],
            '',
            false
        );
        $this->_object = $helper->getObject(
            \Magento\OfflinePayments\Model\Cashondelivery::class,
            [
                'eventManager' => $eventManager,
                'paymentData' => $paymentDataMock,
                'scopeConfig' => $this->_scopeConfig,
            ]
        );
    }

    public function testGetInfoBlockType()
    {
        $this->assertEquals(\Magento\Payment\Block\Info\Instructions::class, $this->_object->getInfoBlockType());
    }
}
