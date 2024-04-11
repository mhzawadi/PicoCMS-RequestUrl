<?php

/**
 * force https plugin - a plugin to make sure that https is used
 *
 * Checks the URL and make sure that we are using https
 *
 * @author  Matt Horwood
 * @link    https://www.horwood.biz/
 * @license http://opensource.org/licenses/MIT The MIT License
 * @version 0.0.1
 */

final class MyRequestUrl extends AbstractPicoPlugin
{
    /**
     * This plugin is enabled by default?
     *
     * @see AbstractPicoPlugin::$enabled
     * @var boolean
     */
    protected $enabled = true;

    /**
     * This plugin depends on ...
     *
     * @see AbstractPicoPlugin::$dependsOn
     * @var string[]
     */
    protected $dependsOn = array();


    /**
     * Triggered after Pico has evaluated the request URL
     *
     * @see    Pico::getRequestUrl()
     * @param  string &$url part of the URL describing the requested contents
     * @return void
     */
    public function onRequestUrl(&$url)
    {
      if(strpos($_SERVER['HTTP_USER_AGENT'], 'curl') !== false){
        echo 'This is horwoods home page, please dont touch it';
        exit;
      }
    }
}
