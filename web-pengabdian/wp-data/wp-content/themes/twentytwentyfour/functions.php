<?php
/**
 * Twenty Twenty-Four functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Twenty Twenty-Four
 * @since Twenty Twenty-Four 1.0
 */

if ( ! function_exists( 'twentytwentyfour_block_styles' ) ) :
	/**
	 * Registers custom block styles.
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_styles() {

		register_block_style(
			'core/details',
			array(
				'name'         => 'arrow-icon-details',
				'label'        => __( 'Arrow icon', 'twentytwentyfour' ),
				/*
				 * Styles for the custom Arrow icon style of the Details block
				 */
				'inline_style' => '
				.is-style-arrow-icon-details {
					padding-top: var(--wp--preset--spacing--10);
					padding-bottom: var(--wp--preset--spacing--10);
				}

				.is-style-arrow-icon-details summary {
					list-style-type: "\2193\00a0\00a0\00a0";
				}

				.is-style-arrow-icon-details[open]>summary {
					list-style-type: "\2192\00a0\00a0\00a0";
				}',
			)
		);
		register_block_style(
			'core/post-terms',
			array(
				'name'         => 'pill',
				'label'        => __( 'Pill', 'twentytwentyfour' ),
				/*
				 * Styles variation for post terms
				 * https://github.com/WordPress/gutenberg/issues/24956
				 */
				'inline_style' => '
				.is-style-pill a,
				.is-style-pill span:not([class], [data-rich-text-placeholder]) {
					display: inline-block;
					background-color: var(--wp--preset--color--base-2);
					padding: 0.375rem 0.875rem;
					border-radius: var(--wp--preset--spacing--20);
				}

				.is-style-pill a:hover {
					background-color: var(--wp--preset--color--contrast-3);
				}',
			)
		);
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'twentytwentyfour' ),
				/*
				 * Styles for the custom checkmark list block style
				 * https://github.com/WordPress/gutenberg/issues/51480
				 */
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
		register_block_style(
			'core/navigation-link',
			array(
				'name'         => 'arrow-link',
				'label'        => __( 'With arrow', 'twentytwentyfour' ),
				/*
				 * Styles for the custom arrow nav link block style
				 */
				'inline_style' => '
				.is-style-arrow-link .wp-block-navigation-item__label:after {
					content: "\2197";
					padding-inline-start: 0.25rem;
					vertical-align: middle;
					text-decoration: none;
					display: inline-block;
				}',
			)
		);
		register_block_style(
			'core/heading',
			array(
				'name'         => 'asterisk',
				'label'        => __( 'With asterisk', 'twentytwentyfour' ),
				'inline_style' => "
				.is-style-asterisk:before {
					content: '';
					width: 1.5rem;
					height: 3rem;
					background: var(--wp--preset--color--contrast-2, currentColor);
					clip-path: path('M11.93.684v8.039l5.633-5.633 1.216 1.23-5.66 5.66h8.04v1.737H13.2l5.701 5.701-1.23 1.23-5.742-5.742V21h-1.737v-8.094l-5.77 5.77-1.23-1.217 5.743-5.742H.842V9.98h8.162l-5.701-5.7 1.23-1.231 5.66 5.66V.684h1.737Z');
					display: block;
				}

				/* Hide the asterisk if the heading has no content, to avoid using empty headings to display the asterisk only, which is an A11Y issue */
				.is-style-asterisk:empty:before {
					content: none;
				}

				.is-style-asterisk:-moz-only-whitespace:before {
					content: none;
				}

				.is-style-asterisk.has-text-align-center:before {
					margin: 0 auto;
				}

				.is-style-asterisk.has-text-align-right:before {
					margin-left: auto;
				}

				.rtl .is-style-asterisk.has-text-align-left:before {
					margin-right: auto;
				}",
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_block_styles' );

if ( ! function_exists( 'twentytwentyfour_block_stylesheets' ) ) :
	/**
	 * Enqueues custom block stylesheets.
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_stylesheets() {
		/**
		 * The wp_enqueue_block_style() function allows us to enqueue a stylesheet
		 * for a specific block. These will only get loaded when the block is rendered
		 * (both in the editor and on the front end), improving performance
		 * and reducing the amount of data requested by visitors.
		 *
		 * See https://make.wordpress.org/core/2021/12/15/using-multiple-stylesheets-per-block/ for more info.
		 */
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'twentytwentyfour-button-style-outline',
				'src'    => get_parent_theme_file_uri( 'assets/css/button-outline.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/button-outline.css' ),
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_block_stylesheets' );

if ( ! function_exists( 'twentytwentyfour_pattern_categories' ) ) :
	/**
	 * Registers pattern categories.
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_pattern_categories() {

		register_block_pattern_category(
			'twentytwentyfour_page',
			array(
				'label'       => _x( 'Pages', 'Block pattern category', 'twentytwentyfour' ),
				'description' => __( 'A collection of full page layouts.', 'twentytwentyfour' ),
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_pattern_categories' );

/**
 * Register Custom Post Types for Web Pengabdian
 */
function web_pengabdian_register_cpts() {
	// 1. CPT: Materi
	register_post_type( 'materi', array(
		'labels' => array(
			'name' => __( 'Materi', 'twentytwentyfour' ),
			'singular_name' => __( 'Materi', 'twentytwentyfour' ),
			'add_new' => __( 'Tambah Materi Baru', 'twentytwentyfour' ),
			'add_new_item' => __( 'Tambah Materi Baru', 'twentytwentyfour' ),
			'edit_item' => __( 'Edit Materi', 'twentytwentyfour' ),
			'new_item' => __( 'Materi Baru', 'twentytwentyfour' ),
			'view_item' => __( 'Lihat Materi', 'twentytwentyfour' ),
			'search_items' => __( 'Cari Materi', 'twentytwentyfour' ),
			'not_found' => __( 'Materi tidak ditemukan', 'twentytwentyfour' ),
		),
		'public' => true,
		'has_archive' => true,
		'show_in_rest' => true, // Enforce Gutenberg
		'supports' => array( 'title' ),
		'menu_icon' => 'dashicons-welcome-learn-more',
	) );

	// 2. CPT: FAQ
	register_post_type( 'faq', array(
		'labels' => array(
			'name' => __( 'FAQ', 'twentytwentyfour' ),
			'singular_name' => __( 'FAQ', 'twentytwentyfour' ),
			'add_new' => __( 'Tambah FAQ Baru', 'twentytwentyfour' ),
			'add_new_item' => __( 'Tambah FAQ Baru', 'twentytwentyfour' ),
			'edit_item' => __( 'Edit FAQ', 'twentytwentyfour' ),
			'new_item' => __( 'FAQ Baru', 'twentytwentyfour' ),
			'view_item' => __( 'Lihat FAQ', 'twentytwentyfour' ),
			'search_items' => __( 'Cari FAQ', 'twentytwentyfour' ),
			'not_found' => __( 'FAQ tidak ditemukan', 'twentytwentyfour' ),
		),
		'public' => true,
		'has_archive' => true,
		'show_in_rest' => true,
		'supports' => array( 'title' ),
		'menu_icon' => 'dashicons-editor-help',
	) );

	// 3. CPT: Galeri
	register_post_type( 'galeri', array(
		'labels' => array(
			'name' => __( 'Galeri', 'twentytwentyfour' ),
			'singular_name' => __( 'Galeri', 'twentytwentyfour' ),
			'add_new' => __( 'Tambah Galeri Baru', 'twentytwentyfour' ),
			'add_new_item' => __( 'Tambah Dokumentasi Baru', 'twentytwentyfour' ),
			'edit_item' => __( 'Edit Galeri', 'twentytwentyfour' ),
			'new_item' => __( 'Galeri Baru', 'twentytwentyfour' ),
			'view_item' => __( 'Lihat Galeri', 'twentytwentyfour' ),
			'search_items' => __( 'Cari Galeri', 'twentytwentyfour' ),
			'not_found' => __( 'Galeri tidak ditemukan', 'twentytwentyfour' ),
		),
		'public' => true,
		'has_archive' => true,
		'show_in_rest' => true,
		'supports' => array( 'title', 'thumbnail' ),
		'menu_icon' => 'dashicons-format-gallery',
	) );

	// Register Taxonomy for Galeri
	register_taxonomy( 'kategori_galeri', 'galeri', array(
		'labels' => array(
			'name' => __( 'Kategori Galeri', 'twentytwentyfour' ),
			'singular_name' => __( 'Kategori Galeri', 'twentytwentyfour' ),
			'search_items' => __( 'Cari Kategori Galeri', 'twentytwentyfour' ),
			'all_items' => __( 'Semua Kategori Galeri', 'twentytwentyfour' ),
			'edit_item' => __( 'Edit Kategori Galeri', 'twentytwentyfour' ),
			'update_item' => __( 'Update Kategori Galeri', 'twentytwentyfour' ),
			'add_new_item' => __( 'Tambah Kategori Baru', 'twentytwentyfour' ),
			'new_item_name' => __( 'Nama Kategori Baru', 'twentytwentyfour' ),
			'menu_name' => __( 'Kategori', 'twentytwentyfour' ),
		),
		'hierarchical' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'show_in_rest' => true,
		'rewrite' => array( 'slug' => 'kategori-galeri' ),
	) );


	// 4. CPT: Anggota (Pemateri)
	register_post_type( 'anggota', array(
		'labels' => array(
			'name' => __( 'Pemateri', 'twentytwentyfour' ),
			'singular_name' => __( 'Pemateri', 'twentytwentyfour' ),
			'add_new' => __( 'Tambah Pemateri Baru', 'twentytwentyfour' ),
			'add_new_item' => __( 'Tambah Pemateri Baru', 'twentytwentyfour' ),
			'edit_item' => __( 'Edit Pemateri', 'twentytwentyfour' ),
			'new_item' => __( 'Pemateri Baru', 'twentytwentyfour' ),
			'view_item' => __( 'Lihat Pemateri', 'twentytwentyfour' ),
			'search_items' => __( 'Cari Pemateri', 'twentytwentyfour' ),
			'not_found' => __( 'Pemateri tidak ditemukan', 'twentytwentyfour' ),
		),
		'public' => true,
		'has_archive' => true,
		'show_in_rest' => true,
		'supports' => array( 'title', 'thumbnail' ),
		'menu_icon' => 'dashicons-admin-users',
	) );
}
add_action( 'init', 'web_pengabdian_register_cpts' );

/**
 * Enqueue style.css for custom styling
 */
function web_pengabdian_enqueue_styles() {
	wp_enqueue_style( 'twentytwentyfour-style', get_stylesheet_uri(), array(), '1.5' );
}
add_action( 'wp_enqueue_scripts', 'web_pengabdian_enqueue_styles' );

/**
 * Shortcode to display FAQ Accordion dynamically from the 'faq' post type.
 * Pulls answers from the custom meta box.
 */
function web_pengabdian_faq_accordion_shortcode() {
	$args = array(
		'post_type'      => 'faq',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
		'orderby'        => 'date',
		'order'          => 'ASC',
	);
	
	$query = new WP_Query( $args );
	
	if ( ! $query->have_posts() ) {
		return '<p>Belum ada FAQ yang ditambahkan.</p>';
	}
	
	$output = '<div class="faq-accordion-container">';
	
	while ( $query->have_posts() ) {
		$query->the_post();
		$answer = get_post_meta( get_the_ID(), '_faq_answer', true );
		// Fallback to post_content if meta box answer is empty (backward compatibility)
		if ( empty( $answer ) ) {
			$answer = get_the_content();
			$answer_html = apply_filters( 'the_content', $answer );
		} else {
			$answer_html = wpautop( esc_html( $answer ) );
		}
		$output .= '<details class="wp-faq-accordion">';
		$output .= '<summary>' . esc_html( get_the_title() ) . '</summary>';
		$output .= '<div class="wp-block-details-content">';
		$output .= $answer_html;
		$output .= '</div>';
		$output .= '</details>';
	}
	
	wp_reset_postdata();
	
	$output .= '</div>';
	
	return $output;
}
add_shortcode( 'faq_accordion', 'web_pengabdian_faq_accordion_shortcode' );

/**
 * Shortcode to display current loop post content dynamically.
 * Bypasses Gutenberg's restriction of adding 'Post Content' block inside post/page editor.
 * Includes recursion-safe checks for admin and REST API requests, and special iframe rendering for 'materi' post type.
 */
function web_pengabdian_cpt_content_shortcode() {
	// Prevent infinite recursion in admin, REST API, or on static pages
	if ( is_admin() || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
		return '[CPT Content Preview]';
	}
	
	$post_id = get_the_ID();
	if ( ! $post_id || get_post_type( $post_id ) === 'page' ) {
		return '';
	}
	
	$post_type = get_post_type( $post_id );
	
	// 1. Render CPT 'materi'
	if ( $post_type === 'materi' ) {
		$drive_link = get_post_meta( $post_id, '_materi_google_drive_link', true );
		if ( ! $drive_link ) {
			return '<p>Belum ada link materi yang dimasukkan.</p>';
		}
		
		$preview_link = $drive_link;
		if ( strpos( $drive_link, 'docs.google.com/presentation' ) !== false ) {
			$preview_link = preg_replace( '/\/(edit|pub|preview|sharing).*$/', '/embed', $drive_link );
			if ( strpos( $preview_link, '/embed' ) === false ) {
				$preview_link = rtrim( $preview_link, '/' ) . '/embed';
			}
		} elseif ( strpos( $drive_link, 'drive.google.com' ) !== false ) {
			$preview_link = preg_replace( '/\/(view|edit|sharing).*$/', '/preview', $drive_link );
			if ( strpos( $preview_link, '/preview' ) === false ) {
				$preview_link = rtrim( $preview_link, '/' ) . '/preview';
			}
		}
		
		// Set dynamic height/aspect-ratio based on URL type to avoid black bars on slides
		$style = 'border:none; border-radius:12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); width: 100%; display: block;';
		if ( strpos( $drive_link, 'docs.google.com/presentation' ) !== false ) {
			$style .= ' aspect-ratio: 16/9;';
			return '<iframe src="' . esc_url( $preview_link ) . '" style="' . esc_attr( $style ) . '" allow="autoplay"></iframe>';
		} else {
			$style .= ' height: 600px;';
			return '<iframe src="' . esc_url( $preview_link ) . '" style="' . esc_attr( $style ) . '" allow="autoplay"></iframe>';
		}
	}
	
	// 2. Render CPT 'galeri' (Photo and Video)
	if ( $post_type === 'galeri' ) {
		// Check category: Foto or Video
		$terms = get_the_terms( $post_id, 'kategori_galeri' );
		$is_video = false;
		if ( $terms && ! is_wp_error( $terms ) ) {
			foreach ( $terms as $term ) {
				if ( strtolower( $term->name ) === 'video' ) {
					$is_video = true;
					break;
				}
			}
		}
		
		if ( $is_video ) {
			$youtube_link = get_post_meta( $post_id, '_galeri_youtube_link', true );
			if ( ! $youtube_link ) {
				return '<p style="text-align:center; padding:20px; background:#f5f5f5; border-radius:8px;">Link video YouTube belum diisi.</p>';
			}
			
			$video_id = '';
			if ( preg_match( '%(?:youtube\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_link, $match ) ) {
				$video_id = $match[1];
			}
			
			if ( $video_id ) {
				return '<div class="wp-video-embed" style="position:relative; padding-bottom:56.25%; height:0; overflow:hidden; border-radius:12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
					<iframe src="https://www.youtube.com/embed/' . esc_attr( $video_id ) . '" style="position:absolute; top:0; left:0; width:100%; height:100%; border:0;" allowfullscreen></iframe>
				</div>';
			} else {
				return '<p style="text-align:center; padding:20px; background:#f5f5f5; border-radius:8px;">Format link YouTube tidak valid.</p>';
			}
		} else {
			$thumb_id = get_post_thumbnail_id( $post_id );
			$thumb_url = wp_get_attachment_image_url( $thumb_id, 'large' );
			if ( $thumb_url ) {
				return '<div class="wp-card-hover" style="border-radius:12px; overflow:hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.05); line-height:0;">
					<img src="' . esc_url( $thumb_url ) . '" alt="' . esc_attr( get_the_title() ) . '" style="width:100%; height:auto; object-fit:cover; aspect-ratio:4/3; display:block;" />
				</div>';
			} else {
				return '<p style="text-align:center; padding:20px; background:#f5f5f5; border-radius:8px;">Gambar unggulan belum di-upload.</p>';
			}
		}
	}
	
	// 3. Render CPT 'anggota'
	if ( $post_type === 'anggota' ) {
		$jabatan = get_post_meta( $post_id, '_anggota_jabatan', true );
		$instansi = get_post_meta( $post_id, '_anggota_instansi', true );
		$thumb_id = get_post_thumbnail_id( $post_id );
		$thumb_url = wp_get_attachment_image_url( $thumb_id, 'medium' );
		
		$img_html = '';
		if ( $thumb_url ) {
			$img_html = '<div class="wp-block-post-featured-image" style="margin-bottom:15px; border-radius:8px; overflow:hidden; aspect-ratio:1/1;"><img src="' . esc_url( $thumb_url ) . '" alt="' . esc_attr( get_the_title() ) . '" style="width:100%; height:100%; object-fit:cover;" /></div>';
		} else {
			$img_html = '<div class="wp-block-post-featured-image" style="margin-bottom:15px; border-radius:8px; overflow:hidden; aspect-ratio:1/1; background:#f0f0f0; display:flex; align-items:center; justify-content:center;"><span style="font-size:40px; color:#ccc;">👤</span></div>';
		}
		
		$output = '
		<div class="wp-pemateri-card wp-card-hover" style="background:#fff; border:1px solid #eee; border-radius:12px; padding:20px; text-align:center; box-shadow:0 4px 12px rgba(0,0,0,0.02); transition:all 0.3s ease;">
			' . $img_html . '
			<h3 style="font-size:18px; font-weight:600; margin:10px 0 5px 0; color:#111;">' . esc_html( get_the_title() ) . '</h3>
			<p class="member-role" style="font-size:14px; font-weight:500; color:#0056b3; margin:0 0 5px 0;">' . esc_html( $jabatan ) . '</p>
			<p class="member-instansi" style="font-size:12px; color:#777; margin:0;">' . esc_html( $instansi ) . '</p>
		</div>';
		
		return $output;
	}
	
	return apply_filters( 'the_content', get_the_content() );
}
add_shortcode( 'cpt_content', 'web_pengabdian_cpt_content_shortcode' );

/**
 * Shortcodes to pull Meta Box fields directly for Gutenberg blocks
 */
add_shortcode( 'pemateri_jabatan', function() {
	$post_id = get_the_ID();
	return esc_html( get_post_meta( $post_id, '_anggota_jabatan', true ) );
} );

add_shortcode( 'pemateri_instansi', function() {
	$post_id = get_the_ID();
	return esc_html( get_post_meta( $post_id, '_anggota_instansi', true ) );
} );

/**
 * Render cpt_content and meta shortcodes inside Gutenberg blocks like Query Loop.
 */
function web_pengabdian_render_cpt_content_block( $block_content, $block ) {
	if ( isset( $block['blockName'] ) && $block['blockName'] === 'core/shortcode' ) {
		if ( strpos( $block_content, '[cpt_content]' ) !== false ) {
			return web_pengabdian_cpt_content_shortcode();
		}
		if ( strpos( $block_content, '[pemateri_jabatan]' ) !== false ) {
			return '<p class="member-role" style="font-size:14px; font-weight:500; color:#0056b3; margin:4px 0;">' . esc_html( get_post_meta( get_the_ID(), '_anggota_jabatan', true ) ) . '</p>';
		}
		if ( strpos( $block_content, '[pemateri_instansi]' ) !== false ) {
			return '<p class="member-instansi" style="font-size:12px; color:#777; margin:2px 0;">' . esc_html( get_post_meta( get_the_ID(), '_anggota_instansi', true ) ) . '</p>';
		}
	}
	return $block_content;
}
add_filter( 'render_block', 'web_pengabdian_render_cpt_content_block', 10, 2 );

/**
 * Feed the Excerpt block in Query Loop with '_anggota_instansi' meta for 'anggota' posts.
 * The template uses a core/post-excerpt block which reads post_excerpt, NOT post meta.
 * This filter injects the instansi value so it appears in the Excerpt block on the frontend.
 */
add_filter( 'get_the_excerpt', function( $excerpt, $post ) {
	if ( ! $post || is_admin() || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
		return $excerpt;
	}
	if ( get_post_type( $post->ID ) === 'anggota' ) {
		$instansi = get_post_meta( $post->ID, '_anggota_instansi', true );
		return $instansi ? $instansi : $excerpt;
	}
	return $excerpt;
}, 10, 2 );

/**
 * Feed the Content block in Query Loop with '_anggota_jabatan' meta for 'anggota' posts.
 * The template uses a core/post-content block which reads post_content, NOT post meta.
 * This filter injects the jabatan value so it appears in the Content block on the frontend.
 */
add_filter( 'the_content', function( $content ) {
	if ( is_admin() || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
		return $content;
	}
	$post_id = get_the_ID();
	if ( ! $post_id || get_post_type( $post_id ) !== 'anggota' ) {
		return $content;
	}
	$jabatan = get_post_meta( $post_id, '_anggota_jabatan', true );
	if ( $jabatan ) {
		return '<p class="member-jabatan" style="font-size:13px; font-style:italic; color:#0056b3; margin:4px 0;">' . esc_html( $jabatan ) . '</p>';
	}
	return '';
} );

/**
 * Clean raw escaped span tags from Excerpt and Read More links
 */
function web_pengabdian_clean_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'web_pengabdian_clean_excerpt_more', 999 );

function web_pengabdian_clean_excerpt_text( $excerpt ) {
	// Fallback paling pasti: hapus string unicode-escaped persis seperti di database
	$excerpt = str_replace(
		'u003cspan style=u0022text-decoration: underline;u0022u003eBaca Selengkapnyau003c/spanu003e',
		'',
		$excerpt
	);

	// 1. Variasi unicode-escaped (dengan atau tanpa backslash, any attributes)
	//    Perbaikan: gunakan .*? (bukan [^u]*?) agar bisa melewati 'u0022' di tengah
	$excerpt = preg_replace(
		'/\\\\?u003cspan.*?u003e\s*Baca Selengkapnya\s*\\\\?u003c\\\\?\/spanu003e/is',
		'',
		$excerpt
	);

	// 2. HTML entity: &lt;span ...&gt;Baca Selengkapnya&lt;/span&gt;
	$excerpt = preg_replace(
		'/&lt;span.*?&gt;\s*Baca Selengkapnya\s*&lt;\/span&gt;/is',
		'',
		$excerpt
	);

	// 3. Plain HTML: <span ...>Baca Selengkapnya</span>
	$excerpt = preg_replace(
		'/<span[^>]*?>\s*Baca Selengkapnya\s*<\/span>/is',
		'',
		$excerpt
	);

	// 4. Teks polos "Baca Selengkapnya" yang tersisa
	$excerpt = str_replace( 'Baca Selengkapnya', '', $excerpt );

	// 5. Bersihkan whitespace berlebih
	$excerpt = trim( preg_replace( '/\s{2,}/', ' ', $excerpt ) );

	return $excerpt;
}
add_filter( 'get_the_excerpt', 'web_pengabdian_clean_excerpt_text', 999 );
add_filter( 'the_excerpt', 'web_pengabdian_clean_excerpt_text', 999 );

/**
 * Add Custom Meta Box for 'materi' CPT to allow simple Google Drive URL input.
 */
function web_pengabdian_add_materi_meta_boxes() {
	add_meta_box(
		'materi_drive_link',
		__( 'Link Google Drive', 'twentytwentyfour' ),
		'web_pengabdian_materi_meta_box_callback',
		'materi',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'web_pengabdian_add_materi_meta_boxes' );

// Callback function to render the Meta Box
function web_pengabdian_materi_meta_box_callback( $post ) {
	wp_nonce_field( 'web_pengabdian_save_materi_meta', 'web_pengabdian_materi_meta_nonce' );
	$value = get_post_meta( $post->ID, '_materi_google_drive_link', true );
	echo '<p><label for="materi_google_drive_link"><strong>' . __( 'Masukkan Link Share Google Drive PDF / Google Slides:', 'twentytwentyfour' ) . '</strong></label></p>';
	echo '<input type="url" id="materi_google_drive_link" name="materi_google_drive_link" value="' . esc_attr( $value ) . '" class="widefat" style="margin-top: 5px; padding: 10px; font-size: 14px;" placeholder="https://drive.google.com/file/d/..." />';
	echo '<p class="description">' . __( 'Contoh: https://drive.google.com/file/d/xxxxxx/view?usp=sharing', 'twentytwentyfour' ) . '</p>';
}

// Save the Meta Box data
function web_pengabdian_save_materi_meta( $post_id ) {
	if ( ! isset( $_POST['web_pengabdian_materi_meta_nonce'] ) ) return;
	if ( ! wp_verify_nonce( $_POST['web_pengabdian_materi_meta_nonce'], 'web_pengabdian_save_materi_meta' ) ) return;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;
	if ( isset( $_POST['materi_google_drive_link'] ) ) {
		update_post_meta( $post_id, '_materi_google_drive_link', esc_url_raw( $_POST['materi_google_drive_link'] ) );
	}
}
add_action( 'save_post', 'web_pengabdian_save_materi_meta' );

/**
 * Add Custom Meta Box for 'galeri' CPT to allow simple YouTube URL input.
 */
function web_pengabdian_add_galeri_meta_boxes() {
	add_meta_box(
		'galeri_video_box',
		__( 'Link Video YouTube (Khusus Kategori Video)', 'twentytwentyfour' ),
		'web_pengabdian_galeri_meta_box_callback',
		'galeri',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'web_pengabdian_add_galeri_meta_boxes' );

function web_pengabdian_galeri_meta_box_callback( $post ) {
	wp_nonce_field( 'web_pengabdian_save_galeri_meta', 'web_pengabdian_galeri_nonce' );
	$value = get_post_meta( $post->ID, '_galeri_youtube_link', true );
	echo '<p><label for="galeri_youtube_link"><strong>' . __( 'Masukkan Link Video YouTube (Hanya digunakan jika kategori postingan adalah Video):', 'twentytwentyfour' ) . '</strong></label></p>';
	echo '<input type="url" id="galeri_youtube_link" name="galeri_youtube_link" value="' . esc_attr( $value ) . '" class="widefat" style="margin-top: 5px; padding: 10px; font-size: 14px;" placeholder="https://www.youtube.com/watch?v=... atau https://youtu.be/..." />';
	echo '<p class="description">' . __( 'Contoh: https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'twentytwentyfour' ) . '</p>';
}

function web_pengabdian_save_galeri_meta( $post_id ) {
	if ( ! isset( $_POST['web_pengabdian_galeri_nonce'] ) ) return;
	if ( ! wp_verify_nonce( $_POST['web_pengabdian_galeri_nonce'], 'web_pengabdian_save_galeri_meta' ) ) return;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;
	if ( isset( $_POST['galeri_youtube_link'] ) ) {
		update_post_meta( $post_id, '_galeri_youtube_link', esc_url_raw( $_POST['galeri_youtube_link'] ) );
	}
}
add_action( 'save_post', 'web_pengabdian_save_galeri_meta' );

/**
 * Add Custom Meta Box for 'faq' CPT to allow simple textarea Answer input.
 */
function web_pengabdian_add_faq_meta_boxes() {
	add_meta_box(
		'faq_answer_box',
		__( 'Jawaban FAQ', 'twentytwentyfour' ),
		'web_pengabdian_faq_meta_box_callback',
		'faq',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'web_pengabdian_add_faq_meta_boxes' );

function web_pengabdian_faq_meta_box_callback( $post ) {
	wp_nonce_field( 'web_pengabdian_save_faq_meta', 'web_pengabdian_faq_nonce' );
	$value = get_post_meta( $post->ID, '_faq_answer', true );
	echo '<p><label for="faq_answer"><strong>' . __( 'Masukkan jawaban lengkap untuk pertanyaan FAQ ini:', 'twentytwentyfour' ) . '</strong></label></p>';
	echo '<textarea id="faq_answer" name="faq_answer" class="widefat" rows="6" style="margin-top: 5px; padding: 10px; font-size: 14px;" placeholder="Tulis jawaban di sini...">' . esc_textarea( $value ) . '</textarea>';
}

function web_pengabdian_save_faq_meta( $post_id ) {
	if ( ! isset( $_POST['web_pengabdian_faq_nonce'] ) ) return;
	if ( ! wp_verify_nonce( $_POST['web_pengabdian_faq_nonce'], 'web_pengabdian_save_faq_meta' ) ) return;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;
	if ( isset( $_POST['faq_answer'] ) ) {
		update_post_meta( $post_id, '_faq_answer', sanitize_textarea_field( $_POST['faq_answer'] ) );
	}
}
add_action( 'save_post', 'web_pengabdian_save_faq_meta' );

/**
 * Add Custom Meta Box for 'anggota' CPT to allow Role & Institution inputs.
 */
function web_pengabdian_add_anggota_meta_boxes() {
	add_meta_box(
		'anggota_info_box',
		__( 'Informasi Pemateri', 'twentytwentyfour' ),
		'web_pengabdian_anggota_meta_box_callback',
		'anggota',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'web_pengabdian_add_anggota_meta_boxes' );

function web_pengabdian_anggota_meta_box_callback( $post ) {
	wp_nonce_field( 'web_pengabdian_save_anggota_meta', 'web_pengabdian_anggota_nonce' );
	$jabatan = get_post_meta( $post->ID, '_anggota_jabatan', true );
	$instansi = get_post_meta( $post->ID, '_anggota_instansi', true );
	
	echo '<p><label for="anggota_jabatan"><strong>' . __( 'Jabatan / Peran:', 'twentytwentyfour' ) . '</strong></label></p>';
	echo '<input type="text" id="anggota_jabatan" name="anggota_jabatan" value="' . esc_attr( $jabatan ) . '" class="widefat" style="margin-top: 5px; padding: 10px; font-size: 14px;" placeholder="Contoh: Pemateri, Ketua Pelaksana" />';
	
	echo '<p style="margin-top: 15px;"><label for="anggota_instansi"><strong>' . __( 'Instansi / Asal Kampus:', 'twentytwentyfour' ) . '</strong></label></p>';
	echo '<input type="text" id="anggota_instansi" name="anggota_instansi" value="' . esc_attr( $instansi ) . '" class="widefat" style="margin-top: 5px; padding: 10px; font-size: 14px;" placeholder="Contoh: Universitas Sebelas Maret" />';
}

function web_pengabdian_save_anggota_meta( $post_id ) {
	if ( ! isset( $_POST['web_pengabdian_anggota_nonce'] ) ) return;
	if ( ! wp_verify_nonce( $_POST['web_pengabdian_anggota_nonce'], 'web_pengabdian_save_anggota_meta' ) ) return;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;
	
	if ( isset( $_POST['anggota_jabatan'] ) ) {
		update_post_meta( $post_id, '_anggota_jabatan', sanitize_text_field( $_POST['anggota_jabatan'] ) );
	}
	if ( isset( $_POST['anggota_instansi'] ) ) {
		update_post_meta( $post_id, '_anggota_instansi', sanitize_text_field( $_POST['anggota_instansi'] ) );
	}
}
add_action( 'save_post', 'web_pengabdian_save_anggota_meta' );

/**
 * Disable Gutenberg (Block Editor) for 'anggota' CPT.
 * Reason: Gutenberg saves via REST API, not traditional $_POST form submit.
 * This causes the nonce check in web_pengabdian_save_anggota_meta() to always fail,
 * preventing 'anggota_jabatan' and 'anggota_instansi' meta from being saved.
 * Forcing Classic Editor ensures the $_POST flow works as expected.
 */
add_filter( 'use_block_editor_for_post_type', function( $use_block_editor, $post_type ) {
	if ( $post_type === 'anggota' ) {
		return false;
	}
	return $use_block_editor;
}, 10, 2 );



/**
 * Register Admin Settings Page for Homepage Options.
 */
function web_pengabdian_register_settings_page() {
	add_menu_page(
		'Pengaturan Beranda',
		'Pengaturan Beranda',
		'manage_options',
		'pengaturan-beranda',
		'web_pengabdian_render_settings_page',
		'dashicons-admin-home',
		3
	);
}
add_action( 'admin_menu', 'web_pengabdian_register_settings_page' );

function web_pengabdian_render_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	
	// Save settings
	if ( isset( $_POST['web_pengabdian_save_home_settings'] ) && check_admin_referer( 'web_pengabdian_home_settings_verify' ) ) {
		update_option( 'web_pengabdian_hero_title', sanitize_text_field( $_POST['hero_title'] ) );
		update_option( 'web_pengabdian_hero_subtitle', sanitize_textarea_field( $_POST['hero_subtitle'] ) );
		update_option( 'web_pengabdian_about_title', sanitize_text_field( $_POST['about_title'] ) );
		update_option( 'web_pengabdian_about_desc', wp_kses_post( $_POST['about_desc'] ) );
		$bg_input = ! empty( $_POST['about_bg_color'] ) ? trim( $_POST['about_bg_color'] ) : '#111111';
		if ( strpos( $bg_input, '#' ) !== 0 ) {
			$bg_input = '#' . $bg_input;
		}
		$sanitized_bg = sanitize_hex_color( $bg_input );
		update_option( 'web_pengabdian_about_bg_color', $sanitized_bg ? $sanitized_bg : '#111111' );
		
		update_option( 'web_pengabdian_feature1_icon', sanitize_text_field( $_POST['feature1_icon'] ) );
		update_option( 'web_pengabdian_feature1_title', sanitize_text_field( $_POST['feature1_title'] ) );
		update_option( 'web_pengabdian_feature1_desc', sanitize_textarea_field( $_POST['feature1_desc'] ) );
		
		update_option( 'web_pengabdian_feature2_icon', sanitize_text_field( $_POST['feature2_icon'] ) );
		update_option( 'web_pengabdian_feature2_title', sanitize_text_field( $_POST['feature2_title'] ) );
		update_option( 'web_pengabdian_feature2_desc', sanitize_textarea_field( $_POST['feature2_desc'] ) );
		
		update_option( 'web_pengabdian_feature3_icon', sanitize_text_field( $_POST['feature3_icon'] ) );
		update_option( 'web_pengabdian_feature3_title', sanitize_text_field( $_POST['feature3_title'] ) );
		update_option( 'web_pengabdian_feature3_desc', sanitize_textarea_field( $_POST['feature3_desc'] ) );
		
		echo '<div class="updated"><p>Pengaturan Beranda berhasil disimpan!</p></div>';
	}
	
	$hero_title = get_option( 'web_pengabdian_hero_title', 'Belajar Pemasaran Digital & NotebookLM untuk PMI Taiwan' );
	$hero_subtitle = get_option( 'web_pengabdian_hero_subtitle', 'Website pendamping resmi program pengabdian UNS x PKBM PPI Taiwan — tempat PMI mengakses materi pelatihan kapan saja dan dari mana saja.' );
	$about_title = get_option( 'web_pengabdian_about_title', 'Tentang Program' );
	$about_desc = get_option( 'web_pengabdian_about_desc', 'Website ini adalah bagian dari program <strong>Community Development (Comdev) Universitas Sebelas Maret (UNS)</strong> yang bermitra dengan <strong>PKBM PPI Taiwan</strong> — lembaga pendidikan nonformal bagi Pekerja Migran Indonesia di Taiwan.<br><br>Program ini hadir untuk membekali PMI dengan kemampuan <strong>bahasa pemasaran</strong> dan <strong>literasi digital</strong> berbasis NotebookLM, agar mereka siap berwirausaha mandiri — baik selama di Taiwan maupun setelah kembali ke Indonesia.' );
	$about_bg_color = get_option( 'web_pengabdian_about_bg_color', '#111111' );
	
	$feature1_icon = get_option( 'web_pengabdian_feature1_icon', '🗣️' );
	$feature1_title = get_option( 'web_pengabdian_feature1_title', 'Bahasa Pemasaran & Copywriting' );
	$feature1_desc = get_option( 'web_pengabdian_feature1_desc', 'Menulis kalimat promosi yang persuasif dan menarik perhatian calon pembeli secara efektif.' );
	
	$feature2_icon = get_option( 'web_pengabdian_feature2_icon', '📱' );
	$feature2_title = get_option( 'web_pengabdian_feature2_title', 'Konten Digital Marketing' );
	$feature2_desc = get_option( 'web_pengabdian_feature2_desc', 'Membuat konten media sosial dan video promosi yang relevan untuk pasar lokal maupun global.' );
	
	$feature3_icon = get_option( 'web_pengabdian_feature3_icon', '🤖' );
	$feature3_title = get_option( 'web_pengabdian_feature3_title', 'Penggunaan NotebookLM' );
	$feature3_desc = get_option( 'web_pengabdian_feature3_desc', 'Memanfaatkan AI untuk merangkum ide, menyusun teks promosi, dan mengembangkan strategi pemasaran digital.' );
	
	?>
	<div class="wrap">
		<h1>Pengaturan Beranda (Homepage Settings)</h1>
		<form method="post" action="">
			<?php wp_nonce_field( 'web_pengabdian_home_settings_verify' ); ?>
			
			<h2 class="title" style="margin-top: 30px; border-bottom: 2px solid #ccc; padding-bottom: 10px;">1. Section Hero (Paling Atas)</h2>
			<table class="form-table">
				<tr>
					<th scope="row"><label for="hero_title">Judul Hero</label></th>
					<td>
						<input type="text" id="hero_title" name="hero_title" value="<?php echo esc_attr( $hero_title ); ?>" class="large-text" />
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="hero_subtitle">Subjudul Hero</label></th>
					<td>
						<textarea id="hero_subtitle" name="hero_subtitle" rows="3" class="large-text"><?php echo esc_textarea( $hero_subtitle ); ?></textarea>
					</td>
				</tr>
			</table>
			
			<h2 class="title" style="margin-top: 30px; border-bottom: 2px solid #ccc; padding-bottom: 10px;">2. Section Tentang Program</h2>
			<table class="form-table">
				<tr>
					<th scope="row"><label for="about_title">Judul Section</label></th>
					<td>
						<input type="text" id="about_title" name="about_title" value="<?php echo esc_attr( $about_title ); ?>" class="large-text" />
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="about_desc">Deskripsi Section (Bisa gunakan kode &lt;strong&gt; teks &lt;/strong&gt; untuk tebalkan teks)</label></th>
					<td>
						<textarea id="about_desc" name="about_desc" rows="6" class="large-text"><?php echo esc_textarea( $about_desc ); ?></textarea>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="about_bg_color">Warna Latar Belakang (Kode Hex Color)</label></th>
					<td>
						<input type="color" id="about_bg_picker" value="<?php echo esc_attr( $about_bg_color ); ?>" style="width: 45px; height: 35px; cursor: pointer; vertical-align: middle; border: 1px solid #ccc; border-radius: 4px;" oninput="document.getElementById('about_bg_color').value = this.value;" onChange="document.getElementById('about_bg_color').value = this.value;" />
						<input type="text" id="about_bg_color" name="about_bg_color" value="<?php echo esc_attr( $about_bg_color ); ?>" style="width: 110px; margin-left: 8px; vertical-align: middle; font-weight: 600;" oninput="var val = this.value; if(val.charAt(0)!=='#' && val.length>0){ val = '#' + val; this.value = val; } if(val.length===7){ document.getElementById('about_bg_picker').value = val; }" placeholder="#0c54a3" />
						<span style="margin-left: 10px; color: #666; font-size: 13px;">(Bisa langsung ketik/paste kode warna seperti <strong>#0c54a3</strong> untuk Biru UNS)</span>
					</td>
				</tr>
			</table>
			
			<h2 class="title" style="margin-top: 30px; border-bottom: 2px solid #ccc; padding-bottom: 10px;">3. Tiga Fitur Program (Bawah Tentang Program)</h2>
			<table class="form-table">
				<!-- Feature 1 -->
				<tr>
					<th scope="row"><label for="feature1_title">Fitur 1 (Emoji & Judul)</label></th>
					<td>
						<input type="text" id="feature1_icon" name="feature1_icon" value="<?php echo esc_attr( $feature1_icon ); ?>" style="width: 50px; text-align: center;" placeholder="🗣️" />
						<input type="text" id="feature1_title" name="feature1_title" value="<?php echo esc_attr( $feature1_title ); ?>" class="regular-text" />
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="feature1_desc">Deskripsi Fitur 1</label></th>
					<td>
						<textarea id="feature1_desc" name="feature1_desc" rows="2" class="large-text"><?php echo esc_textarea( $feature1_desc ); ?></textarea>
					</td>
				</tr>
				<!-- Feature 2 -->
				<tr>
					<th scope="row"><label for="feature2_title" style="margin-top: 15px; display: inline-block;">Fitur 2 (Emoji & Judul)</label></th>
					<td>
						<input type="text" id="feature2_icon" name="feature2_icon" value="<?php echo esc_attr( $feature2_icon ); ?>" style="width: 50px; text-align: center; margin-top: 15px;" placeholder="📱" />
						<input type="text" id="feature2_title" name="feature2_title" value="<?php echo esc_attr( $feature2_title ); ?>" class="regular-text" style="margin-top: 15px;" />
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="feature2_desc">Deskripsi Fitur 2</label></th>
					<td>
						<textarea id="feature2_desc" name="feature2_desc" rows="2" class="large-text"><?php echo esc_textarea( $feature2_desc ); ?></textarea>
					</td>
				</tr>
				<!-- Feature 3 -->
				<tr>
					<th scope="row"><label for="feature3_title" style="margin-top: 15px; display: inline-block;">Fitur 3 (Emoji & Judul)</label></th>
					<td>
						<input type="text" id="feature3_icon" name="feature3_icon" value="<?php echo esc_attr( $feature3_icon ); ?>" style="width: 50px; text-align: center; margin-top: 15px;" placeholder="🤖" />
						<input type="text" id="feature3_title" name="feature3_title" value="<?php echo esc_attr( $feature3_title ); ?>" class="regular-text" style="margin-top: 15px;" />
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="feature3_desc">Deskripsi Fitur 3</label></th>
					<td>
						<textarea id="feature3_desc" name="feature3_desc" rows="2" class="large-text"><?php echo esc_textarea( $feature3_desc ); ?></textarea>
					</td>
				</tr>
			</table>
			
			<p class="submit">
				<input type="submit" name="web_pengabdian_save_home_settings" class="button button-primary button-large" value="Simpan Pengaturan" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Shortcode to render Homepage Hero Section.
 */
function web_pengabdian_home_hero_shortcode() {
	$hero_title = get_option( 'web_pengabdian_hero_title', 'Belajar Pemasaran Digital & NotebookLM untuk PMI Taiwan' );
	$hero_subtitle = get_option( 'web_pengabdian_hero_subtitle', 'Website pendamping resmi program pengabdian UNS x PKBM PPI Taiwan — tempat PMI mengakses materi pelatihan kapan saja dan dari mana saja.' );
	
	// Try to auto-detect FAQ page slug
	$faq_page = get_page_by_path( 'faqs' );
	if ( ! $faq_page ) {
		$faq_page = get_page_by_path( 'faq' );
	}
	$faq_url = $faq_page ? get_permalink( $faq_page->ID ) : home_url( '/faqs/' );
	
	// Try to auto-detect Materi page slug
	$materi_page = get_page_by_path( 'materi' );
	$materi_url = $materi_page ? get_permalink( $materi_page->ID ) : home_url( '/materi/' );
	
	$output = '
	<div class="wp-home-hero" style="text-align: center; padding: 60px 20px; max-width: 800px; margin: 0 auto;">
		<h1 class="wp-home-hero-title" style="font-size: 38px; font-weight: 700; color: #111; line-height: 1.25; margin-bottom: 20px;">' . esc_html( $hero_title ) . '</h1>
		<p class="wp-home-hero-subtitle" style="font-size: 16px; color: #555; line-height: 1.6; margin-bottom: 30px; max-width: 700px; margin-left: auto; margin-right: auto;">' . esc_html( $hero_subtitle ) . '</p>
		<div class="wp-home-hero-buttons" style="display: flex; gap: 15px; justify-content: center; align-items: center; flex-wrap: wrap;">
			<a href="' . esc_url( $materi_url ) . '" class="wp-home-hero-btn btn-primary" style="background-color: #111; color: #fff; padding: 12px 24px; border-radius: 6px; text-decoration: none; font-weight: 600; font-size: 14px; transition: all 0.2s ease;">Akses Materi Pelatihan</a>
			<a href="' . esc_url( $faq_url ) . '" class="wp-home-hero-btn btn-secondary" style="border: 1px solid #ccc; color: #111; padding: 12px 24px; border-radius: 6px; text-decoration: none; font-weight: 600; font-size: 14px; transition: all 0.2s ease;">FAQ</a>
		</div>
	</div>';
	
	return $output;
}
add_shortcode( 'home_hero', 'web_pengabdian_home_hero_shortcode' );

/**
 * Shortcode to render Homepage About Section with 3 columns.
 */
function web_pengabdian_home_about_shortcode() {
	$about_title = get_option( 'web_pengabdian_about_title', 'Tentang Program' );
	$about_desc = get_option( 'web_pengabdian_about_desc', 'Website ini adalah bagian dari program <strong>Community Development (Comdev) Universitas Sebelas Maret (UNS)</strong> yang bermitra dengan <strong>PKBM PPI Taiwan</strong> — lembaga pendidikan nonformal bagi Pekerja Migran Indonesia di Taiwan.<br><br>Program ini hadir untuk membekali PMI dengan kemampuan <strong>bahasa pemasaran</strong> dan <strong>literasi digital</strong> berbasis NotebookLM, agar mereka siap berwirausaha mandiri — baik selama di Taiwan maupun setelah kembali ke Indonesia.' );
	$about_bg_color = get_option( 'web_pengabdian_about_bg_color', '#111111' );
	
	$feature1_icon = get_option( 'web_pengabdian_feature1_icon', '🗣️' );
	$feature1_title = get_option( 'web_pengabdian_feature1_title', 'Bahasa Pemasaran & Copywriting' );
	$feature1_desc = get_option( 'web_pengabdian_feature1_desc', 'Menulis kalimat promosi yang persuasif dan menarik perhatian calon pembeli secara efektif.' );
	
	$feature2_icon = get_option( 'web_pengabdian_feature2_icon', '📱' );
	$feature2_title = get_option( 'web_pengabdian_feature2_title', 'Konten Digital Marketing' );
	$feature2_desc = get_option( 'web_pengabdian_feature2_desc', 'Membuat konten media sosial dan video promosi yang relevan untuk pasar lokal maupun global.' );
	
	$feature3_icon = get_option( 'web_pengabdian_feature3_icon', '🤖' );
	$feature3_title = get_option( 'web_pengabdian_feature3_title', 'Penggunaan NotebookLM' );
	$feature3_desc = get_option( 'web_pengabdian_feature3_desc', 'Memanfaatkan AI untuk merangkum ide, menyusun teks promosi, dan mengembangkan strategi pemasaran digital.' );
	
	$output = '
	<div class="wp-home-about-section" style="background-color: ' . esc_attr( $about_bg_color ) . '; color: #fff; padding: 80px 20px; text-align: center; margin-top: 40px; border-radius: 0;">
		<div style="max-width: 900px; margin: 0 auto;">
			<h2 style="font-size: 32px; font-weight: 700; margin-bottom: 25px; color: #fff;">' . esc_html( $about_title ) . '</h2>
			<div style="font-size: 15px; line-height: 1.8; color: #ccc; max-width: 800px; margin: 0 auto 50px auto; text-align: justify; text-align-last: center;">' . wp_kses_post( $about_desc ) . '</div>
			
			<div class="wp-home-features-grid" style="display: flex; justify-content: space-between; align-items: flex-start; gap: 20px; margin-top: 40px; flex-wrap: wrap;">
				<!-- Feature 1 -->
				<div class="wp-home-feature-card" style="flex: 1; min-width: 220px; text-align: center; padding: 15px;">
					<h3 style="font-size: 16px; font-weight: 600; margin-bottom: 10px; color: #fff; display: flex; align-items: center; justify-content: center; gap: 8px;"><span style="font-size: 20px;">' . esc_html( $feature1_icon ) . '</span> ' . esc_html( $feature1_title ) . '</h3>
					<p style="font-size: 14px; line-height: 1.6; color: #aaa; margin: 0;">' . esc_html( $feature1_desc ) . '</p>
				</div>
				<!-- Feature 2 -->
				<div class="wp-home-feature-card" style="flex: 1; min-width: 220px; text-align: center; padding: 15px;">
					<h3 style="font-size: 16px; font-weight: 600; margin-bottom: 10px; color: #fff; display: flex; align-items: center; justify-content: center; gap: 8px;"><span style="font-size: 20px;">' . esc_html( $feature2_icon ) . '</span> ' . esc_html( $feature2_title ) . '</h3>
					<p style="font-size: 14px; line-height: 1.6; color: #aaa; margin: 0;">' . esc_html( $feature2_desc ) . '</p>
				</div>
				<!-- Feature 3 -->
				<div class="wp-home-feature-card" style="flex: 1; min-width: 220px; text-align: center; padding: 15px;">
					<h3 style="font-size: 16px; font-weight: 600; margin-bottom: 10px; color: #fff; display: flex; align-items: center; justify-content: center; gap: 8px;"><span style="font-size: 20px;">' . esc_html( $feature3_icon ) . '</span> ' . esc_html( $feature3_title ) . '</h3>
					<p style="font-size: 14px; line-height: 1.6; color: #aaa; margin: 0;">' . esc_html( $feature3_desc ) . '</p>
				</div>
			</div>
		</div>
	</div>';
	
	return $output;
}
add_shortcode( 'home_about', 'web_pengabdian_home_about_shortcode' );

/**
 * Toggle YouTube Video Link Meta Box based on whether the "Video" category is checked in CPT Galeri.
 */
function web_pengabdian_gallery_admin_footer_js() {
	$screen = get_current_screen();
	if ( $screen && $screen->post_type === 'galeri' ) {
		?>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			function toggleYoutubeLink() {
				var isVideoChecked = false;
				$('#kategori_galeridiv input[type="checkbox"]').each(function() {
					var labelText = $(this).parent().text().trim().toLowerCase();
					if (labelText === 'video' && $(this).is(':checked')) {
						isVideoChecked = true;
					}
				});
				
				if (isVideoChecked) {
					$('#galeri_video_box').show();
				} else {
					$('#galeri_video_box').hide();
				}
			}
			
			// Run on load
			toggleYoutubeLink();
			
			// Run on change
			$(document).on('change', '#kategori_galeridiv input[type="checkbox"]', function() {
				toggleYoutubeLink();
			});
		});
		</script>
		<?php
	}
}
add_action( 'admin_footer', 'web_pengabdian_gallery_admin_footer_js' );


