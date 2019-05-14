<?php
/*
 *
 *	Project Page Template
 *
 */

// Page-specific preparatory code goes here.

?>

<?php require_once __DIR__ . '/../inc/above.php'; ?>





<script type="text/javascript" id="js_init_vars">

	window.__DC = { };
	__DC.gallery = [
		"media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_1.jpg",
		"media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_2.jpg",
		"media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_3.jpg",
		"media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_4.jpg",
		"media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_5.jpg",
		"media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_6.jpg",
		"media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_7.jpg",
		"media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_8.jpg",
		"media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_9.jpg",
		"media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_10.jpg",
		"media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_11.jpg",
		"media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_12.jpg",
		"media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_13.jpg",
		"media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_14.jpg",
		"media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_15.jpg",
		"media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_16.jpg"
	];

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
			<div class="block image-bg" style="background-image: url('media/home/project-1-cover.jpg<?php $ver ?>');"></div>
		</div>
		<div class="row project-content space-one-top-bottom fill-off-light">
			<div class="container">
				<div class="row">
					<div class="columns small-12 large-5 large-offset-7">
						<div class="project-name h2 space-half-bottom">The Floating Table Office</div>
						<div class="project-description p space-half-bottom">
							<p>One of the first projects we designed, which was also one of our most ambitious. The clients were looking for an innovative and unique design that mirrored their cutting edge ethos, and our entire concept was built around the idea of the suspended table. We re-engineered the work tables by cutting out the legs and suspending them from the ceiling, vastly enhancing workplace interactions.</p>

							<p>The rest of our design was based around this central idea, with spaces taking on their own character, and functions fitting in around this new layout. We managed to use design changes and innovative thinking to create an office that was unique and thought-provoking, all on a conservative budget.</p>
						</div>
						<div class="project-specs">
							<div class="row">
								<div class="columns small-4 medium-3">
									<div class="p strong text-neutral text-uppercase">For:</div>
								</div>
								<div class="columns small-8 medium-9">
									<div class="p">Lazaro Advertising Pvt. Ltd.</div>
								</div>
							</div>
							<div class="row">
								<div class="columns small-4 medium-3">
									<div class="p strong text-neutral text-uppercase">Area:</div>
								</div>
								<div class="columns small-8 medium-9">
									<div class="p">2500 square feet</div>
								</div>
							</div>
							<div class="row">
								<div class="columns small-4 medium-3">
									<div class="p strong text-neutral text-uppercase">Type:</div>
								</div>
								<div class="columns small-8 medium-9">
									<div class="p">Office Interiors</div>
								</div>
							</div>
							<div class="row">
								<div class="columns small-4 medium-3">
									<div class="p strong text-neutral text-uppercase">Location:</div>
								</div>
								<div class="columns small-8 medium-9">
									<div class="p">Bangalore</div>
								</div>
							</div>
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
				<div class="img-container">
					<img src="media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_1.jpg<?php $var ?>" class="scroll-reveal" id="gi_1">
				</div>
				<div class="img-container">
					<img src="media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_2.jpg<?php $var ?>" class="scroll-reveal" id="gi_2">
				</div>
				<div class="img-container">
					<img src="media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_3.jpg<?php $var ?>" class="scroll-reveal" id="gi_3">
				</div>
				<div class="img-container">
					<img src="media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_4.jpg<?php $var ?>" class="scroll-reveal" id="gi_4">
				</div>
				<div class="img-container">
					<img src="media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_5.jpg<?php $var ?>" class="scroll-reveal" id="gi_5">
				</div>
				<div class="img-container">
					<img src="media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_6.jpg<?php $var ?>" class="scroll-reveal" id="gi_6">
				</div>
				<div class="img-container">
					<img src="media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_7.jpg<?php $var ?>" class="scroll-reveal" id="gi_7">
				</div>
				<div class="img-container">
					<img src="media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_8.jpg<?php $var ?>" class="scroll-reveal" id="gi_8">
				</div>
				<div class="img-container">
					<img src="media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_9.jpg<?php $var ?>" class="scroll-reveal" id="gi_9">
				</div>
				<div class="img-container">
					<img src="media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_10.jpg<?php $var ?>" class="scroll-reveal" id="gi_10">
				</div>
				<div class="img-container">
					<img src="media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_11.jpg<?php $var ?>" class="scroll-reveal" id="gi_11">
				</div>
				<div class="img-container">
					<img src="media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_12.jpg<?php $var ?>" class="scroll-reveal" id="gi_12">
				</div>
				<div class="img-container">
					<img src="media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_13.jpg<?php $var ?>" class="scroll-reveal" id="gi_13">
				</div>
				<div class="img-container">
					<img src="media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_14.jpg<?php $var ?>" class="scroll-reveal" id="gi_14">
				</div>
				<div class="img-container">
					<img src="media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_15.jpg<?php $var ?>" class="scroll-reveal" id="gi_15">
				</div>
				<div class="img-container">
					<img src="media/projects/floating-table-office/DesignCartel_TheFloatingTableOffice_16.jpg<?php $var ?>" class="scroll-reveal" id="gi_16">
				</div>
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
				<div class="project-item carousel-list-item image-bg inline-top js_carousel_item" style="background-image: url('media/home/project-2-cover.jpg<?php $ver ?>');">
					<div class="title h5 space-half">The Floating Table Office</div>
				</div>
				<div class="project-item carousel-list-item image-bg inline-top js_carousel_item" style="background-image: url('media/home/project-3-cover.jpg<?php $ver ?>');">
					<div class="title h5 space-half">The Grey Office</div>
				</div>
				<div class="project-item carousel-list-item image-bg inline-top js_carousel_item" style="background-image: url('media/home/project-4-cover.jpg<?php $ver ?>');">
					<div class="title h5 space-half">The Red Office</div>
				</div>
				<div class="project-item carousel-list-item image-bg inline-top js_carousel_item" style="background-image: url('media/home/project-5-cover.jpg<?php $ver ?>');">
					<div class="title h5 space-half">The Rustic House</div>
				</div>
				<div class="project-item carousel-list-item image-bg inline-top js_carousel_item" style="background-image: url('media/home/project-6-cover.jpg<?php $ver ?>');">
					<div class="title h5 space-half">The White Office</div>
				</div>
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

<!-- Lazaro Signature -->
<?php lazaro_signature(); ?>
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
