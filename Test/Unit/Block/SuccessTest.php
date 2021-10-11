<?php
/**
 * OneJobCode
 *
 * NOTICE OF LICENSE
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to https://www.onejobcode.com for more information.
 *
 * @category OneJobCode
 *
 * @copyright Copyright (c) 2021 One Job Code (https://www.onejobcode.com)
 *
 * @author One Job Code <engineer@onejobcode.com>
 */

namespace OneJobCode\DorisWidget\Test\Unit\Block;


use OneJobCode\DorisWidget\Block\Success;
use Magento\Framework\Serialize\Serializer\Json;
use Magento\Checkout\Model\Session;
use Magento\Sales\Model\Order;
use Magento\Sales\Model\Order\Item;

/**
 * Class SuccessTest
 *
 * @package OneJobCode\DorisWidget\Test\Unit\Block
 */
class SuccessTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Success
     */
    protected $successClass;

    protected $serializerMock;
    protected $orderMock;
    protected $itemMock;
    protected $sessionMock;

    /**
     * @inheritDoc
     */
    public function setUp(): void
    {
        $objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);

        $this->serializerMock = $this->getMockBuilder(Json::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->itemMock = $this->getMockBuilder(Item::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->orderMock = $this->getMockBuilder(Order::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->sessionMock = $this->getMockBuilder(Session::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->successClass = $objectManager->getObject(Success::class, [
            'serializer' => $this->serializerMock,
            'checkoutSession' => $this->sessionMock
        ]);
    }

    public function testGetJsonConfig()
    {
        $this->itemMock->expects($this->once())
            ->method('getData')
            ->will($this->returnValue([
                'sku' => 'product_sku'
            ]));

        $this->itemMock->expects($this->once())
            ->method('isDeleted')
            ->will($this->returnValue(false));

        $this->itemMock->expects($this->once())
            ->method('getParentItemId')
            ->will($this->returnValue(false));

        $this->orderMock->expects($this->once())
            ->method('getItems')
            ->will($this->returnValue([$this->itemMock]));

        $this->sessionMock->expects($this->once())
            ->method('getLastRealOrder')
            ->will($this->returnValue($this->orderMock));

        $this->serializerMock->expects($this->once())
            ->method('serialize')
            ->with([['sku' => 'product_sku']])
            ->will($this->returnValue('[{sku: "product_sku"}]'));

        $this->assertEquals($this->successClass->getJsonConfig(), '[{sku: "product_sku"}]');
    }
}
