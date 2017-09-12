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

namespace Xylo\Mailtrap\Model\System\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class SmtpAuth implements ArrayInterface
{
    /**
     * Return array of SMTP auth methods as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'plain', 'label' => 'PLAIN'],
            ['value' => 'login', 'label' => 'LOGIN'],
            ['value' => 'crammd5', 'label' => 'CRAM-MD5']
        ];
    }
}
