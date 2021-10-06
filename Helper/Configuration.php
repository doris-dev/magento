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

namespace OneJobCode\DorisWidget\Helper;


use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use OneJobCode\DorisWidget\Api\ConfigurationInterface;

/**
 * Class Configuration
 *
 * @package OneJobCode\DorisWidget\Helper
 */
class Configuration extends AbstractHelper implements ConfigurationInterface
{
    /**
     * @inheritDoc
     */
    public function isEnable($scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scopeCode = null): bool
    {
        return (bool) $this->scopeConfig->getValue(static::PATH_IS_ENABLE, $scopeType, $scopeCode);
    }

    /**
     * @inheritDoc
     */
    public function getApiKey($scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scopeCode = null): ?string
    {
        return $this->scopeConfig->getValue(static::PATH_API_KEY, $scopeType, $scopeCode);
    }

    /**
     * @inheritDoc
     */
    public function getColor($scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scopeCode = null): ?string
    {
        return $this->scopeConfig->getValue(static::PATH_COLOR, $scopeType, $scopeCode);
    }
}
