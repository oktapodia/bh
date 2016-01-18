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

use Babylon\Model\PromotionalRule\PercentPromotionalRuleInterface;
use Babylon\Model\PromotionalRule\PromotionalRule;

/**
 * Class MoreThanPercentPromotionalRule
 */
class MoreThanPercentPromotionalRule extends PromotionalRule implements PercentPromotionalRuleInterface
{
    /**
     * {@inheritdoc}
     */
    public function needApply($cart)
    {
        if ($cart->getTotal() > $this->getAmount()) {
            return true;
//            $cart->setTotal($this->calculatePercentage($total));
        }

        return false;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return sprintf('MoreThan_%d', $this->getAmount());
    }
}
