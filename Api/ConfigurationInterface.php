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

namespace OneJobCode\DorisWidget\Api;


use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Interface ConfigurationInterface
 *
 * @package OneJobCode\DorisWidget\Api
 */
interface ConfigurationInterface
{
    const PATH_IS_ENABLE = 'doris_widget/general/active';
    const PATH_API_KEY = 'doris_widget/general/api_key';
    const PATH_COLOR = 'doris_widget/general/color';

    /**
     * @param string $scopeType
     * @param null $scopeCode
     *
     * @return bool
     */
    public function isEnable($scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scopeCode = null): bool;

    /**
     * @param string $scopeType
     * @param null $scopeCode
     *
     * @return string|null
     */
    public function getApiKey($scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scopeCode = null): ?string;

    /**
     * @param string $scopeType
     * @param null $scopeCode
     *
     * @return string|null
     */
    public function getColor($scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scopeCode = null): ?string;
}
