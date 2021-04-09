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
$thisProjectIndex = null;
foreach ( $projects as $index => $project ) {
	if ( $project->post_name == $projectSlug ) {
		$thisProjectIndex = $index;
		$thisProject = $project;
		break;
	}
}
array_splice( $projects, $thisProjectIndex, 1 );

$projectName = $thisProject->post_title;
$projectFeaturedImage = getContent( '', 'featured_image', $thisProject->ID );
$projectFeaturedImageURL = $projectFeaturedImage[ 'sizes' ][ 'large' ]
							?? $projectFeaturedImage[ 'sizes' ][ 'medium_large' ]
							?? $projectFeaturedImage[ 'url' ];
$projectDescription = getContent( '', 'description', $thisProject->ID );
$projectClient = getContent( '', 'specifics -> client', $thisProject->ID );
$projectArea = getContent( '', 'specifics -> area', $thisProject->ID );
$projectType = getContent( '', 'specifics -> type', $thisProject->ID );
$projectLocation = getContent( '', 'specifics -> location', $thisProject->ID );
$projectPartners = getContent( '', 'specifics -> collaborators', $thisProject->ID );
$gallery = array_map( function ( $image ) {
	return [
		'src' => wp_get_attachment_image_url( $image[ 'ID' ], 'large' ),
		'srcset' => wp_get_attachment_image_srcset( $image[ 'ID' ], 'large' )
	];
}, getContent( '', 'gallery', $thisProject->ID ) );

?>





<!-- Project Section -->
<section class="project-section">
	<!-- Project Cover -->
	<div class="project-cover">
		<div class="row cover-image">
			<div class="block image-bg" style="background-image: url( '<?= $projectFeaturedImageURL . $ver ?>' );"></div>
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
									<div class="p"><?php echo $projectArea ?></div>
								</div>
							</div>
							<?php endif; ?>
							<?php if ( ! empty( $projectType ) ) : ?>
							<div class="row">
								<div class="columns small-4 medium-3">
									<div class="p strong text-neutral text-uppercase">Type:</div>
								</div>
								<div class="columns small-8 medium-9">
									<div class="p"><?php echo $projectType ?></div>
								</div>
							</div>
							<?php endif; ?>
							<?php if ( ! empty( $projectLocation ) ) : ?>
							<div class="row">
								<div class="columns small-4 medium-3">
									<div class="p strong text-neutral text-uppercase">Location:</div>
								</div>
								<div class="columns small-8 medium-9">
									<div class="p"><?php echo $projectLocation ?></div>
								</div>
							</div>
							<?php endif; ?>
							<?php if ( ! empty( $projectPartners ) ) : ?>
							<div class="row">
								<div class="columns small-4 medium-3">
									<div class="p strong text-neutral text-uppercase">Partners:</div>
								</div>
								<div class="columns small-8 medium-9">
									<div class="p"><?php echo $projectPartners ?></div>
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

		$( function () {



			/*
			 *
			 * ----- Set the gallery section as a Masonry layout
			 *
			 */
			var masonryGallery = $( ".js_gallery_masonry" ).masonry( {
				horizontalOrder: true,
				resize: true,
				stagger: 0
			} );
				// On completing the layout process (this is happen multiple times as and when images are completely fetched),
				// 	fade-slide-in reveal the images that have been loaded so far
			masonryGallery.on( "layoutComplete", function ( event, bricks ) {
				var domBricks = bricks.map( function ( brick ) { return brick.element } );
				$( domBricks ).find( ".js_gallery_image" ).addClass( "reveal" );
			} );

			/*
			 *
			 * ----- Set up the images to be laid out by Masonry once they are completely fetched
			 *
			 */
			var domGalleryImages = Array.prototype.slice.call( document.getElementsByClassName( "js_gallery_image" ) );
			domGalleryImages.forEach( function ( domImage ) {
				if ( domImageHasSuccessfullyLoaded( domImage ) )
					layoutImageInGallery( domImage );
				else
					domImage.addEventListener( "load", onImageLoadEventHandler )
			} );

			function domImageHasSuccessfullyLoaded ( domImage ) {
				return domImage.complete && domImage.naturalWidth;
			}

			function onImageLoadEventHandler ( event ) {
				let domImage = event.target

				if ( ! domImageHasSuccessfullyLoaded( domImage ) )
					return;

				domImage.removeEventListener( "load", onImageLoadEventHandler )
				layoutImageInGallery( domImage )
			}

			/*
			 * ----- Lays out the given image within the masonry layout
			 */
			function layoutImageInGallery ( domImage ) {
				masonryGallery.masonry( "layout" );
			}



		} );

	</script>

	<div class="project-gallery">
		<div class="row">
			<div class="container position-relative js_gallery_masonry" style="overflow: hidden; transition: height 0.5s">
				<?php foreach ( $gallery as $image ) : ?>
					<div class="img-container">
						<img src="<?= $image[ 'src' ] ?>" srcset="<?= $image[ 'srcset' ] ?>" sizes="(max-width: 300px) 100vw, (max-width: 1040px) 300px, (max-width: 1480px) 500px, 720px" class="scroll-reveal js_gallery_image">
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
					<?php
						$currentProjectFeaturedImage = getContent( '', 'featured_image', $project->ID );
						$currentProjectFeaturedImageURL = $currentProjectFeaturedImage[ 'sizes' ][ 'medium_large' ]
														?? $currentProjectFeaturedImage[ 'sizes' ][ 'large' ]
														?? $currentProjectFeaturedImage[ 'url' ];
					?>
					<a
						class="project-item carousel-list-item image-bg inline-top js_carousel_item"
						href="projects/<?php echo $project->post_name ?>"
						style="background-image: url( '<?= $currentProjectFeaturedImageURL . $ver ?>' );"
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
