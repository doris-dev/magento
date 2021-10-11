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

namespace OneJobCode\DorisWidget\Block;


use Magento\Framework\Serialize\Serializer\Json;
use Magento\Framework\View\Element\Template\Context;
use Magento\Checkout\Model\Session;
use Magento\Sales\Model\Order\Config;
use Magento\Framework\App\Http\Context as HttpContext;

/**
 * Class Success
 *
 * @package OneJobCode\DorisWidget\Block
 */
class Success extends \Magento\Checkout\Block\Onepage\Success
{
    /**
     * @var Json
     */
    protected Json $serializer;

    /**
     * Success constructor.
     *
     * @param Context $context
     * @param Session $checkoutSession
     * @param Config $orderConfig
     * @param HttpContext $httpContext
     * @param Json $serializer
     * @param array $data
     */
    public function __construct(
        Context $context,
        Session $checkoutSession,
        Config $orderConfig,
        HttpContext $httpContext,
        Json $serializer,
        array $data = []
    ) {
        parent::__construct($context, $checkoutSession, $orderConfig, $httpContext, $data);
        $this->serializer = $serializer;
    }

    /**
     * @return string
     */
    public function getJsonConfig(): string
    {
        $order = $this->_checkoutSession->getLastRealOrder();
        $items = [];
        foreach ($order->getItems() as $item) {
            if (!$item->isDeleted() && !$item->getParentItemId()) {
                $items[] = $item->getData();
            }
        }

        return $this->serializer->serialize($items);
    }
}
