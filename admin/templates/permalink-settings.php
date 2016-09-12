<?php
/**
 * Permalink Settings view Template
 * 
 * Add a metabox for custom permalinks in the permalink settings page.
 * 
 * @since    3.0
 * 
 * @uses    $settings
 * @uses    $permalinks
 */
?>

		<p><?php _e( 'These settings control the permalinks used specifically by the movie library.', 'wpmovielibrary' ); ?></p>

		<div id="wpmoly-permalinks" class="wpmoly-metabox wpmoly-tabbed-metabox clearfix">

			<div id="wpmoly-permalinks-menu" class="wpmoly-metabox-menu">
				<ul>
<?php
		$active = true;
		foreach ( $settings as $id => $setting ) {
?>
					<li class="tab<?php if ( $active ) { ?> active<?php } ?>">
					<a class="navigate" href="#wpmoly-<?php echo esc_attr( $id ); ?>"><span class="<?php echo esc_attr( $setting['icon'] ); ?>"></span><span class="title"><?php echo esc_attr( $setting['title'] ); ?></span></a></li>
<?php
			$active = false;
		}
?>
				</ul>
			</div>
			<div id="wpmoly-permalinks-content" class="wpmoly-metabox-content">
<?php
		$active = true;
		foreach ( $settings as $id => $setting ) {
?>
				<div id="wpmoly-<?php echo esc_attr( $id ); ?>" class="panel<?php if ( $active ) { ?> active<?php } ?>">
<?php
			foreach ( $setting['fields'] as $slug => $field ) {
?>
					<h4><?php echo esc_attr( $field['title'] ); ?></h4>
					<p><?php echo wp_kses( $field['description'], wp_kses_allowed_html( 'post' ) ); ?></p>
					<table class="form-table wpmoly-permalink-structure">
						<tbody>
<?php
				$is_disabled = isset( $field['disabled'] ) && true === $field['disabled'];

				if ( 'radio' == $field['type'] ) {

					$value = $permalinks[ $slug ];
					if ( empty( $value ) ) {
						$default = $field['default'];
						$value = $field['choices'][ $default ]['value'];
					}

					$choices = array();
					foreach ( $field['choices'] as $name => $choice ) {
						$choices[] = $choice['value'];
?>
							<tr>
								<th>
									<label><input name="wpmoly_permalinks[<?php echo esc_attr( $slug ); ?>]" type="radio" value="<?php echo esc_attr( $choice['value'] ); ?>" class="wctog" <?php checked( $choice['value'], $value ); disabled( $is_disabled, true ); ?>/> <?php echo esc_attr( $choice['label'] ); ?></label>
								</th>
								<td>
									<code><?php echo esc_html( $choice['description'] ) ?></code>
								</td>
							</tr>
<?php
					}
?>
							<tr>
								<th>
									<label><input name="wpmoly_permalinks[<?php echo esc_attr( $slug ); ?>]" type="radio" value="<?php echo esc_attr( $choice['value'] ); ?>" class="wctog" <?php checked( in_array( $value, $choices ), false ); disabled( $is_disabled, true ); ?>/> <?php _e( 'Custom Structure' ); ?></label>
								</th>
								<td>
									<code><?php echo esc_url( untrailingslashit( home_url() ) ) ?></code> <input name="wpmoly_permalinks[custom_<?php echo esc_attr( $slug ); ?>]" type="text" value="<?php echo in_array( $value, $choices ) ? esc_attr( $value ) : ''; ?>" class="regular-text code" <?php disabled( $is_disabled, true ); ?>/>
									<p><em><?php _e( 'Enter a custom base to use. A base <strong>must</strong> be set or WordPress will use default instead.', 'wpmovielibrary' ); ?></em></p>
								</td>
							</tr>
<?php
				} elseif ( 'text' == $field['type'] ) {
?>
							<tr>
								<th></th>
								<td>
									<code><?php echo esc_url( untrailingslashit( home_url() ) ) ?></code> <input name="wpmoly_permalinks[<?php echo esc_attr( $slug ); ?>]" type="text" value="<?php echo esc_attr( $field['default'] ); ?>" class="regular-text code" <?php disabled( $disabled, true ); ?>/>
								</td>
							</tr>
<?php
				}
?>
						</tbody>
					</table>
<?php
			}
?>
				</div>
<?php
			$active = false;
		}
?>
			</div>
		</div>