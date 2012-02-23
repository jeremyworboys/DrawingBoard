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
 * Protected Controller
 *
 * This is a core controller that can be subclassed for areas that can only be 
 * accessed by authenticated users.
 *
 * @package		DrawingBoard
 * @subpackage	Core
 * @category 	Controllers
 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
 * @since 		Version 0.1
 */
class Protected_controller extends Controller {

	/**
	 * Authentication
	 * 
	 * Holds information related to the user's authentication status.
	 * 
	 * @access 		public
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 * 
	 * @var			object	Information about the user's authentication.
	 */
	public $authentication;

	//--------------------------------------------------------------------------

	/**
	 * Constructor
	 * 
	 * Loads in needed configuration and then starts an authentication check.
	 * 
	 * @access 		public
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 */
	public function __construct()
	{
		parent::__construct();

		/**
		 * Reset authentication property
		 */
		$this->authentication = new stdClass();
		$this->authentication->authenticated = false;

		/**
		 * If the user is not authenticated, throw control over to a handle
		 * method that you can be overridden in custom controllers.
		 */
		if (!$this->_check_authentication()) {
			$this->_clear_authenticated();
			$this->_not_authenticated();
		}
		$this->_update_authentication();
	}

	//--------------------------------------------------------------------------

	/**
	 * Check Authentication
	 * 
	 * Tests to see if the user is authenticated.
	 * 
	 * This method is available to be overridden as a custom callback.
	 * 
	 * @access 		protected
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 * 
	 * @return		bool	Whether the authentication check was successful or 
	 * 						not.
	 */
	protected function _check_authentication()
	{
		
	}

	//--------------------------------------------------------------------------

	/**
	 * Not Authenticated
	 * 
	 * Redirects a non-authenticated user to the login page.
	 * 
	 * This method is available to be overridden as a custom callback.
	 * 
	 * @access 		protected
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 */
	protected function _not_authenticated()
	{
		
	}

	//--------------------------------------------------------------------------

	/**
	 * Update Authentication
	 * 
	 * Updates session expiration times.
	 * 
	 * This method is available to be overridden as a custom callback.
	 * 
	 * @access 		protected
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 */
	protected function _update_authentication()
	{
		
	}

	//--------------------------------------------------------------------------

	/**
	 * Clear Authentication
	 * 
	 * Removes any session data on logout or failed authentication check.
	 * 
	 * This method is available to be overridden as a custom callback.
	 * 
	 * @access 		protected
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 */
	protected function _clear_authentication()
	{

	}
}
