<?php
/**
 * This file is part of the babylontest project
 *
 * (c) BRAMILLE Sébastien <sebastien.bramille@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Babylon\PromotionalRule;

use Babylon\Model\PromotionalRule\MinimumItemPromotionalRule;
use Babylon\Model\PromotionalRule\ProductPricePromotionalRuleInterface;

/**
 * Class ProductPricePromotionalRule
 */
class ProductPricePromotionalRule extends MinimumItemPromotionalRule implements ProductPricePromotionalRuleInterface
{
    /**
     * {@inheritdoc}
     */
    public function needApply($cart)
    {
        $item = $cart->get($this->getItem()->getCode());

        if ($item->getQuantity() >= $this->getValue()) {
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return sprintf('Product_%s_%d', $this->getItem()->getCode(), $this->getValue());
    }
}
