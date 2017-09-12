<?php
/**
 * Mailtrap.io - extension for Magento 2
 *
 * NOTICE OF LICENSE
 *
 * This work is licensed under the terms of the MIT license.
 * For a copy, see <https://opensource.org/licenses/MIT>.
 *
 * @category   Xylo
 * @package    Xylo_Mailtrap
 * @author     Benoît Xylo <benoit.xylo@traverse.waw.pl>
 * @copyright  (c) 2017 Benoît Xylo
 * @license    https://opensource.org/licenses/MIT
 */

namespace Xylo\Mailtrap\Test\Unit\Model\System\Config\Source;

use Xylo\Mailtrap\Model\System\Config\Source\SmtpAuth;

class SmtpAuthTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SmtpAuth
     */
    private $instance;

    // @codingStandardsIgnoreStart
    protected function setUp()
    {
        $this->instance = new SmtpAuth();
    }
    // @codingStandardsIgnoreEnd

    public function testSmtpAuthCanBeInstantiated()
    {
        $this->assertInstanceOf(SmtpAuth::class, $this->instance);
    }

    public function testSmtpAuthImplementsArrayInterface()
    {
        $this->assertInstanceOf(\Magento\Framework\Option\ArrayInterface::class, $this->instance);
    }

    public function testToOptionArrayMethodReturnsArrayOfArrays()
    {
        $optionArray = $this->instance->toOptionArray();
        $this->assertInternalType('array', $optionArray);
        foreach ($optionArray as $option) {
            $this->assertInternalType('array', $option);
            $this->assertArrayHasKey('value', $option);
            $this->assertArrayHasKey('label', $option);
        }
    }
}
