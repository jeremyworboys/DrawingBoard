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
 * Loader
 *
 * Handles the loading of application classes and libraries into the
 * application.
 *
 * @package		Sketch
 * @subpackage	Core
 * @category 	Loader
 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
 * @since 		Version 0.1
 */
class Loader {

	/**
	 * Holds an array of loaded classes.
	 * 
	 * @access 		private
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 * 
	 * @var 		array
	 */
	private $_loaded = array();

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
	{}

	//--------------------------------------------------------------------------

	/**
	 * Load Model
	 * 
	 * Loads a model returns its instance by reference. Holds a cache of 
	 * instantiated classes so loading only actually occurs the first time they
	 * are requested.
	 * 
	 * @access 		public
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 *
	 * @param  		string 	$model_name	The name of the model to load/retrieve.
	 * @param  		string 	$alias		The name the model is returned as.
	 * @return 		object 	Reference to the requested model.
	 */
	public function model($model_name, $alias='')
	{

	}

	//--------------------------------------------------------------------------

	/**
	 * Load View
	 * 
	 * Loads a view passing the values from $params as variables to be used. 
	 * Will either output the contents to the browser (default) or return the 
	 * contents as a string determined by $output.
	 * 
	 * @access 		public
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 *
	 * @param  		string	$view_name	The name of the model to load/retrieve.
	 * @param  		array	$params		An assoc array of variable names => 
	 * 									values to be passed to the view.
	 * @param  		bool	$output		Whether the contents should output to 
	 * 									the browser or returned as a string.
	 * @return 		string 	The contents of the view file if $output=true 
	 * 						otherwise nothing is returned.
	 */
	public function view($view_name, $params=array(), $output=true)
	{

	}
}
