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
 * Loader
 *
 * Handles the loading of application classes and libraries into the
 * application.
 *
 * @package		DrawingBoard
 * @subpackage	Core
 * @category 	Loader
 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
 * @since 		Version 0.1
 */
class Loader {

	/**
	 * Holds an array of loaded models.
	 * 
	 * @access 		private
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 * 
	 * @var 		array
	 */
	private $_models = array();

	//--------------------------------------------------------------------------

	/**
	 * Holds an array of loaded models.
	 * 
	 * @access 		private
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 * 
	 * @var 		array
	 */
	private $_helpers = array();

	//--------------------------------------------------------------------------

	/**
	 * Caches the $params passed to a view so child views can access them.
	 * 
	 * @access 		private
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 * 
	 * @var 		array
	 */
	private $_cached_params = array();

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
		// Load autoload stuff
	}

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
		/**
		 * First we should make sure we haven't already loaded the model. If we 
		 * have the controller will already have access to it.
		 */
		if (!isset($this->_models[$model_name])) {
			/**
			 * Check if the model file exists.
			*/
			$model_path = APP_PATH."models/{$model_name}.php";
			if (file_exists($model_path)) {
				require_once $model_path;
			}
			else { throw new Exception("Requested model does not exist: {$model_path}"); }

			/**
			 * Ensure the model is properly structured then load it into the 
			 * cache.
			*/
			if (class_exists($model)) {
				$this->_models[$model_name] = new $model();
			}
			else { throw new Exception("Requested model is invalid: {$model_path}"); }
		}
		
		/**
		 * Now that we're sure it is loaded, we better make sure the alias is 
		 * set.
		 */
		$alias = ($alias) ? $alias : $model_name;

		/**
		 * Finally we attach the loaded model to the controller with the 
		 * requested alias.
		 */
		$this->$alias =& $this->_models[$model_name];
	}

	//--------------------------------------------------------------------------

	/**
	 * Load Helper
	 * 
	 * Loads a helper giving you access to all the juicy function-y goodness
	 * contained within.
	 * 
	 * @access 		public
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 *
	 * @param  		string 	$helper_name	The name of the helper to load.
	 */
	public function helper($model_name)
	{
		
	}

	//--------------------------------------------------------------------------

	/**
	 * Load View
	 * 
	 * Loads a view passing the values from $params as variables to be used. 
	 * Will either output the contents to the browser (default) or return the 
	 * contents as a string determined by $return.
	 * 
	 * @access 		public
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 *
	 * @param  		string	$view_name	The name of the model to load/retrieve.
	 * @param  		array	$params		An assoc array of variable names => 
	 * 									values to be passed to the view.
	 * @param  		bool	$return		Whether the contents should output to 
	 * 									the browser or returned as a string.
	 * @return 		string 	The contents of the view file if $return=true 
	 * 						otherwise nothing is returned.
	 */
	public function view($view_name, $params=array(), $return=false)
	{
		/**
		 * First off we better make sure that the view file exists.
		 */
		$view_path = APP_PATH."views/{$view_name}.php";
		if (!file_exists($view_path)) {
			throw new Exception("Unable to find view to render: {$view_path}");
		}

		/**
		 * If $params is an object, let's quietly swap it over to an array.
		 */
		$params = is_object($params) ? get_params_vars($params) : $params;

		/**
		 * If $params is not an array yet I'm gonna have to stop you there.
		 */
		if (!is_array($params)) {
			throw new Exception("View params must be an array. Encountered: ".gettype($params));
		}

		/**
		 * Before we roll into the scope let's update the param cache so we will
		 * have access to them.
		 */
		$this->_cached_params = array_merge($this->_cached_params, $params);

		/**
		 * Do the actual extracting of params and including of the file within 
		 * a scoped environment to prevent variable collisions.
		 */
		return $this->_scoped_include($view_path, $return);
	}

	//--------------------------------------------------------------------------

	/**
	 * Scoped Include
	 * 
	 * Actually loads a requested view file in but (as best as possible) scopes 
	 * out any other variables.
	 * 
	 * Required variables (view_path, return) are surrounded by double 
	 * underscores to prevent collision with extracted params.
	 * 
	 * @see			view()
	 * @access 		private
	 * @since 		Version 0.1
	 * @author		Jeremy Worboys <jeremy@complexcompulsions.com>
	 *
	 * @param  		string	$__view_path__	The verified path of the view to 
	 * 										load.
	 * @param  		bool	$__output__		Whether the contents should output  
	 * 										to the browser or returned as a 
	 * 										string.
	 * @return 		string 	The contents of the view file if $return is true 
	 * 						otherwise nothing is returned.
	 */
	private function _scoped_include($__view_path__, $__return__)
	{
		/**
		 * Pull the DrawingBoard global instance in so the view can access it.
		 */
		$DrawingBoard =& global_DB();

		/**
		 * Create variables from $params for the view to access.
		 */
		extract($this->_cached_params);

		/**
		 * Start buffering the return so we can return it if we need to.
		 */
		ob_start();

		/**
		 * Pull in the view file and render its contents to the buffer.
		 * 
		 * Consider a short tag (<?= ... ?>) replacement and/or a template
		 * system.
		 */
		include $__view_path__;

		/**
		 * If the controller wants the view data we better let him have it. He 
		 * is the controller after all.
		 */
		if ($__return__) {
			$view_data = ob_get_contents();
			@ob_end_clean();
			return $view_data;
		}

		/**
		 * Flush the buffer to the browser.
		 */ 
		ob_end_flush();
	}
}
