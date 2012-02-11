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
 * Index Controller
 *
 * This is the default controller included with DrawingBoard. Feel free to 
 * modify this controller or create your own.
 * 
 * This controller is called if there is no controller requested. If you want a 
 * different controller to assume this task, update the "default_controller"
 * option in the /application/config/config.php file.
 *
 * @package		DrawingBoard
 * @subpackage	Application
 * @category 	Controllers
 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
 * @since 		Version 0.1
 */
class Index extends Controller {

	/**
	 * Index Action
	 * 
	 * This is the default action doing little more than loading a welcome
	 * message. Feel free to modify this action or create your own.
	 * 
	 * This action is called if there is no other action requested. If you want
	 * a different action to assume this task, update the "default_action"
	 * option in the /application/config/config.php file.
	 *
	 * @access 		public
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 */
	function index_action()
	{
		$this->load->view('drawing_board');
	}
}
