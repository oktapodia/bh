<?php
/**
 * This file is part of the babylontest project
 *
 * (c) BRAMILLE Sébastien <sebastien.bramille@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Babylon\Tests\Calculator;

use Babylon\Calculator\TotalCalculator;
use Babylon\Tests\TestCaseHelper;

/**
 * Class TotalCalculatorTest
 */
class TotalCalculatorTest extends TestCaseHelper
{
    /**
     * @dataProvider getItems
     */
    public function testCalculate($items, $expected)
    {
        $totalCalculator = new TotalCalculator();
        $result          = $totalCalculator->calculate($items);

        $this->assertEquals($expected, $result);
    }

    public function getItems()
    {
        return array(
            array(
                array(
                    $this->getItem001(),
                    $this->getItem002(),
                ),
                54.25,
            ),
            array(
                array(
                    $this->getItem001(),
                    $this->getItem001(),
                    $this->getItem001(),
                    $this->getItem002(),
                ),
                72.75,
            ),
            array(
                array(
                    $this->getItem003(),
                    $this->getItem002(),
                ),
                64.95,
            ),
        );
    }
}
