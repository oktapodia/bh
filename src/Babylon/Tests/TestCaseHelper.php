<?php
/**
 * This file is part of the babylontest project
 *
 * (c) BRAMILLE Sébastien <sebastien.bramille@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Babylon\Tests;
use Babylon\Model\Item;

require dirname(__FILE__).'/../configure.php';

// Assign as global
$GLOBALS['item001'] = $item001;
$GLOBALS['item002'] = $item002;
$GLOBALS['item003'] = $item003;

/**
 * Class TestCaseHelper
 */
class TestCaseHelper extends \PHPUnit_Framework_TestCase {
    /**
     * @return Item
     */
    public function getItem001() {
        return $GLOBALS['item001'];
    }
    /**
     * @return Item
     */
    public function getItem002() {
        return $GLOBALS['item002'];
    }
    /**
     * @return Item
     */
    public function getItem003() {
        return $GLOBALS['item003'];
    }
    /**
     * @return array|Item
     */
    public function getItems()
    {
        return array(
            $this->getItem001(),
            $this->getItem002(),
            $this->getItem003(),
        );
    }
}
