<?php if (!defined('BASE_PATH')) exit('No direct script access allowed');
/**
 * DrawingBoard
 *
 * A small lightweight PHP HMVC application framework. Its core design is to be
 * a simple starting point for small web application projects.
 *
 * @package		DrawingBoard
 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
 * @copyright	Copyright (c) 2012 - date('Y', time()), Complex Compulsions
 * @version     0.1
 * @filesource
 */

//------------------------------------------------------------------------------

/**
 * Config
 *
 * Defines the core configuration for DrawingBoard.
 *
 * @package		DrawingBoard
 * @subpackage	Config
 * @category 	Config
 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
 * @since 		Version 0.1
 */

//------------------------------------------------------------------------------
//                .__________________________________________.
//                |        ~~~      WARNING       ~~~        |
//                |------------------------------------------|
//                |    Be sure to read ALL comments before   |
//                |  changing anything you don't understand. |
//                |__________________________________________|
// 
//------------------------------------------------------------------------------

/**
 * If the config array has not been instantiated we'll do that here.
 */
if (!isset($config)) $config = array();

//------------------------------------------------------------------------------
// You can edit any values below, but read the comments!
//------------------------------------------------------------------------------

/**
 * This is the name of controller that is called if one is not passed in the
 * request (URI).
 */
$config['default_controller'] = 'index';
