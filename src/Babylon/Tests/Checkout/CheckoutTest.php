<?php
/**
 * This file is part of the babylontest project
 *
 * (c) BRAMILLE Sébastien <sebastien.bramille@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Babylon\Tests\Checkout;

use Babylon\Checkout\Checkout;
use Babylon\Container\PromotionalRuleContainer;
use Babylon\Model\Item;
use Babylon\Tests\TestCaseHelper;

/**
 * Class CheckoutTest
 */
class CheckoutTest extends TestCaseHelper
{
    /**
     * Test checkout class
     */
    public function testCheckout()
    {
        $promotionalRules = new PromotionalRuleContainer();
        $checkout         = new Checkout($promotionalRules);
        $expected         = array();

        $checkout->scan($this->getItem001());
        $expected[$this->getItem001()->getCode()] = $this->getItem001();

        $this->assertSame($expected, $checkout->getItems());

        $checkout->scan($this->getItem002());
        $expected[$this->getItem002()->getCode()] = $this->getItem002();

        $this->assertSame($expected, $checkout->getItems());

        $total = 0;
        /** @var Item $item */
        foreach ($expected as $item) {
            $total += $item->getPrice();
        }

        $this->assertEquals($total, $checkout->total());
    }
}
