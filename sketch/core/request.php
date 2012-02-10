<?php if (!defined('BASE_PATH')) exit('No direct script access allowed');
/**
 * Sketch
 *
 * A small lightweight PHP HMVC application framework. Its core design is to be
 * a simple starting point for small web application projects.
 *
 * @package		Sketch
 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
 * @copyright	Copyright (c) 2012 - date('Y', time()), Complex Compulsions
 * @version     0.1
 * @filesource
 */

//------------------------------------------------------------------------------

/**
 * Request
 *
 * Controls access to the request parameters (POST and GET) and parts of the
 * URI.
 *
 * @package		Sketch
 * @subpackage	Core
 * @category 	Request
 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
 * @since 		Version 0.1
 */
class Request {

	/**
	 * Holds an array of variables set by GET global.
	 * 
	 * @access 		private
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 * 
	 * @var 		array
	 */
	private $_get = array();

	//--------------------------------------------------------------------------

	/**
	 * Holds an array of variables set by POST global.
	 * 
	 * @access 		private
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 * 
	 * @var 		array
	 */
	private $_post = array();

	//--------------------------------------------------------------------------

	/**
	 * Holds an array of variables set by FILES global.
	 * 
	 * @access 		private
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 * 
	 * @var 		array
	 */
	private $_files = array();

	//--------------------------------------------------------------------------

	/**
	 * Holds an array of variables set by COOKIE global.
	 * 
	 * @access 		private
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 * 
	 * @var 		array
	 */
	private $_cookie = array();

	//--------------------------------------------------------------------------

	/**
	 * Constructor
	 * 
	 * Does nothing at this stage.
	 * 
	 * @access 		public
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 */
	public function __construct()
	{

	}
}
