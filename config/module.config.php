<?php
/**
 * Copyright (c) 2012 Jurian Sluiman.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the names of the copyright holders nor the names of the
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package     Soflomo\Log
 * @author      Jurian Sluiman <jurian@soflomo.com>
 * @copyright   2012 Jurian Sluiman.
 * @license     http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link        http://soflomo.com
 */

use Zend\Log\Logger;

return array(
    'soflomo_log' => array(
        'writers' => array(
            'firephp'   => array(
                'enabled'          => true,
                //'check_dependency' => 'FirePHP',
            ),
            'chromephp' => array(
                'enabled'          => true,
                //'check_dependency' => 'ChromePhp',
            ),
            'stream'    => array(
                'enabled'                  => true,
                'fingers_crossed'          => true,
                'fingers_crossed_priority' => Logger::ERR,
                'priority'                 => Logger::INFO,
                'stream'                   => 'data/log/application.log',
            ),
        ),
    ),

    'service_manager' => array(
        'aliases' => array(
            'logger' => 'Soflomo\Log\Logger',
        ),
        'factories' => array(
            'Soflomo\Log\Logger' => 'Soflomo\Log\Service\LoggerFactory',
        ),
        'initializers' => array(
            'logger' => 'Soflomo\Log\Service\LoggerAwareInitializer',
        ),
    )
);