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

final class ascii_art extends AbstractPicoPlugin
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
        echo ' _____________________'."\n";
        echo '< This is '.$_SERVER['HTTP_HOST'].' >'."\n";
        echo '< Your IP '.$_SERVER['REMOTE_ADDR'].' >'."\n";
        echo ' ---------------------'."\n";
        echo ''."\n";
        $dir = getcwd().'/plugins/ascii_art/';
        $files = glob($dir . '/*.ascii');
        $file = array_rand($files);
        readfile($files[$file]);
        exit;
      }
    }
}
