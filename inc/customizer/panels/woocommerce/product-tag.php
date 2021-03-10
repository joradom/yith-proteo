<?php
/**
 * YITH-proteo Theme Customizer - WooCommerce Product Tag
 *
 * @package yith-proteo
 */

	/**
	 * Product Tag page management
	 */
	$wp_customize->add_section(
		'yith_proteo_product_tag_page_management',
		array(
			'title'    => esc_html_x( 'Product Tag page', 'Customizer section title', 'yith-proteo' ),
			'priority' => 10,
			'panel'    => 'woocommerce',
		)
	);

	if ( class_exists( 'Customizer_Control_Radio_Image' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_product_tag_page_sidebar_position',
			array(
				'default'           => 'no-sidebar',
				'sanitize_callback' => 'yith_proteo_sanitize_sidebar_position',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Radio_Image(
				$wp_customize,
				'yith_proteo_product_tag_page_sidebar_position',
				array(
					'label'       => esc_html_x( 'Choose the position of the sidebar on product tag pages', 'Customizer option name', 'yith-proteo' ),
					'section'     => 'yith_proteo_product_tag_page_management',
					'description' => esc_html_x( 'Select where to display the sidebar.', 'Customizer option description', 'yith-proteo' ),
					'choices'     => array(
						'no-sidebar' => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-no.svg',
							'label' => esc_html_x( 'No sidebar', 'Customizer option value', 'yith-proteo' ),
						),
						'left'       => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-left.svg',
							'label' => esc_html_x( 'Left', 'Customizer option value', 'yith-proteo' ),
						),
						'right'      => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-right.svg',
							'label' => esc_html_x( 'Right', 'Customizer option value', 'yith-proteo' ),
						),
					),
				)
			)
		);
	}

	// Product Tag Sidebar Chooser.
	$wp_customize->add_setting(
		'yith_proteo_product_tag_page_sidebar',
		array(
			'default'           => 'shop-sidebar',
			'sanitize_callback' => 'yith_proteo_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_product_tag_page_sidebar',
		array(
			'type'            => 'select',
			'label'           => esc_html_x( 'Choose the product tag page sidebar', 'Customizer option name', 'yith-proteo' ),
			'section'         => 'yith_proteo_product_tag_page_management',
			'description'     => esc_html_x( 'Select the sidebar to display.', 'Customizer option description', 'yith-proteo' ),
			'choices'         => wp_list_pluck( $GLOBALS['wp_registered_sidebars'], 'name' ),
			'active_callback' => 'yith_proteo_product_tag_page_sidebar_is_enabled',
		)
	);
