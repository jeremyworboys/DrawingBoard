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
 * Request
 *
 * Controls access to the request parameters (POST and GET) and parts of the
 * URI.
 *
 * @package		DrawingBoard
 * @subpackage	Core
 * @category 	Request
 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
 * @since 		Version 0.1
 */
class Request {

	/**
	 * Holds an array of "steps" in the URI path that we will use to route our 
	 * application.
	 * 
	 * @access 		private
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 * 
	 * @var 		array
	 */
	private $_URI_steps = array();

	//--------------------------------------------------------------------------

	/**
	 * Constructor
	 * 
	 * Pulls in the required globals and runs "_get_steps" to fill $_URI_steps
	 * for later methods.
	 * 
	 * @access 		public
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 */
	public function __construct()
	{
		/**
		 * Let's prepare our steps so it is done and out of the way.
		 */
		$this->_get_steps();
	}

	//--------------------------------------------------------------------------

	/**
	 * Get Step
	 * 
	 * Get a set of steps from URI path.
	 * 
	 * @access 		public
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 * 
	 * @param		integer	$offset		If offset is non-negative, the sequence 
	 * 									will start at that offset in the array. 
	 * 									If offset is negative, the sequence will 
	 * 									start that far from the end of the
	 * 									array.
	 * @param		integer	$length		If length is positive, then the sequence
	 * 									will have up to that many elements in 
	 * 									it. If the array is shorter than the 
	 * 									length, then only the available array 
	 * 									elements will be present. If length is 
	 * 									given and is negative then the sequence 
	 * 									will stop that many elements from the 
	 * 									end of the array. If it is null, then 
	 * 									the sequence will have everything from 
	 * 									offset up until the end of the array.
	 * @return		mixed	The step as a string if length is 1. Otherwise, an 
	 * 						array of steps as strings.
	 */
	public function get_step($offset, $length=1)
	{
		/**
		 * If the user doesn't want anything, don't bother.
		 */
		if ($length == 0) {
			return array();
		}

		/**
		 * Get the set of requested steps.
		 */
		$slice = array_slice($this->_URI_steps, $offset, $length);

		/**
		 * Determine if we should be returning a single item or an array.
		 */
		if (count($slice) === 1) {
			return $slice[0];
		}
		return $slice;
	}

	//--------------------------------------------------------------------------

	/**
	 * Get Steps
	 * 
	 * Captures the uri path and separates it out into steps.
	 * 
	 * @access 		private
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 */
	private function _get_steps()
	{
		/**
		 * Capture the whole request URI (this is everything after the domain)
		 */
		$uri = urldecode($_SERVER['REQUEST_URI']);

		/**
		 * Check to see if the request uri starts with the whole script location
		 * (this includes "index.php").
		 */
		if (strpos($uri, $_SERVER['SCRIPT_NAME']) === 0) {
			$uri = substr($uri, strlen($_SERVER['SCRIPT_NAME']));
		}
		/**
		 * If not, how about without the file (this is without "index.php").
		 */
		elseif (strpos($uri, dirname($_SERVER['SCRIPT_NAME'])) === 0) {
			$uri = substr($uri, strlen(dirname($_SERVER['SCRIPT_NAME'])));
		}
		/**
		 * If you still haven't got it, there's no point me giving it to you!
		 * /woman logic.
		 */
		else {
			throw new Exception('Unable to capture URI information.');			
		}

		/**
		 * $uri now holds everything after the script we are running, let's drop
		 * any query string off it.
		 */
		$parts = preg_split('/\?/', $uri);
		$uri = $parts[0];

		/**
		 * $uri now holds only the URI path. Strip starting and ending slashes 
		 * before we split it up.
		 */
		$uri = preg_replace('/^\/?(.*?)\/?$/', '$1', $uri);

		/**
		 * Split up the result and store it away.
		 */
		$this->_URI_steps = preg_split('/\//', $uri);
	}
}
