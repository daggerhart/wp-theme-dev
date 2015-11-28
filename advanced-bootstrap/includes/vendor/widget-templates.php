<?php
/**
 * Class Sweet_Widgets_Templates
 * @link https://github.com/daggerhart/sweet-widgets
 *
 * Filters:
 *      - sweet_widgets_templates-folder
 *      - sweet_widgets_templates-replacements
 *      - sweet_widgets_templates-suggestions
 */
if ( !defined('ABSPATH') ) die();

if ( ! class_exists('Sweet_Widgets_Templates') ) :
	class Sweet_Widgets_Templates {

		public $version = '0.0.1';

		// subdirectory in theme where widget templates are kept
		public $folder = 'widgets';

		/**
		 * Instantiate and hook plugin into WordPress
		 */
		static function register(){
			$plugin = new self();
			$plugin->folder = apply_filters( 'sweet_widgets_templates-folder', $plugin->folder );

			add_action( 'in_widget_form', array( $plugin, 'in_widget_form' ), 20, 3 );
			add_filter( 'widget_update_callback', array( $plugin, 'widget_update_callback' ), 20 , 4 );
			add_filter( 'widget_display_callback', array( $plugin, 'widget_display_callback' ), 20, 3 );
		}

		/**
		 * Allow user to specify a template per widget
		 *
		 * Action: in_widget_form
		 *
		 * @see WP_Widget::form_callback()
		 *
		 * @param $widget
		 * @param $return
		 * @param $instance
		 */
		function in_widget_form( &$widget, &$return, $instance ){
			$sweet_widgets_template = isset( $instance['sweet_widgets_template'] ) ? esc_attr( $instance['sweet_widgets_template'] ) : '';
			?>
			<div class="sweet-widget-templates">
				<p>
					<label for="<?php echo $widget->get_field_id( 'sweet_widgets_template' ); ?>">
						<strong><?php _e( 'Sweet Widget Template' ); ?></strong>
					</label>
					<select
						id="<?php echo $widget->get_field_id( 'sweet_widgets_template' ); ?>"
						class="widefat"
						name="<?php echo $widget->get_field_name( 'sweet_widgets_template' ); ?>">
						<?php foreach( $this->get_widget_template_options() as $value => $text ) : ?>
							<option
								value="<?php echo esc_attr( $value ); ?>"
								<?php selected( $value, $sweet_widgets_template ); ?>>
								<?php echo esc_attr( $text ); ?>
							</option>
						<?php endforeach; ?>
					</select>
					<?php $this->get_widget_templates(); ?>
				</p>
				<p class="help">
					<?php _e( 'Select the preferred template for this widget. If "Default" is selected, the widget will use the next available template in the hierarchy.' ); ?>
					<?php printf( __( "Widget ID: %s" ), $widget->id ); ?>
				</p>
			</div>
			<?php
			//
		}

		/**
		 * Save our custom widget data
		 *
		 * Filter: widget_update_callback
		 *
		 * @see WP_Widget::update_callback()
		 *
		 * @param $instance
		 * @param $new_instance
		 * @param $old_instance
		 * @param $widget
		 *
		 * @return mixed
		 */
		function widget_update_callback( $instance, $new_instance, $old_instance, $widget ) {
			$instance['sweet_widgets_template'] = isset( $new_instance['sweet_widgets_template'] ) ? $new_instance['sweet_widgets_template'] : '';

			return $instance;
		}

		/**
		 * Look for templates and hijack the widget display process if found.
		 *
		 * Filter: widget_display_callback
		 *
		 * @see WP_Widget::display_callback()
		 *
		 * @param $instance
		 * @param $widget
		 * @param $args
		 *
		 * @return mixed
		 */
		function widget_display_callback( $instance, $widget, $args ){
			// make a list of template suggestions
			$suggestions = $this->get_template_suggestions( $instance, $widget, $args );

			// look for suggested templates, and handle the first one found
			$template = locate_template( $suggestions );

			if ( $template ){
				// We have a custom template, now we need to setup some data for
				// the template to use, then load it.
				$this->setup_widget_template_data( $instance, $widget, $args );

				// execute the widget
				load_template( $template, false );

				// set instance to false to short circuit the normal process
				$instance = false;

				// clean up any previous widget data stored in the query_vars
				$this->reset_query_vars();
			}

			return $instance;
		}

		/**
		 * Util: Build an array of possible template suggestions
		 *
		 * @param $instance
		 * @param $widget
		 * @param $args
		 *
		 * @return array
		 */
		function get_template_suggestions( $instance, $widget, $args ){
			$suggestions = array();

			// if the widget has specified a template, look for it first.
			if ( isset( $instance['sweet_widgets_template'] ) && ! empty( $instance['sweet_widgets_template'] ) ) {
				$suggestions[] = esc_attr( $instance['sweet_widgets_template'] );
			}

			$replacements = array(
				'{sidebar-id}' => $args['id'],
				'{widget-id}' => $widget->id,
			);

			// allow other sources to alter the available replacement pairs
			$replacements = apply_filters( 'sweet_widgets_templates-replacements', $replacements, $instance, $widget, $args );

			$suggestions[] = '{sidebar-id}--{widget-id}';
			$suggestions[] = '{sidebar-id}--default';
			$suggestions[] = '{widget-id}';
			$suggestions[] = 'widget--default';

			// allow other sources to alter the suggestion patterns
			$suggestions = apply_filters( 'sweet_widgets_templates-suggestions', $suggestions, $instance, $widget, $args );

			// prepare templates
			foreach( $suggestions as $i => &$suggestion ){
				$suggestion = $this->folder . '/' . strtr( $suggestion, $replacements ) . '.php';
			}

			return $suggestions;
		}

		/**
		 * Util: Execute the widget and set its data as values of the global
		 * $wp_query->query_vars array.
		 *
		 * @param $instance
		 * @param $widget
		 * @param $args
		 */
		function setup_widget_template_data( $instance, $widget, $args ){
			// alter the parameters
			$temp_args = array_replace( $args, array(
				'before_widget' => '',
				'before_title' => '',
				'after_title' => '<!--sweet-widget-templates-break-->',
				'after_widget' => '',
			) );

			// execute the widget and capture its output into separate 'title'
			// and 'content' data
			ob_start();
				$this->override_widget_display( $instance, $widget, $temp_args );
			$document = ob_get_clean();
			$document = explode( '<!--sweet-widget-templates-break-->', $document );

			// default values to null
			$widget_title = $widget_content = null;

			if ( count( $document ) === 1 ){
				// there is only content, no title
				$widget_content = $document[0];
			}
			else {
				$widget_title = $document[0];
				$widget_content = $document[1];
			}

			// add our data to the query vars for later extraction into scope of loaded template
			set_query_var( 'widget_title', $widget_title );
			set_query_var( 'widget_content', $widget_content );
			set_query_var( 'widget_instance', $instance );
			set_query_var( 'widget_object', $widget );
			set_query_var( 'widget_args', $args );
			set_query_var( 'widget_id', $widget->id );
			set_query_var( 'widget_classname', $widget->widget_options['classname'] );
		}

		/**
		 * Util: Reset the query vars this plugin uses so they don't leak
		 */
		function reset_query_vars(){
			// add our data to the query vars for later extraction into scope of loaded template
			set_query_var( 'widget_title', null );
			set_query_var( 'widget_content', null );
			set_query_var( 'widget_instance', null );
			set_query_var( 'widget_object', null );
			set_query_var( 'widget_args', null );
			set_query_var( 'widget_id', null );
			set_query_var( 'widget_classname', null );
		}

		/**
		 * Util: Execute the widget as would normally happen had we not
		 * short-circuited the default process.
		 *
		 * @see WP_Widget::display_callback()
		 *
		 * @param $instance
		 * @param $widget
		 * @param $args
		 */
		function override_widget_display( $instance, $widget, $args ){
			$was_cache_addition_suspended = wp_suspend_cache_addition();
			if ( $widget->is_preview() && ! $was_cache_addition_suspended ) {
				wp_suspend_cache_addition( true );
			}

			$widget->widget( $args, $instance );

			if ( $widget->is_preview() ) {
				wp_suspend_cache_addition( $was_cache_addition_suspended );
			}
		}

		/**
		 * Util: Get an array of all templates in the current theme's {folder}.
		 *
		 * @return array
		 */
		function get_widget_templates(){
			$templates = array();
			$path = get_stylesheet_directory() . '/' . $this->folder . '/*.php';
			foreach( glob( $path ) as $file ) {
				$templates[] = $file;
			}
			return $templates;
		}

		/**
		 * Util: Create an array of options from the exist widget templates
		 *
		 * @return array
		 */
		function get_widget_template_options(){
			$options = array(
				'' => __( '- Default -' )
			);
			$templates = $this->get_widget_templates();

			foreach ( $templates as $file ){
				$name = basename( $file );
				$options[ $name ] = $name;
			}

			return $options;
		}
	}

	Sweet_Widgets_Templates::register();
endif; // class exists
