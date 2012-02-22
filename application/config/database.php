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
 * Database Config
 *
 * Defines the database configuration for DrawingBoard.
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
 * This is the type of database you are running for you application.
 * 
 * Default: mysql
 */
$config['db_type'] = 'mysql';

/**
 * This is the name of the host that is running your database. It will usually 
 * be localhost.
 * 
 * Default: localhost
 */
$config['db_host'] = 'localhost';

/**
 * This is the name of the database to connect to.
 */
$config['db_name'] = 'db_test';

/**
 * This is the username used to connect to the database.
 * 
 * If you are typing "root" here, you are doing it really, really wrong!
 */
$config['db_user'] = 'root';


/**
 * This is the password used to connect to the database.
 */
$config['db_pass'] = 'root';

/**
 * TODO: sqlite require path to db
 */
