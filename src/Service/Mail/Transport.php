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

namespace Xylo\Mailtrap\Service\Mail;

class Transport extends \Zend_Mail_Transport_Smtp implements \Magento\Framework\Mail\TransportInterface
{
    /**
     * @var \Magento\Framework\Mail\MessageInterface
     */
    private $message;

    /**
     * @param \Magento\Framework\Mail\MessageInterface $message
     * @param \Xylo\Mailtrap\Service\ConfigInterface $config
     */
    public function __construct(
        \Magento\Framework\Mail\MessageInterface $message,
        \Xylo\Mailtrap\Service\ConfigInterface $config
    ) {
        parent::__construct($config->getHost(), [
            'username'  => $config->getUsername(),
            'password'  => $config->getPassword(),
            'port'      => $config->getPort(),
            'auth'      => $config->getAuth()
        ]);
        $this->message = $message;
    }

    /**
     * Send a mail using this transport
     *
     * @return void
     * @throws \Magento\Framework\Exception\MailException
     */
    public function sendMessage()
    {
        if (!$this->message instanceof \Zend_Mail) {
            throw new \InvalidArgumentException('The message should be an instance of \Zend_Mail');
        }

        try {
            parent::send($this->message);
        } catch (\Exception $e) {
            // @codingStandardsIgnoreLine
            throw new \Magento\Framework\Exception\MailException(new \Magento\Framework\Phrase($e->getMessage()), $e);
        }
    }
}
