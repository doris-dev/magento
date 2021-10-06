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

namespace OneJobCode\DorisWidget\Test\Unit\Helper;


use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use OneJobCode\DorisWidget\Api\ConfigurationInterface;
use OneJobCode\DorisWidget\Helper\Configuration;

/**
 * Class ConfigurationTest
 *
 * @package OneJobCode\DorisWidget\Test\Unit\Helper
 */
class ConfigurationTest extends \PHPUnit\Framework\TestCase
{
    protected $contextMock;
    protected $scopeConfigMock;

    /**
     * @inheritDoc
     */
    public function setUp(): void
    {

        $this->contextMock = $this->getMockBuilder(Context::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->scopeConfigMock = $this->getMockBuilder(ScopeConfigInterface::class)
            ->getMock();

    }

    public function testIsEnable()
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->with(ConfigurationInterface::PATH_IS_ENABLE, ScopeConfigInterface::SCOPE_TYPE_DEFAULT, null)
            ->willReturn(true);

        $this->contextMock->expects($this->once())
            ->method('getScopeConfig')
            ->willReturn($this->scopeConfigMock);

        $objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);

        $configurationClass = $objectManager->getObject(Configuration::class, [
            'context' => $this->contextMock
        ]);

        $this->assertTrue($configurationClass->isEnable());
    }

    public function testGetApiKey()
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->with(ConfigurationInterface::PATH_API_KEY, ScopeConfigInterface::SCOPE_TYPE_DEFAULT, null)
            ->willReturn('apikey');

        $this->contextMock->expects($this->once())
            ->method('getScopeConfig')
            ->willReturn($this->scopeConfigMock);

        $objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);

        $configurationClass = $objectManager->getObject(Configuration::class, [
            'context' => $this->contextMock
        ]);

        $this->assertEquals($configurationClass->getApiKey(), 'apikey');
    }

    public function testGetColor()
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->with(ConfigurationInterface::PATH_COLOR, ScopeConfigInterface::SCOPE_TYPE_DEFAULT, null)
            ->willReturn('color');

        $this->contextMock->expects($this->once())
            ->method('getScopeConfig')
            ->willReturn($this->scopeConfigMock);

        $objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);

        $configurationClass = $objectManager->getObject(Configuration::class, [
            'context' => $this->contextMock
        ]);

        $this->assertEquals($configurationClass->getColor(), 'color');
    }
}
