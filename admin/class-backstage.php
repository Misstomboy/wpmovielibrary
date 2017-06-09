<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://wpmovielibrary.com
 * @since      3.0
 *
 * @package    WPMovieLibrary
 * @subpackage WPMovieLibrary/admin
 */

namespace wpmoly\Admin;

use wpmoly\Core\Assets;

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    WPMovieLibrary
 * @subpackage WPMovieLibrary/admin
 * @author     Charlie Merland <charlie@caercam.org>
 */
class Backstage extends Assets {

	/**
	 * Single instance.
	 *
	 * @var    Backstage
	 */
	private static $instance = null;

	/**
	 * Singleton.
	 * 
	 * @since    3.0
	 * 
	 * @return   \wpmoly\Admin\Backstage
	 */
	final public static function get_instance() {

		if ( ! isset( self::$instance ) ) {
			self::$instance = new static;
		}

		return self::$instance;
	}

	/**
	 * Register scripts.
	 *
	 * @since    3.0
	 *
	 * @return   null
	 */
	protected function register_scripts() {

		// Vendor
		$this->register_script( 'sprintf',           'public/js/sprintf.min.js', array( 'jquery', 'underscore' ), '1.0.3' );
		$this->register_script( 'underscore-string', 'public/js/underscore.string.min.js', array( 'jquery', 'underscore' ), '3.3.4' );

		// Base
		$this->register_script( 'core',  'public/js/wpmoly.js', array( 'jquery', 'underscore', 'backbone', 'wp-backbone', 'wp-api' ) );
		$this->register_script( 'utils', 'public/js/wpmoly-utils.js' );

		// Libraries
		$this->register_script( 'select2',                 'admin/js/select2.min.js' );
		$this->register_script( 'jquery-actual',           'admin/js/jquery.actual.min.js' );

		// Models
		$this->register_script( 'settings-model',          'admin/js/models/settings.js' );
		$this->register_script( 'status-model',            'admin/js/models/status.js' );
		$this->register_script( 'results-model',           'admin/js/models/results.js' );
		$this->register_script( 'search-model',            'admin/js/models/search.js' );
		$this->register_script( 'meta-model',              'admin/js/models/meta.js' );
		$this->register_script( 'modal-model',             'admin/js/models/modal/modal.js' );
		$this->register_script( 'image-model',             'admin/js/models/image.js' );
		$this->register_script( 'images-model',            'admin/js/models/images.js' );

		// Controllers
		$this->register_script( 'library-controller',      'admin/js/controllers/library.js' );
		$this->register_script( 'search-controller',       'admin/js/controllers/search.js' );
		$this->register_script( 'editor-controller',       'admin/js/controllers/editor.js' );
		$this->register_script( 'modal-controller',        'admin/js/controllers/modal.js' );

		// Views
		$this->register_script( 'frame-view',                     'public/js/views/frame.js' );
		$this->register_script( 'confirm-view',                   'public/js/views/confirm.js' );
		$this->register_script( 'permalinks-view',                'admin/js/views/permalinks.js' );
		$this->register_script( 'archive-pages-view',             'admin/js/views/archive-pages.js' );
		$this->register_script( 'metabox-view',                   'admin/js/views/metabox.js' );
		$this->register_script( 'library-view',                   'admin/js/views/library/library.js' );
		$this->register_script( 'library-menu-view',              'admin/js/views/library/menu.js' );
		$this->register_script( 'library-content-latest-view',    'admin/js/views/library/content-latest.js' );
		$this->register_script( 'library-content-favorites-view', 'admin/js/views/library/content-favorites.js' );
		$this->register_script( 'library-content-import-view',    'admin/js/views/library/content-import.js' );
		$this->register_script( 'search-view',                    'admin/js/views/search/search.js' );
		$this->register_script( 'search-history-view',            'admin/js/views/search/history.js' );
		$this->register_script( 'search-settings-view',           'admin/js/views/search/settings.js' );
		$this->register_script( 'search-status-view',             'admin/js/views/search/status.js' );
		$this->register_script( 'search-results-view',            'admin/js/views/search/results.js' );
		$this->register_script( 'editor-image-view',              'admin/js/views/editor/image.js' );
		$this->register_script( 'editor-images-view',             'admin/js/views/editor/images.js' );
		$this->register_script( 'editor-meta-view',               'admin/js/views/editor/meta.js' );
		$this->register_script( 'editor-details-view',            'admin/js/views/editor/details.js' );
		$this->register_script( 'editor-tagbox-view',             'admin/js/views/editor/tagbox.js' );
		$this->register_script( 'editor-view',                    'admin/js/views/editor/editor.js' );
		$this->register_script( 'modal-view',                     'admin/js/views/modal/modal.js' );
		$this->register_script( 'modal-images-view',              'admin/js/views/modal/images.js' );
		$this->register_script( 'modal-browser-view',             'admin/js/views/modal/browser.js' );
		$this->register_script( 'modal-post-view',                'admin/js/views/modal/post.js' );

		// Runners
		$this->register_script( 'library',       'admin/js/wpmoly-library.js' );
		$this->register_script( 'api',           'admin/js/wpmoly-api.js' );
		$this->register_script( 'metabox',       'admin/js/wpmoly-metabox.js' );
		$this->register_script( 'permalinks',    'admin/js/wpmoly-permalinks.js' );
		$this->register_script( 'archive-pages', 'admin/js/wpmoly-archive-pages.js' );
		$this->register_script( 'editor',        'admin/js/wpmoly-editor.js' );
		$this->register_script( 'grid-builder',  'admin/js/wpmoly-grid-builder.js', array( 'butterbean' ) );
		$this->register_script( 'grids',         'public/js/wpmoly-grids.js' );
		$this->register_script( 'search',        'admin/js/wpmoly-search.js' );
		$this->register_script( 'tester',        'admin/js/wpmoly-tester.js' );
	}

	/**
	 * Register stylesheets.
	 *
	 * @since    3.0
	 *
	 * @return   null
	 */
	protected function register_styles() {

		$this->register_style( 'admin',         'admin/css/wpmoly.css' );
		$this->register_style( 'library',       'admin/css/wpmoly-library.css' );
		$this->register_style( 'metabox',       'admin/css/wpmoly-metabox.css' );
		$this->register_style( 'permalinks',    'admin/css/wpmoly-permalink-settings.css' );
		$this->register_style( 'term-editor',   'admin/css/wpmoly-term-editor.css' );
		$this->register_style( 'archive-pages', 'admin/css/wpmoly-archive-pages.css' );
		$this->register_style( 'grid-builder',  'admin/css/wpmoly-grid-builder.css' );

		$this->register_style( 'font',          'public/fonts/wpmovielibrary/style.css' );
		$this->register_style( 'common',        'public/css/common.css' );
		$this->register_style( 'grids',         'public/css/wpmoly-grids.css' );
		$this->register_style( 'select2',       'admin/css/select2.min.css' );
	}

	/**
	 * Register templates.
	 *
	 * @since    3.0
	 *
	 * @return   null
	 */
	protected function register_templates() {

		global $hook_suffix;

		if ( 'toplevel_page_wpmovielibrary' == $hook_suffix ) {
			$this->register_template( 'library-menu',              'admin/js/templates/library/menu.php' );
			$this->register_template( 'library-content-latest',    'admin/js/templates/library/content-latest.php' );
			$this->register_template( 'library-content-favorites', 'admin/js/templates/library/content-favorites.php' );
			$this->register_template( 'library-content-import',    'admin/js/templates/library/content-import.php' );
			$this->register_template( 'library-sidebar',           'admin/js/templates/library/sidebar.php' );
			$this->register_template( 'library-footer',            'admin/js/templates/library/footer.php' );
		}

		if ( 'movie' == get_post_type() ) {
			$this->register_template( 'search',                'admin/js/templates/search/search.php' );
			$this->register_template( 'search-form',           'admin/js/templates/search/search-form.php' );
			$this->register_template( 'search-settings',       'admin/js/templates/search/settings.php' );
			$this->register_template( 'search-status',         'admin/js/templates/search/status.php' );
			$this->register_template( 'search-history',        'admin/js/templates/search/history.php' );
			$this->register_template( 'search-history-item',   'admin/js/templates/search/history-item.php' );
			$this->register_template( 'search-result',         'admin/js/templates/search/result.php' );
			$this->register_template( 'search-results',        'admin/js/templates/search/results.php' );
			$this->register_template( 'search-results-header', 'admin/js/templates/search/results-header.php' );
			$this->register_template( 'search-results-menu',   'admin/js/templates/search/results-menu.php' );

			$this->register_template( 'editor-image-editor',   'admin/js/templates/editor/image-editor.php' );
			$this->register_template( 'editor-image-more',     'admin/js/templates/editor/image-more.php' );
			$this->register_template( 'editor-image',          'admin/js/templates/editor/image.php' );

			$this->register_template( 'modal-browser',         'admin/js/templates/modal/browser.php' );
			$this->register_template( 'modal-sidebar',         'admin/js/templates/modal/sidebar.php' );
			$this->register_template( 'modal-toolbar',         'admin/js/templates/modal/toolbar.php' );
			$this->register_template( 'modal-image',           'admin/js/templates/modal/image.php' );
			$this->register_template( 'modal-selection',       'admin/js/templates/modal/selection.php' );

			$this->register_template( 'confirm-modal',         'public/js/templates/confirm.php' );
		}

		if ( 'grid' == get_post_type() ) {
			$this->register_template( 'grid',                     'public/js/templates/grid/grid.php' );
			$this->register_template( 'grid-menu',                'public/js/templates/grid/menu.php' );
			$this->register_template( 'grid-customs',             'public/js/templates/grid/customs.php' );
			$this->register_template( 'grid-settings',            'public/js/templates/grid/settings.php' );
			$this->register_template( 'grid-pagination',          'public/js/templates/grid/pagination.php' );

			$this->register_template( 'grid-movie-grid',           'public/templates/grids/content/movie-grid.php' );
			$this->register_template( 'grid-movie-grid-variant-1', 'public/templates/grids/content/movie-grid-variant-1.php' );
			$this->register_template( 'grid-movie-grid-variant-2', 'public/templates/grids/content/movie-grid-variant-2.php' );
			$this->register_template( 'grid-movie-list',           'public/templates/grids/content/movie-list.php' );
			$this->register_template( 'grid-movie-archive',        'public/templates/grids/content/movie-archive.php' );
			$this->register_template( 'grid-actor-grid',           'public/templates/grids/content/actor-grid.php' );
			$this->register_template( 'grid-actor-list',           'public/templates/grids/content/actor-list.php' );
			$this->register_template( 'grid-collection-grid',      'public/templates/grids/content/collection-grid.php' );
			$this->register_template( 'grid-collection-list',      'public/templates/grids/content/collection-list.php' );
			$this->register_template( 'grid-genre-grid',           'public/templates/grids/content/genre-grid.php' );
			$this->register_template( 'grid-genre-list',           'public/templates/grids/content/genre-list.php' );

			$this->register_template( 'grid-movie-archive',        'public/templates/headboxes/movie-default.php' );
		}
	}

	/**
	 * Enqueue the JavaScript for the admin area.
	 * 
	 * @since    3.0
	 * 
	 * @return   null
	 */
	public function enqueue_scripts() {

		global $hook_suffix;

		$this->register_scripts();

		if ( 'toplevel_page_wpmovielibrary' == $hook_suffix ) {

			// Vendor
			$this->enqueue_script( 'sprintf' );
			$this->enqueue_script( 'underscore-string' );

			// Base
			$this->enqueue_script( 'core' );

			// Models

			// Controllers
			$this->enqueue_script( 'library-controller' );

			// Views
			$this->enqueue_script( 'library-view' );
			$this->enqueue_script( 'library-menu-view' );
			$this->enqueue_script( 'library-content-latest-view' );
			$this->enqueue_script( 'library-content-favorites-view' );
			$this->enqueue_script( 'library-content-import-view' );

			// Runners
			$this->enqueue_script( 'library' );
		}

		if ( 'options-permalink.php' == $hook_suffix ) {

			// Vendor
			$this->enqueue_script( 'sprintf' );
			$this->enqueue_script( 'underscore-string' );

			// Base
			$this->enqueue_script( 'core' );

			// Metabox
			$this->enqueue_script( 'metabox-view' );
			$this->enqueue_script( 'metabox' );

			// Permalinks
			$this->enqueue_script( 'permalinks-view' );
			$this->enqueue_script( 'permalinks' );
		}

		if ( ( 'post.php' == $hook_suffix || 'post-new.php' == $hook_suffix ) && 'movie' == get_post_type() ) {

			// Vendor
			$this->enqueue_script( 'sprintf' );
			$this->enqueue_script( 'underscore-string' );

			// Base
			$this->enqueue_script( 'core' );
			$this->enqueue_script( 'utils' );

			// Models
			$this->enqueue_script( 'settings-model' );
			$this->enqueue_script( 'status-model' );
			$this->enqueue_script( 'results-model' );
			$this->enqueue_script( 'search-model' );
			$this->enqueue_script( 'meta-model' );
			$this->enqueue_script( 'modal-model' );
			$this->enqueue_script( 'image-model' );
			$this->enqueue_script( 'admin-image-model' );
			$this->enqueue_script( 'images-model' );

			// Controllers
			$this->enqueue_script( 'search-controller' );
			$this->enqueue_script( 'editor-controller' );
			$this->enqueue_script( 'modal-controller' );

			// Views
			$this->enqueue_script( 'frame-view' );
			$this->enqueue_script( 'confirm-view' );
			$this->enqueue_script( 'metabox-view' );
			$this->enqueue_script( 'search-view' );
			$this->enqueue_script( 'search-history-view' );
			$this->enqueue_script( 'search-settings-view' );
			$this->enqueue_script( 'search-status-view' );
			$this->enqueue_script( 'search-results-view' );
			$this->enqueue_script( 'editor-image-view' );
			$this->enqueue_script( 'editor-images-view' );
			$this->enqueue_script( 'editor-meta-view' );
			$this->enqueue_script( 'editor-details-view' );
			$this->enqueue_script( 'editor-tagbox-view' );
			$this->enqueue_script( 'editor-view' );
			$this->enqueue_script( 'modal-view' );
			$this->enqueue_script( 'modal-images-view' );
			$this->enqueue_script( 'modal-browser-view' );
			$this->enqueue_script( 'modal-post-view' );

			// Runners
			$this->enqueue_script( 'api' );
			$this->enqueue_script( 'metabox' );
			$this->enqueue_script( 'editor' );
			$this->enqueue_script( 'search' );
			$this->enqueue_script( 'tester' );

			// Libraries
			$this->enqueue_script( 'select2' );
			$this->enqueue_script( 'jquery-actual' );
		}

		if ( ( 'post.php' == $hook_suffix || 'post-new.php' == $hook_suffix ) && 'grid' == get_post_type() ) {

			// Vendor
			$this->enqueue_script( 'sprintf' );
			$this->enqueue_script( 'underscore-string' );
			$this->enqueue_script( 'wp-backbone' );

			// Base
			$this->enqueue_script( 'core' );
			$this->enqueue_script( 'utils' );

			// Libraries
			$this->enqueue_script( 'select2' );

			// Runners
			$this->enqueue_script( 'grids' );
			$this->enqueue_script( 'grid-builder' );
		}

		if ( ( 'post.php' == $hook_suffix || 'post-new.php' == $hook_suffix ) && 'page' == get_post_type() ) {

			// Vendor
			$this->enqueue_script( 'sprintf' );
			$this->enqueue_script( 'underscore-string' );
			$this->enqueue_script( 'wp-backbone' );

			// Base
			$this->enqueue_script( 'core' );
			$this->enqueue_script( 'utils' );

			// Views
			$this->enqueue_script( 'archive-pages-view' );

			// Runners
			$this->enqueue_script( 'archive-pages' );
		}
	}

	/**
	 * Enqueue the stylesheets for the admin area.
	 *
	 * @since    3.0
	 *
	 * @return   null
	 */
	public function enqueue_styles() {

		global $hook_suffix;

		$this->register_styles();

		$this->enqueue_style( 'admin' );
		$this->enqueue_style( 'font' );
		$this->enqueue_style( 'common' );
		$this->enqueue_style( 'grids' );
		$this->enqueue_style( 'select2' );

		if ( 'toplevel_page_wpmovielibrary' == $hook_suffix ) {
			$this->enqueue_style( 'library' );
		}

		if ( 'options-permalink.php' == $hook_suffix ) {
			$this->enqueue_style( 'metabox' );
			$this->enqueue_style( 'permalinks' );
		}

		if ( ( 'post.php' == $hook_suffix || 'post-new.php' == $hook_suffix ) && 'grid' == get_post_type() ) {
			$this->enqueue_style( 'grid-builder' );
		}

		if ( ( 'post.php' == $hook_suffix || 'post-new.php' == $hook_suffix ) && 'page' == get_post_type() ) {
			$this->enqueue_style( 'archive-pages' );
		}

		if ( 'term.php' == $hook_suffix || 'edit-tags.php' == $hook_suffix ) {
			$this->enqueue_style( 'term-editor' );
		}
	}

	/**
	 * Print the JavaScript templates for the admin area.
	 *
	 * @since    3.0
	 *
	 * @return   null
	 */
	public function enqueue_templates() {

		global $hook_suffix;

		$this->register_templates();

		if ( 'toplevel_page_wpmovielibrary' == $hook_suffix ) {
			$this->enqueue_template( 'library-menu',              'admin/js/templates/library/menu.php' );
			$this->enqueue_template( 'library-content-latest',    'admin/js/templates/library/content-latest.php' );
			$this->enqueue_template( 'library-content-favorites', 'admin/js/templates/library/content-favorites.php' );
			$this->enqueue_template( 'library-content-import',    'admin/js/templates/library/content-import.php' );
			$this->enqueue_template( 'library-sidebar',           'admin/js/templates/library/sidebar.php' );
			$this->enqueue_template( 'library-footer',            'admin/js/templates/library/footer.php' );
		}

		if ( 'movie' == get_post_type() ) {
			$this->enqueue_template( 'search',                'admin/js/templates/search/search.php' );
			$this->enqueue_template( 'search-form',           'admin/js/templates/search/search-form.php' );
			$this->enqueue_template( 'search-settings',       'admin/js/templates/search/settings.php' );
			$this->enqueue_template( 'search-status',         'admin/js/templates/search/status.php' );
			$this->enqueue_template( 'search-history',        'admin/js/templates/search/history.php' );
			$this->enqueue_template( 'search-history-item',   'admin/js/templates/search/history-item.php' );
			$this->enqueue_template( 'search-result',         'admin/js/templates/search/result.php' );
			$this->enqueue_template( 'search-results',        'admin/js/templates/search/results.php' );
			$this->enqueue_template( 'search-results-header', 'admin/js/templates/search/results-header.php' );
			$this->enqueue_template( 'search-results-menu',   'admin/js/templates/search/results-menu.php' );

			$this->enqueue_template( 'editor-image-editor',   'admin/js/templates/editor/image-editor.php' );
			$this->enqueue_template( 'editor-image-more',     'admin/js/templates/editor/image-more.php' );
			$this->enqueue_template( 'editor-image',          'admin/js/templates/editor/image.php' );

			$this->enqueue_template( 'modal-browser',         'admin/js/templates/modal/browser.php' );
			$this->enqueue_template( 'modal-sidebar',         'admin/js/templates/modal/sidebar.php' );
			$this->enqueue_template( 'modal-toolbar',         'admin/js/templates/modal/toolbar.php' );
			$this->enqueue_template( 'modal-image',           'admin/js/templates/modal/image.php' );
			$this->enqueue_template( 'modal-selection',       'admin/js/templates/modal/selection.php' );

			$this->enqueue_template( 'confirm-modal',         'public/js/templates/confirm.php' );
		}

		if ( 'grid' == get_post_type() ) {
			$this->enqueue_template( 'grid',                   'public/js/templates/grid/grid.php' );
			$this->enqueue_template( 'grid-menu',              'public/js/templates/grid/menu.php' );
			$this->enqueue_template( 'grid-customs',           'public/js/templates/grid/customs.php' );
			$this->enqueue_template( 'grid-settings',          'public/js/templates/grid/settings.php' );
			$this->enqueue_template( 'grid-pagination',        'public/js/templates/grid/pagination.php' );

			$this->enqueue_template( 'grid-movie-grid',         wpmoly_get_js_template( 'grids/content/movie-grid.php' ) );
			$this->enqueue_template( 'grid-movie-grid-variant-1', wpmoly_get_js_template( 'grids/content/movie-grid-variant-1.php' ) );
			$this->enqueue_template( 'grid-movie-grid-variant-2', wpmoly_get_js_template( 'grids/content/movie-grid-variant-2.php' ) );
			$this->enqueue_template( 'grid-movie-list',         wpmoly_get_js_template( 'grids/content/movie-list.php' ) );
			$this->enqueue_template( 'grid-actor-grid',         wpmoly_get_js_template( 'grids/content/actor-grid.php' ) );
			$this->enqueue_template( 'grid-actor-list',         wpmoly_get_js_template( 'grids/content/actor-list.php' ) );
			$this->enqueue_template( 'grid-collection-grid',    wpmoly_get_js_template( 'grids/content/collection-grid.php' ) );
			$this->enqueue_template( 'grid-collection-list',    wpmoly_get_js_template( 'grids/content/collection-list.php' ) );
			$this->enqueue_template( 'grid-genre-grid',         wpmoly_get_js_template( 'grids/content/genre-grid.php' ) );
			$this->enqueue_template( 'grid-genre-list',         wpmoly_get_js_template( 'grids/content/genre-list.php' ) );
		}
	}

	/**
	 * Plugged on the 'admin_init' action hook.
	 *
	 * This is a workaround for adding images from URL to the Media Uploader.
	 *
	 * Filter the $_FILES array before it reaches the 'upload-attachment'
	 * Ajax callback to fix the filename. PlUpload send data with filename
	 * containing 'blob', causing errors as WordPress is --and shouldn't--
	 * using that value to check files names and extensions.
	 *
	 * @since    3.0
	 *
	 * @return   void
	 */
	public function admin_init() {

		if ( ! defined( 'DOING_AJAX' ) || true !== DOING_AJAX ) {
			return false;
		}

		if ( ! empty( $_FILES['async-upload']['name'] ) && 'blob' == $_FILES['async-upload']['name'] ) {
			if ( ! empty( $_REQUEST['name'] ) && ( ! empty( $_REQUEST['_wpmoly_nonce'] ) && wp_verify_nonce( $_REQUEST['_wpmoly_nonce'], 'wpmoly-blob-filename' ) ) ) {
				$_FILES['async-upload']['name'] = $_REQUEST['name'];
			}
		}
	}

	/**
	 * Plugged on the 'admin_menu' action hook.
	 *
	 * Register the backstage library page.
	 *
	 * @since    3.0
	 *
	 * @return   void
	 */
	public function admin_menu() {

		$library = Library::get_instance();

		$menu_page = add_menu_page(
			$page_title = __( 'Movie Library' , 'wpmovielibrary' ),
			$menu_title = __( 'Movie Library' , 'wpmovielibrary' ),
			$capability = 'read',
			$menu_slug  = 'wpmovielibrary',
			$function   = array( $library, 'build' ),
			$icon_url   = 'dashicons-wpmoly',
			$position   = 2
		);
	}

	/**
	 * Plugged on the 'admin_menu' action hook.
	 *
	 * Add taxonomies menu entries to the custom admin menu.
	 *
	 * @since    3.0
	 *
	 * @return   void
	 */
	public function admin_submenu() {

		add_submenu_page( 'wpmovielibrary', __( 'Actors', 'wpmovielibrary' ), __( 'Actors', 'wpmovielibrary' ), 'manage_options', 'edit-tags.php?taxonomy=actor&post_type=movie' );
		add_submenu_page( 'wpmovielibrary', __( 'Collections', 'wpmovielibrary' ), __( 'Collections', 'wpmovielibrary' ), 'manage_options', 'edit-tags.php?taxonomy=collection&post_type=movie' );
		add_submenu_page( 'wpmovielibrary', __( 'Genres', 'wpmovielibrary' ), __( 'Genres', 'wpmovielibrary' ), 'manage_options', 'edit-tags.php?taxonomy=genre&post_type=movie' );
	}

	/**
	 * Add a custom nonce the default settings for PlUpload.
	 *
	 * @since    3.0
	 *
	 * @param    array    $params
	 *
	 * @return   array
	 */
	public function plupload_default_params( $params ) {

		global $pagenow;

		if ( ( empty( $pagenow ) || 'post.php' != $pagenow ) || 'movie' != get_post_type() ) {
			return $params;
		}

		$params['_wpmoly_nonce'] = wp_create_nonce( 'wpmoly-blob-filename' );

		return $params;
	}
}
