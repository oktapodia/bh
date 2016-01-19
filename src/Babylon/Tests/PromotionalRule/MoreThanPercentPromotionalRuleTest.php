<?php
/**
 * This file is part of the babylontest project
 *
 * (c) BRAMILLE Sébastien <sebastien.bramille@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Babylon\Tests\PromotionalRule;

use Babylon\Container\CartContainer;
use Babylon\PromotionalRule\MoreThanPercentPromotionalRule;
use Babylon\Tests\TestCaseHelper;

/**
 * Class MoreThanPercentPromotionalRule
 */
class MoreThanPercentPromotionalRuleTest extends TestCaseHelper
{
    /**
     * @dataProvider getNeedApplyProvider
     */
    public function testNeedApply($amount, $expectedResult)
    {
        $cartContainer = \Phake::mock(CartContainer::class);
        \Phake::when($cartContainer)->getTotal()->thenReturn(42);

        $moreThanPercentPromotionalRule = new MoreThanPercentPromotionalRule();
        $moreThanPercentPromotionalRule->setAmount($amount);

        $this->assertEquals($expectedResult, $moreThanPercentPromotionalRule->needApply($cartContainer));
    }

    public function getNeedApplyProvider()
    {
        return array (
            array(
                'amount'         => 20,
                'expectedResult' => true,
            ),
            array(
                'amount'         => 42,
                'expectedResult' => false,
            ),
            array(
                'amount'         => 60,
                'expectedResult' => false,
            ),
        );
    }
}
