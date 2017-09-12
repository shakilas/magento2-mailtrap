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

namespace Xylo\Mailtrap\Test\Unit\Service\Mail;

use Xylo\Mailtrap\Service\Mail\Transport as MailTransport;

class TransportTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MailTransport
     */
    private $instance;

    // @codingStandardsIgnoreLine
    protected function setUp()
    {
        /** @var \Magento\Framework\Mail\Message|\PHPUnit_Framework_MockObject_MockObject $messageMock */
        $messageMock = $this->getMockBuilder(\Magento\Framework\Mail\Message::class)
            ->getMock();

        /** @var \Xylo\Mailtrap\Service\Config|\PHPUnit_Framework_MockObject_MockObject $configMock */
        $configMock = $this->getMockBuilder(\Xylo\Mailtrap\Service\Config::class)
            ->disableOriginalConstructor()
            ->getMock();

        // @codingStandardsIgnoreLine
        $this->instance = new MailTransport($messageMock, $configMock);
    }

    public function testMailTransportCanBeInstantiated()
    {
        $this->assertInstanceOf(MailTransport::class, $this->instance);
    }

    public function testMailTransportImplementsMailTransportInterface()
    {
        $this->assertInstanceOf(\Magento\Framework\Mail\TransportInterface::class, $this->instance);
    }
}
