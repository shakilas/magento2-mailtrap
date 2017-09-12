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

namespace Xylo\Mailtrap\Test\Unit\Service;

use Xylo\Mailtrap\Service\Config;

class ConfigTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Config
     */
    private $instance;

    // @codingStandardsIgnoreLine
    protected function setUp()
    {
        // @codingStandardsIgnoreLine
        /** @var \Magento\Framework\App\Config\ScopeConfigInterface|\PHPUnit_Framework_MockObject_MockObject $scopeConfigMock */
        $scopeConfigMock = $this->getMockBuilder(\Magento\Framework\App\Config\ScopeConfigInterface::class)
            ->getMock();

        $scopeConfigMock->method('getValue')->will(
            $this->returnCallback(
                function ($configPath) {
                    switch ($configPath) {
                        case Config::XML_PATH_USERNAME:
                            return 'username';
                        case Config::XML_PATH_PASSWORD:
                            return 'password';
                        case Config::XML_PATH_HOST:
                            return 'smtp.mailtrap.io';
                        case Config::XML_PATH_PORT:
                            return '25';
                        case Config::XML_PATH_AUTH:
                            return 'plain';
                        default:
                            return null;
                    }
                }
            )
        );

        // @codingStandardsIgnoreLine
        $this->instance = new Config($scopeConfigMock);
    }

    public function testConfigCanBeInstantiated()
    {
        $this->assertInstanceOf(Config::class, $this->instance);
    }

    public function testConfigImplementsConfigInterface()
    {
        $this->assertInstanceOf(\Xylo\Mailtrap\Service\ConfigInterface::class, $this->instance);
    }

    public function testGetHostMethodReturnsString()
    {
        $this->assertInternalType('string', $this->instance->getHost());
    }

    public function testGetPortMethodReturnsNumberGreaterThanZero()
    {
        $actualPort = $this->instance->getPort();
        $this->assertInternalType('int', $actualPort);
        $this->assertGreaterThan(0, $actualPort);
    }

    public function testGetUsernameMethodReturnsString()
    {
        $this->assertInternalType('string', $this->instance->getUsername());
    }

    public function testGetPasswordMethodReturnsString()
    {
        $this->assertInternalType('string', $this->instance->getPassword());
    }

    public function testGetAuthMethodReturnsString()
    {
        $this->assertInternalType('string', $this->instance->getAuth());
    }
}
