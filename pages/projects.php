<?php
/*
 *
 *	Project Page Template
 *
 */

$projectSlug = $_GET[ '_slug' ] ?? null;
// if ( basename( __FILE__ ) == ( $projectSlug . '.php' ) ) {
// 	http_response_code( 404 );
// 	exit;
// }

require_once __DIR__ . '/../inc/above.php';

$projects = get_posts( [
	'post_type' => 'projects',
	'post_status' => 'publish',
	'numberposts' => -1,
	// 'order' => 'ASC'
	'orderby' => 'date'
] );

$thisProject = [ ];
foreach ( $projects as $project ) {
	if ( $project->post_name == $projectSlug ) {
		$thisProject = $project;
		break;
	}
}

$projectName = $thisProject->post_title;
$projectFeaturedImage = getContent( '', 'featured_image', $thisProject->ID )[ 'url' ];
$projectDescription = getContent( '', 'description', $thisProject->ID );
$projectClient = getContent( '', 'specifics -> client', $thisProject->ID );
$projectArea = getContent( '', 'specifics -> area', $thisProject->ID );
$projectType = getContent( '', 'specifics -> type', $thisProject->ID );
$projectLocation = getContent( '', 'specifics -> location', $thisProject->ID );
$gallery = array_map( function ( $image ) {
	return $image[ 'url' ];
}, getContent( '', 'gallery', $thisProject->ID ) );
$oldGallery = getContent( '', 'gallery', $thisProject->ID );

?>





<script type="text/javascript" id="js_init_vars">

	window.__DC = { };
	__DC.gallery = <?php echo json_encode( $gallery ) ?>;

	$( `<style>
			.hide-if-js-enabled {
				display: none !important;
			}
		</style>`
	).insertBefore( "#js_init_vars" )

</script>

<!-- Project Section -->
<section class="project-section">
	<!-- Project Cover -->
	<div class="project-cover">
		<div class="row cover-image">
			<div class="block image-bg" style="background-image: url( '<?php echo $projectFeaturedImage . $ver ?>' );"></div>
		</div>
		<div class="row project-content space-one-top-bottom fill-off-light">
			<div class="container">
				<div class="row">
					<div class="columns small-12 large-5 large-offset-7">
						<div class="project-name h2 space-half-bottom"><?php echo $projectName ?></div>
						<div class="project-description p space-half-bottom">
							<p><?php echo $projectDescription ?></p>
						</div>
						<div class="project-specs">
							<?php if ( ! empty( $projectClient ) ) : ?>
							<div class="row">
								<div class="columns small-4 medium-3">
									<div class="p strong text-neutral text-uppercase">For:</div>
								</div>
								<div class="columns small-8 medium-9">
									<div class="p"><?php echo $projectClient ?></div>
								</div>
							</div>
							<?php endif; ?>
							<?php if ( ! empty( $projectArea ) ) : ?>
							<div class="row">
								<div class="columns small-4 medium-3">
									<div class="p strong text-neutral text-uppercase">Area:</div>
								</div>
								<div class="columns small-8 medium-9">
									<div class="p">2500 square feet</div>
								</div>
							</div>
							<?php endif; ?>
							<?php if ( ! empty( $projectType ) ) : ?>
							<div class="row">
								<div class="columns small-4 medium-3">
									<div class="p strong text-neutral text-uppercase">Type:</div>
								</div>
								<div class="columns small-8 medium-9">
									<div class="p">Office Interiors</div>
								</div>
							</div>
							<?php endif; ?>
							<?php if ( ! empty( $projectLocation ) ) : ?>
							<div class="row">
								<div class="columns small-4 medium-3">
									<div class="p strong text-neutral text-uppercase">Location:</div>
								</div>
								<div class="columns small-8 medium-9">
									<div class="p">Bangalore</div>
								</div>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Project Cover -->

	<!-- Project Gallery -->
	<script type="text/javascript">

		function loadImage ( image ) {
			return new Promise( function ( resolve, reject ) {
				var domImage;
				if ( typeof image == "string" ) {
					domImage = document.createElement( "img" );
					domImage.src = image;
				}
				else
					domImage = image;

				domImage.onload = function ( event ) {
					return resolve( event );
				};
				domImage.onerror = function ( event ) {
					return reject( event );
				};
			} );
		}

		$( function () {
			var masonry = $( ".js_gallery_masonry" ).masonry( {
				horizontalOrder: true,
				resize: true,
				stagger: 0
			} );
			masonry.on( "layoutComplete", function ( event, bricks ) {
				var domBrick = bricks.slice( -1 )[ 0 ].element;
				waitFor( 0.5 ).then( function () {
					// domBrick.className += " reveal";
					$( domBrick ).find( "img" ).addClass( "reveal" );
				} );
			} );
			// For smooth adding of gallery images as the load
			__DC.reLayoutChain = waitFor( 1 );
		} );

		__DC.gallery.forEach( function ( imageUrl, _i ) {
			var imageId = "gi_" + ( _i + 1 );
			loadImage( imageUrl )
				.then( function ( event ) {
					$( function () {
						var $gallery = $( ".js_gallery_masonry" );
						__DC.reLayoutChain = __DC.reLayoutChain.then( function () {
							var $brick = $( "#" + imageId ).parent();
							$brick.appendTo( $gallery );
							$gallery.masonry( "addItems", $brick );
							$gallery.masonry( "layout" );
							return waitFor( 0.25 );
						} );
					} );
				} )
				.catch( function () {} )


		} );

	</script>
	<div class="project-gallery">
		<div class="row">
			<div class="container position-relative js_gallery_masonry" style="overflow: hidden; transition: height 0.5s">
			</div>
			<div class="container position-relative js_gallery hide-if-js-enabled">
				<!-- Insert Image Gallery Here -->
				<?php foreach ( $oldGallery as $index => $image ) : ?>
					<div class="img-container">
						<img src="<?php echo $image[ 'url' ] . $ver ?>" id="gi_<?php echo $index + 1 ?>" class="scroll-reveal">
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<!-- END: Project Gallery -->

	<!-- Other Projects -->
	<div class="other-project space-one-bottom">
		<div class="row">
			<div class="container">
				<div class="columns small-12">
					<div class="h5 space-half-top-bottom">Check out our other projects:</div>
				</div>
			</div>
		</div>
		<div class="row carousel space-half-bottom js_carousel_container">
			<div class="project-list carousel-list text-light js_carousel_content">
				<?php foreach ( $projects as $project ) : ?>
					<a
						class="project-item carousel-list-item image-bg inline-top js_carousel_item"
						href="projects/<?php echo $project->post_name ?>"
						style="background-image: url( '<?php echo getContent( '', 'featured_image', $project->ID )[ 'url' ] . $ver ?>' );"
					>
						<div class="title h5 space-half"><?php echo $project->post_title ?></div>
					</a>
				<?php endforeach; ?>
			</div>
			<div class="carousel-controls">
				<div class="button prev fill-light js_pager" data-dir="left">Previous</div>
				<div class="button next fill-light js_pager" data-dir="right">Next</div>
			</div>
		</div>
	</div>
	<!-- END: Other Projects -->
</section>
<!-- END: Project Section -->





</div> <!-- END : Page Content -->

<?php
/* -- Design Cartel Footer -- */
	require_once __DIR__ . '/../inc/dc-footer.php';
?>
<?php
/* -- Signature -- */
	require_once __DIR__ . '/../inc/signature.php';
?>


<!-- Lazaro Signature -->
<?php //lazaro_signature(); ?>
<!-- END : Lazaro Signature -->

</div><!-- END : Page Wrapper -->

	<!-- JS Modules -->
	<script type="text/javascript" src="/js/modules/utils.js"></script>
	<script type="text/javascript" src="/plugins/masonry/masonry-v4.2.2.min.js"></script>
	<script type="text/javascript" src="/js/modules/navigation.js"></script>
	<script type="text/javascript" src="/js/modules/carousel.js"></script>
	<script type="text/javascript" src="/js/modules/tabs.js"></script>
	<script type="text/javascript" src="/js/modules/disclaimer.js"></script>

</body>

</html>
