<?php
/**
 * This file is part of the babylontest project
 *
 * (c) BRAMILLE Sébastien <sebastien.bramille@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Babylon\Model\PromotionalRule;

use Babylon\Container\CartContainer;

/**
 * Class PromotionalRule
 */
abstract class PromotionalRule implements PromotionalRuleInterface, PromotionalRuleApplyInterface
{
    /**
     * @var float
     */
    protected $value;

    /**
     * @var int
     */
    protected $amount;

    /**
     * {@inheritdoc}
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @param CartContainer $cart
     *
     * @return bool
     */
    abstract public function needApply($cart);

    /**
     * @param CartContainer $cart
     *
     * @return $this
     */
    public function apply(CartContainer $cart)
    {
        if ($this instanceof PercentPromotionalRuleInterface) {
            $total = $cart->getTotal();
            $cart->setTotal($total - ($total / 100 * $this->getValue()));
        }

        if ($this instanceof ProductPricePromotionalRuleInterface) {
            $item = $cart->get($this->getItem()->getCode());
            $item->setPrice($this->getAmount());
            $cart->calculateTotal();
        }

        return $this;
    }
}
