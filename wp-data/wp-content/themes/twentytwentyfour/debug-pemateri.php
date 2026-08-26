<?php
// Load WordPress
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

header('Content-Type: text/plain; charset=utf-8');

$posts = get_posts(array(
    'post_type' => 'anggota',
    'posts_per_page' => -1,
    'post_status' => 'any'
));

echo "TOTAL PEMATERI: " . count($posts) . "\n\n";

foreach ($posts as $post) {
    echo "ID: " . $post->ID . "\n";
    echo "Nama: " . $post->post_title . "\n";
    echo "Status: " . $post->post_status . "\n";
    
    // Check all post meta starting with _anggota or anggota
    $meta = get_post_custom($post->ID);
    echo "Meta Data:\n";
    foreach ($meta as $key => $values) {
        if (strpos($key, 'anggota') !== false) {
            echo "  $key => " . implode(', ', $values) . "\n";
        }
    }
    echo "----------------------------------------\n";
}
