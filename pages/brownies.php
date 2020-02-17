<?php
/*
 *
 * This is a sample blog listing page demonstrating a custom post type of "Brownie".
 *
 */
require_once __DIR__ . '/../inc/above.php';

// Page-specific preparatory code goes here.
$brownies = get_posts( [
	'post_type' => 'brownie',
	'post_status' => 'publish',
	'numberposts' => -1,
	'order' => 'ASC'
] );

?>

<hr style="padding: 5rem 0 0;">
<?php foreach ( $brownies as $index => $brownie ) : ?>
<div class="container">
	<pre>
		<?php var_dump( $brownie ); ?>
	</pre>
	<h3 class="h3"><?php echo $brownie->post_title ?></h3>
	<br>
	<p><?php echo getContent( 'The Brownie #' . ( $index + 1 ), 'description', $brownie->ID ); ?></p>
</div>
<?php endforeach; ?>
