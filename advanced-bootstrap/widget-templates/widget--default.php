<?php
/**
 * Available variables -- null if missing
 *
 * - $widget_title     | Title for widget
 * - $widget_content   | Content for widget
 * - $widget_instance  | $instance array of the widget
 * - $widget_object    | WP_Widget object
 * - $widget_args      | Sidebar parameters: (before_widget, before_title, etc...)
 * - $widget_id        | Unique id for the widget based on id_base and number
 * - $widget_classname | Widget object defined class name
 *
 * Widget template hierarchy
 *
 * - {custom-template-name}.php    | If a widget has a specified template name in the Admin Dashboard, that template name takes priority.
 * - {sidebar-id}--{widget-id}.php | Specific widget in specific sidebar
 * - {sidebar-id}--default.php     | Any widget in specific sidebar
 * - {widget-id}.php               | Specific widget in any sidebar
 * - widget--default.php           | Default template for all widgets in all sidebars
 */
?>
<aside id="<?php echo esc_attr( $widget_id ); ?>" class="widget <?php echo esc_attr( $widget_classname ); ?>">
	<?php if ( $widget_title ) :?>
		<h2 class="widget-title"><?php echo $widget_title; ?></h2>
	<?php endif; ?>
	<?php if ( $widget_content ) : ?>
		<div class="widget-inner">
			<?php echo $widget_content; ?>
		</div>
	<?php endif; ?>
</aside>