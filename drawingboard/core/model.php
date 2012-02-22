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
 * Core Model
 *
 * This is the core model that all other models should inherit. 
 *
 * @package		DrawingBoard
 * @subpackage	Core
 * @category 	Controllers
 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
 * @since 		Version 0.1
 */
class Model extends PDO {

	/**
	 * Constructor
	 * 
	 * Initiates a PDO connection to the database.
	 * 
	 * @access 		public
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 */
	public function __construct()
	{
		/**
		 * Grab access to the Drawing Board instance.
		 */
		$DB =& global_DB();

		/**
		 * Pull in the details we need from the config.
		 */
		$type = $DB->config->db_type;
		$host = $DB->config->db_host;
		$name = $DB->config->db_name;
		$user = $DB->config->db_user;
		$pass = $DB->config->db_pass;

		/**
		 * Create a PDO connection to the database.
		 */
		parent::__construct("{$type}:host=${host};dbname=${name}", $user, $pass);
	}
}
