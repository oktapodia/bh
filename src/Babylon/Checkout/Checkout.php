<?php
/**
 * This file is part of the babylontest project
 *
 * (c) BRAMILLE Sébastien <sebastien.bramille@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Babylon\Checkout;

use Babylon\Container\CartContainer;

/**
 * Class Checkout
 */
class Checkout implements CheckoutInterface
{
    /**
     * @var CartContainer[]
     */
    private $cart;

    /**
     * {@inheritdoc}
     */
    public function __construct($promotionalRules)
    {
        $this->cart = new CartContainer($promotionalRules);
    }

    /**
     * {@inheritdoc}
     */
    public function scan($item)
    {
        $this->cart->add($item);
    }

    /**
     * return array|Item[]
     */
    public function getItems()
    {
        return $this->cart->getAll();
    }

    /**
     * {@inheritdoc}
     */
    public function total()
    {
        $this->cart->applyPromotionalRules();

        return round($this->cart->getTotal(), 2);
    }
}
