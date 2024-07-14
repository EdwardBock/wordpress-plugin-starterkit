<?php

namespace WordPressPluginStarterkit;


class Templates {

	/**
	 * @var null|string
	 */
	private $theme_dir = null;

	/**
	 * @var null|string
	 */
	private $template_paths_filter = null;

	/**
	 * @var null|string[]
	 */
	private $sub_dirs = null;
	private Plugin $plugin;

	public function __construct(Plugin $plugin) {
		$this->plugin = $plugin;
	}

	public function useThemeDirectory(string $dir){
		$this->theme_dir = $dir;
		return $this;
	}

	public function useAddTemplatePathsFilter(string $filter){
		$this->template_paths_filter = $filter;
		return $this;
	}

	/**
	 * Look for existing template path
	 * @return string|false
	 */
	function get_template_path( $template ) {

		// theme or child theme
		if ( $overridden_template = locate_template( $this->get_template_dirs($template) ) ) {
			return $overridden_template;
		}

		// parent theme
		foreach ($this->get_template_dirs($template) as $path){
			if( is_file( get_template_directory()."/$path")){
				return get_template_directory()."/$path";
			}
		}

		// other plugins
		$paths = [];
		if(is_string($this->template_paths_filter)){
			$paths = apply_filters($this->template_paths_filter, $paths);
		}

		// add default templates at last position
		$paths[] = $this->plugin->path . 'templates';
		// find templates
		foreach ($paths as $path){
			if(is_file("$path/$template")){
				return "$path/$template";
			}
		}

		// if nothing found...
		return false;
	}

	/**
	 * get array of possible template files in theme
	 * @param $template
	 *
	 * @return array
	 */
	function get_template_dirs($template){
		$dirs = [];
		if(is_string($this->theme_dir)){
			$dirs[] = $this->theme_dir."/".$template;
		}
		foreach ($this->get_sub_dirs() as $sub){
			$dirs[] = $sub.'/'.$template;
		}
		return $dirs;
	}

	/**
	 * paths for locate_template
	 * @return array
	 */
	function get_sub_dirs(){
		if($this->sub_dirs == null){
			$this->sub_dirs = [];
			$dirs = [];
			if(is_string($this->theme_dir)){
				$dirs = array_filter(glob(get_template_directory().'/'.$this->theme_dir.'/*'), 'is_dir');
			}
			foreach($dirs as $dir){
				$this->sub_dirs[] = str_replace(get_template_directory().'/', '', $dir);
			}
		}
		return $this->sub_dirs;
	}

}