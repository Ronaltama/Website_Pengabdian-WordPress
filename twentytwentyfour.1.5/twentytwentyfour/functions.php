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
	wp_enqueue_style( 'twentytwentyfour-style', get_stylesheet_uri(), array(), filemtime( get_stylesheet_directory() . '/style.css' ) );
}
add_action( 'wp_enqueue_scripts', 'web_pengabdian_enqueue_styles' );

/**
 * Shortcode to display FAQ Accordion dynamically from the 'faq' post type, with fallbacks.
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
	
	$output = '<section class="wp-faq-section-wrapper reveal-on-scroll" style="background: #eef4ff; padding: 85px 24px;">
		<div style="max-width: 820px; margin: 0 auto;">
			<div style="text-align: center; margin-bottom: 40px;">
				<div style="display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 6px 16px; background: #dbeafe; color: #0c54a3; border-radius: 99px; font-size: 13px; font-weight: 700; margin-bottom: 20px; letter-spacing: 0.3px;">
					<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="display: block; flex-shrink: 0;"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
					<span style="display: inline-block; line-height: 1.2;">FAQ &amp; PANDUAN</span>
				</div>
				<h2 style="font-size: 30px; font-weight: 800; color: #0f2340; margin: 0; letter-spacing: -0.3px;">Pertanyaan yang Sering Diajukan</h2>
			</div>
			<div class="wp-faq-list" style="display: flex; flex-direction: column; gap: 10px;">
';

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$answer = get_post_meta( get_the_ID(), '_faq_answer', true );
			if ( empty( $answer ) ) {
				$answer = get_the_content();
				$answer_html = apply_filters( 'the_content', $answer );
			} else {
				$answer_html = wpautop( esc_html( $answer ) );
			}
			$output .= '
			<details class="wp-faq-accordion" style="background: #ffffff; border-radius: 12px; border: 1px solid rgba(12, 84, 163, 0.15); padding: 18px 24px; box-shadow: 0 4px 15px rgba(12, 84, 163, 0.04); transition: all 0.3s ease;">
				<summary style="font-weight: 700; font-size: 17px; color: #0c54a3; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
					<span>' . esc_html( get_the_title() ) . '</span>
				</summary>
				<div class="wp-block-details-content" style="margin-top: 12px; color: #334155; font-size: 15px; line-height: 1.7; border-top: 1px solid #f1f5f9; padding-top: 14px;">
					' . $answer_html . '
				</div>
			</details>';
		}
		wp_reset_postdata();
	} else {
		$default_faqs = array(
			array(
				'q' => 'Apa itu program Pengabdian UNS x Perma UTLLN Jepang?',
				'a' => 'Program ini adalah kegiatan Community Development oleh tim dosen Universitas Sebelas Maret (UNS) bekerjasama dengan Perma UTLLN Jepang untuk memberikan pelatihan digital marketing, penulisan copywriting persuasif, dan pemanfaatan AI NotebookLM.'
			),
			array(
				'q' => 'Bagaimana cara mengakses materi pelatihan?',
				'a' => 'Seluruh materi pelatihan, tayangan presentasi, dan panduan praktik dapat diakses secara fleksibel dan gratis melalui menu "Materi" pada navigasi utama website ini.'
			),
			array(
				'q' => 'Apakah peserta mendapatkan pendampingan berkala?',
				'a' => 'Ya, peserta mendapatkan fasilitas sesi konsultasi dan pendampingan berkala bersama tim pengabdi UNS untuk membantu implementasi usaha mandiri.'
			),
			array(
				'q' => 'Bagaimana cara memanfaatkan NotebookLM untuk pemasaran digital?',
				'a' => 'NotebookLM dimanfaatkan sebagai asisten AI untuk menyintesis materi, membedah ide bisnis, serta membantu penyusunan naskah promosi (copywriting) secara praktis.'
			)
		);
		foreach ( $default_faqs as $faq ) {
			$output .= '
			<details class="wp-faq-accordion" style="background: #ffffff; border-radius: 12px; border: 1px solid rgba(12, 84, 163, 0.15); padding: 18px 24px; box-shadow: 0 4px 15px rgba(12, 84, 163, 0.04); transition: all 0.3s ease;">
				<summary style="font-weight: 700; font-size: 17px; color: #0c54a3; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
					<span>' . esc_html( $faq['q'] ) . '</span>
				</summary>
				<div class="wp-block-details-content" style="margin-top: 12px; color: #334155; font-size: 15px; line-height: 1.7; border-top: 1px solid #f1f5f9; padding-top: 14px;">
					' . esc_html( $faq['a'] ) . '
				</div>
			</details>';
		}
	}
	
	$output .= '</div></div></section>';
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
		
		return '<div class="wp-materi-iframe-wrapper"><iframe src="' . esc_url( $preview_link ) . '" allow="autoplay" allowfullscreen></iframe></div>';
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
	
	$hero_title = get_option( 'web_pengabdian_hero_title', 'Belajar Pemasaran Digital & NotebookLM untuk Perma UTLLN Jepang' );
	$hero_subtitle = get_option( 'web_pengabdian_hero_subtitle', 'Website pendamping resmi program pengabdian UNS x Perma UTLLN Jepang — tempat mahasiswa & PMI mengakses materi pelatihan kapan saja dan dari mana saja.' );
	$about_title = get_option( 'web_pengabdian_about_title', 'Tentang Program' );
	$about_desc = get_option( 'web_pengabdian_about_desc', 'Website ini adalah bagian dari program <strong>Community Development (Comdev) Universitas Sebelas Maret (UNS)</strong> yang bermitra dengan <strong>Perma UTLLN Jepang</strong> (Perhimpunan Mahasiswa Universitas Terbuka Layanan Luar Negeri Jepang).<br><br>Program ini hadir untuk membekali dengan kemampuan <strong>bahasa pemasaran</strong> dan <strong>literasi digital</strong> berbasis NotebookLM, agar mereka siap berwirausaha mandiri — baik selama di Jepang maupun setelah kembali ke Indonesia.' );
	$about_bg_color = get_option( 'web_pengabdian_about_bg_color', '#0c54a3' );
	
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
			</table>
			
			<h2 class="title" style="margin-top: 30px; border-bottom: 2px solid #ccc; padding-bottom: 10px;">3. Tiga Fitur Program (Bawah Tentang Program)</h2>
			<p class="description" style="color: #0c54a3; font-weight: 600; margin-bottom: 20px;">💡 Catatan: Ikon Vektor SVG Modern (Biru UNS) sudah otomatis terpasang secara elegan pada setiap kartu fitur di halaman utama.</p>
			<table class="form-table">
				<!-- Feature 1 -->
				<tr>
					<th scope="row"><label for="feature1_title">Judul Fitur 1</label></th>
					<td>
						<input type="text" id="feature1_title" name="feature1_title" value="<?php echo esc_attr( $feature1_title ); ?>" class="large-text" />
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
					<th scope="row"><label for="feature2_title">Judul Fitur 2</label></th>
					<td>
						<input type="text" id="feature2_title" name="feature2_title" value="<?php echo esc_attr( $feature2_title ); ?>" class="large-text" />
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
					<th scope="row"><label for="feature3_title">Judul Fitur 3</label></th>
					<td>
						<input type="text" id="feature3_title" name="feature3_title" value="<?php echo esc_attr( $feature3_title ); ?>" class="large-text" />
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
	$hero_title = get_option( 'web_pengabdian_hero_title', 'Belajar Pemasaran Digital & NotebookLM untuk Perma UTLLN Jepang' );
	$hero_subtitle = get_option( 'web_pengabdian_hero_subtitle', 'Website pendamping resmi program pengabdian UNS x Perma UTLLN Jepang - tempat mahasiswa & PMI mengakses materi pelatihan kapan saja dan dari mana saja.' );
	
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
	<section class="wp-home-hero reveal-on-scroll" style="text-align: center; padding: 95px 24px 85px; background: #ffffff;">
		<div style="max-width: 820px; margin: 0 auto;">
			<div style="display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 6px 16px; background: #eef4ff; color: #0c54a3; border-radius: 99px; font-size: 13px; font-weight: 700; margin-bottom: 24px; letter-spacing: 0.3px;">
				<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="display: block; flex-shrink: 0;"><circle cx="12" cy="12" r="10"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/><path d="M2 12h20"/></svg>
				<span style="display: inline-block; line-height: 1.2;">UNS x PERMA UTLLN JEPANG</span>
			</div>
			<h1 class="wp-home-hero-title" style="font-size: 42px; font-weight: 800; color: #0f2340; line-height: 1.25; margin-bottom: 20px; letter-spacing: -0.6px;">' . esc_html( $hero_title ) . '</h1>
			<p style="font-size: 16.5px; color: #64748b; line-height: 1.75; margin-bottom: 38px; max-width: 660px; margin-left: auto; margin-right: auto;">' . esc_html( $hero_subtitle ) . '</p>
			<div style="display: flex; gap: 14px; justify-content: center; align-items: center; flex-wrap: wrap;">
				<a href="' . esc_url( $materi_url ) . '" style="display: inline-flex; align-items: center; justify-content: center; gap: 8px; background: #0c54a3; color: #fff; padding: 14px 28px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 15px; box-shadow: 0 2px 8px rgba(12,84,163,0.22); transition: all 0.2s ease;">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round" style="display: block; flex-shrink: 0;"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
					<span style="display: inline-block; line-height: 1.2;">Akses Materi Pelatihan</span>
				</a>
				<a href="' . esc_url( $faq_url ) . '" style="display: inline-flex; align-items: center; justify-content: center; gap: 8px; border: 1.5px solid #0c54a3; color: #0c54a3; padding: 13px 26px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 15px; background: #fff; transition: all 0.2s ease;">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round" style="display: block; flex-shrink: 0;"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
					<span style="display: inline-block; line-height: 1.2;">FAQ</span>
				</a>
			</div>
		</div>
	</section>';

	
	return $output;
}
add_shortcode( 'home_hero', 'web_pengabdian_home_hero_shortcode' );

/**
 * Shortcode to render Homepage About Section with 3 columns.
 */
function web_pengabdian_home_about_shortcode() {
	$about_title = get_option( 'web_pengabdian_about_title', 'Tentang Program' );
	$about_desc = get_option( 'web_pengabdian_about_desc', 'Website ini adalah bagian dari program <strong>Community Development (Comdev) Universitas Sebelas Maret (UNS)</strong> yang bermitra dengan <strong>Perma UTLLN Jepang</strong> (Perhimpunan Mahasiswa Universitas Terbuka Layanan Luar Negeri Jepang).<br><br>Program ini hadir untuk membekali dengan kemampuan <strong>bahasa pemasaran</strong> dan <strong>literasi digital</strong> berbasis NotebookLM, agar mereka siap berwirausaha mandiri - baik selama di Jepang maupun setelah kembali ke Indonesia.' );
	$about_bg_color = get_option( 'web_pengabdian_about_bg_color', '#0c54a3' );
	
	$feature1_icon = get_option( 'web_pengabdian_feature1_icon', '' );
	$feature1_title = get_option( 'web_pengabdian_feature1_title', 'Bahasa Pemasaran & Copywriting' );
	$feature1_desc = get_option( 'web_pengabdian_feature1_desc', 'Menulis kalimat promosi yang persuasif dan menarik perhatian calon pembeli secara efektif.' );
	
	$feature2_icon = get_option( 'web_pengabdian_feature2_icon', '' );
	$feature2_title = get_option( 'web_pengabdian_feature2_title', 'Konten Digital Marketing' );
	$feature2_desc = get_option( 'web_pengabdian_feature2_desc', 'Membuat konten media sosial dan video promosi yang relevan untuk pasar lokal maupun global.' );
	
	$feature3_icon = get_option( 'web_pengabdian_feature3_icon', '' );
	$feature3_title = get_option( 'web_pengabdian_feature3_title', 'Penggunaan NotebookLM' );
	$feature3_desc = get_option( 'web_pengabdian_feature3_desc', 'Memanfaatkan AI untuk merangkum ide, menyusun teks promosi, dan mengembangkan strategi pemasaran digital.' );
	
	$svg_speech = '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0c54a3" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>';
	$svg_mobile = '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0c54a3" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>';
	$svg_ai = '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0c54a3" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/></svg>';

	$icon1_html = ! empty( $feature1_icon ) ? '<span style="font-size:22px; line-height:1;">' . esc_html( $feature1_icon ) . '</span>' : $svg_speech;
	$icon2_html = ! empty( $feature2_icon ) ? '<span style="font-size:22px; line-height:1;">' . esc_html( $feature2_icon ) . '</span>' : $svg_mobile;
	$icon3_html = ! empty( $feature3_icon ) ? '<span style="font-size:22px; line-height:1;">' . esc_html( $feature3_icon ) . '</span>' : $svg_ai;

	$output = '
	<section class="wp-home-about-section reveal-on-scroll" style="background: #eef4ff; padding: 85px 24px;">
		<div style="max-width: 1140px; margin: 0 auto; text-align: center;">
			<div style="display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 6px 16px; background: #dbeafe; color: #0c54a3; border-radius: 99px; font-size: 13px; font-weight: 700; margin-bottom: 20px; letter-spacing: 0.3px;">
				<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="display: block; flex-shrink: 0;"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
				<span style="display: inline-block; line-height: 1.2;">TENTANG PROGRAM</span>
			</div>
			<h2 style="font-size: 32px; font-weight: 800; color: #0f2340; margin-bottom: 18px; letter-spacing: -0.4px;">' . esc_html( $about_title ) . '</h2>
			<div style="font-size: 15.5px; line-height: 1.85; color: #475569; max-width: 780px; margin: 0 auto 48px auto;">' . wp_kses_post( $about_desc ) . '</div>
			
			<div style="display: flex; justify-content: center; gap: 24px; flex-wrap: wrap;">
				<div style="flex: 1; min-width: 260px; max-width: 320px; background: #ffffff; border-radius: 14px; padding: 30px 24px; border: 1px solid #dbeafe; box-shadow: 0 1px 3px rgba(12,84,163,0.06); text-align: center;">
					<div style="display: inline-flex; align-items: center; justify-content: center; width: 48px; height: 48px; background: #eef4ff; border-radius: 11px; margin-bottom: 16px;">' . $icon1_html . '</div>
					<h3 style="font-size: 16px; font-weight: 700; margin-bottom: 10px; color: #0f2340;">' . esc_html( $feature1_title ) . '</h3>
					<p style="font-size: 14px; line-height: 1.65; color: #64748b; margin: 0;">' . esc_html( $feature1_desc ) . '</p>
				</div>
				<div style="flex: 1; min-width: 260px; max-width: 320px; background: #ffffff; border-radius: 14px; padding: 30px 24px; border: 1px solid #dbeafe; box-shadow: 0 1px 3px rgba(12,84,163,0.06); text-align: center;">
					<div style="display: inline-flex; align-items: center; justify-content: center; width: 48px; height: 48px; background: #eef4ff; border-radius: 11px; margin-bottom: 16px;">' . $icon2_html . '</div>
					<h3 style="font-size: 16px; font-weight: 700; margin-bottom: 10px; color: #0f2340;">' . esc_html( $feature2_title ) . '</h3>
					<p style="font-size: 14px; line-height: 1.65; color: #64748b; margin: 0;">' . esc_html( $feature2_desc ) . '</p>
				</div>
				<div style="flex: 1; min-width: 260px; max-width: 320px; background: #ffffff; border-radius: 14px; padding: 30px 24px; border: 1px solid #dbeafe; box-shadow: 0 1px 3px rgba(12,84,163,0.06); text-align: center;">
					<div style="display: inline-flex; align-items: center; justify-content: center; width: 48px; height: 48px; background: #eef4ff; border-radius: 11px; margin-bottom: 16px;">' . $icon3_html . '</div>
					<h3 style="font-size: 16px; font-weight: 700; margin-bottom: 10px; color: #0f2340;">' . esc_html( $feature3_title ) . '</h3>
					<p style="font-size: 14px; line-height: 1.65; color: #64748b; margin: 0;">' . esc_html( $feature3_desc ) . '</p>
				</div>
			</div>
		</div>
	</section>';
	
	return $output;
}
add_shortcode( 'home_about', 'web_pengabdian_home_about_shortcode' );

/**
 * Shortcode to render Zoom Video Section.
 */
function web_pengabdian_zoom_video_shortcode( $atts ) {
	$atts = shortcode_atts( array(
		'url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
		'title' => 'Rekaman Video Zoom Pelatihan & Pendampingan',
		'subtitle' => 'Saksikan kembali tayangan materi dan diskusi interaktif bersama tim narasumber UNS & Perma UTLLN Jepang.'
	), $atts, 'zoom_video' );

	$svg_video = '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="display: block; flex-shrink: 0;"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>';

	$output = '
	<section class="wp-zoom-video-container reveal-on-scroll" style="background: #ffffff; padding: 85px 24px;">
		<div style="max-width: 820px; margin: 0 auto; text-align: center;">
			<div style="display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 6px 16px; background: #eef4ff; color: #0c54a3; border-radius: 99px; font-size: 13px; font-weight: 700; margin-bottom: 20px; letter-spacing: 0.3px;">
				' . $svg_video . '
				<span style="display: inline-block; line-height: 1.2;">REKAMAN ZOOM</span>
			</div>
			<h2 style="font-size: 28px; font-weight: 800; color: #0f2340; margin-bottom: 10px; letter-spacing: -0.3px;">' . esc_html( $atts['title'] ) . '</h2>
			<p style="font-size: 15px; color: #64748b; margin-bottom: 28px; max-width: 600px; margin-left: auto; margin-right: auto; line-height: 1.7;">' . esc_html( $atts['subtitle'] ) . '</p>
			<div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 12px; box-shadow: 0 4px 16px rgba(0,0,0,0.08); border: 1px solid #e2e8f0;">
				<iframe src="' . esc_url( $atts['url'] ) . '" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;" allowfullscreen allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
			</div>
		</div>
	</section>';
	return $output;

}
add_shortcode( 'zoom_video', 'web_pengabdian_zoom_video_shortcode' );

/**
 * Scroll Reveal Observer Javascript for smooth scroll animations.
 */
function web_pengabdian_scroll_reveal_js() {
	?>
	<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function() {
		const revealElements = document.querySelectorAll(".wp-home-hero, .wp-home-about-section, .wp-zoom-video-container, .wp-faq-section-wrapper, .wp-card-hover, .wp-block-group, .wp-faq-accordion");
		
		revealElements.forEach(el => el.classList.add("reveal-on-scroll"));
		
		const observer = new IntersectionObserver((entries) => {
			entries.forEach(entry => {
				if (entry.isIntersecting) {
					entry.target.classList.add("is-visible");
				}
			});
		}, {
			threshold: 0.08,
			rootMargin: "0px 0px -40px 0px"
		});
		
		revealElements.forEach(el => observer.observe(el));
	});
	</script>
	<?php
}
add_action( 'wp_footer', 'web_pengabdian_scroll_reveal_js' );

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

/**
 * ==========================================
 * Custom Admin Columns for CPTs
 * ==========================================
 */

// 1. CPT Materi Admin Columns
add_filter( 'manage_materi_posts_columns', function( $columns ) {
	$new_columns = array(
		'cb' => $columns['cb'],
		'title' => __( 'Judul Materi', 'twentytwentyfour' ),
		'drive_link' => __( 'Link Google Drive / Slides', 'twentytwentyfour' ),
		'date' => $columns['date'],
	);
	return $new_columns;
} );

add_action( 'manage_materi_posts_custom_column', function( $column, $post_id ) {
	if ( $column === 'drive_link' ) {
		$link = get_post_meta( $post_id, '_materi_google_drive_link', true );
		if ( $link ) {
			echo '<a href="' . esc_url( $link ) . '" target="_blank" style="display: inline-flex; align-items: center; gap: 4px; color: #0c54a3; font-weight: 600; text-decoration: none;"><span class="dashicons dashicons-external" style="font-size: 16px; width: 16px; height: 16px;"></span> Buka Link Materi</a>';
		} else {
			echo '<span style="color: #999; font-style: italic;">Belum diisi</span>';
		}
	}
}, 10, 2 );

// 2. CPT Galeri Admin Columns
add_filter( 'manage_galeri_posts_columns', function( $columns ) {
	$new_columns = array(
		'cb' => $columns['cb'],
		'preview' => __( 'Preview', 'twentytwentyfour' ),
		'title' => __( 'Judul Galeri', 'twentytwentyfour' ),
		'taxonomy-kategori_galeri' => __( 'Kategori', 'twentytwentyfour' ),
		'youtube_link' => __( 'Link YouTube (Video)', 'twentytwentyfour' ),
		'date' => $columns['date'],
	);
	return $new_columns;
} );

add_action( 'manage_galeri_posts_custom_column', function( $column, $post_id ) {
	if ( $column === 'preview' ) {
		$thumb_id = get_post_thumbnail_id( $post_id );
		if ( $thumb_id ) {
			echo get_the_post_thumbnail( $post_id, array( 60, 60 ), array( 'style' => 'border-radius: 6px; object-fit: cover;' ) );
		} else {
			echo '<span style="display: inline-block; width: 50px; height: 38px; background: #eee; border-radius: 4px; text-align: center; line-height: 38px; color: #aaa;">🖼️</span>';
		}
	}
	if ( $column === 'youtube_link' ) {
		$link = get_post_meta( $post_id, '_galeri_youtube_link', true );
		if ( $link ) {
			echo '<a href="' . esc_url( $link ) . '" target="_blank" style="color: #cc0000; font-weight: 600; text-decoration: none;">▶ YouTube Link</a>';
		} else {
			echo '<span style="color: #bbb;">-</span>';
		}
	}
}, 10, 2 );

// 3. CPT FAQ Admin Columns
add_filter( 'manage_faq_posts_columns', function( $columns ) {
	$new_columns = array(
		'cb' => $columns['cb'],
		'title' => __( 'Pertanyaan FAQ', 'twentytwentyfour' ),
		'faq_answer' => __( 'Jawaban FAQ', 'twentytwentyfour' ),
		'date' => $columns['date'],
	);
	return $new_columns;
} );

add_action( 'manage_faq_posts_custom_column', function( $column, $post_id ) {
	if ( $column === 'faq_answer' ) {
		$answer = get_post_meta( $post_id, '_faq_answer', true );
		if ( $answer ) {
			echo esc_html( wp_trim_words( $answer, 15, '...' ) );
		} else {
			echo '<span style="color: #999; font-style: italic;">Belum ada jawaban</span>';
		}
	}
}, 10, 2 );

// 4. CPT Pemateri (Anggota) Admin Columns
add_filter( 'manage_anggota_posts_columns', function( $columns ) {
	$new_columns = array(
		'cb' => $columns['cb'],
		'foto' => __( 'Foto', 'twentytwentyfour' ),
		'title' => __( 'Nama Pemateri', 'twentytwentyfour' ),
		'jabatan' => __( 'Jabatan / Peran', 'twentytwentyfour' ),
		'instansi' => __( 'Instansi / Asal Kampus', 'twentytwentyfour' ),
		'date' => $columns['date'],
	);
	return $new_columns;
} );

add_action( 'manage_anggota_posts_custom_column', function( $column, $post_id ) {
	if ( $column === 'foto' ) {
		$thumb_id = get_post_thumbnail_id( $post_id );
		if ( $thumb_id ) {
			echo get_the_post_thumbnail( $post_id, array( 50, 50 ), array( 'style' => 'border-radius: 50%; object-fit: cover; border: 2px solid #0c54a3;' ) );
		} else {
			echo '<span style="display: inline-block; width: 45px; height: 45px; background: #e0e7ff; border-radius: 50%; text-align: center; line-height: 45px; font-size: 20px;">👤</span>';
		}
	}
	if ( $column === 'jabatan' ) {
		$val = get_post_meta( $post_id, '_anggota_jabatan', true );
		echo $val ? '<strong>' . esc_html( $val ) . '</strong>' : '<span style="color: #bbb;">-</span>';
	}
	if ( $column === 'instansi' ) {
		$val = get_post_meta( $post_id, '_anggota_instansi', true );
		echo $val ? esc_html( $val ) : '<span style="color: #bbb;">-</span>';
	}
}, 10, 2 );

/**
 * Custom Admin Styling for UNS Blue Branding & Meta Box polish
 */
function web_pengabdian_admin_head_css() {
	?>
	<style type="text/css">
		/* Meta Box Header & Border Styling */
		.postbox {
			border-radius: 8px !important;
			border: 1px solid #cbd5e1 !important;
			box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04) !important;
			overflow: hidden !important;
		}
		.postbox-header {
			background: #f8fafc !important;
			border-bottom: 1px solid #e2e8f0 !important;
		}
		.postbox-header h2 {
			color: #0c54a3 !important;
			font-weight: 700 !important;
		}
		
		/* Homepage Settings Wrap */
		.wrap h1 {
			color: #0c54a3 !important;
			font-weight: 800 !important;
		}
		.wrap .title {
			color: #0f2340 !important;
			font-size: 1.15rem !important;
			font-weight: 700 !important;
		}
	</style>
	<?php
}
add_action( 'admin_head', 'web_pengabdian_admin_head_css' );



