<?php
/*
 *
 *	Home Page
 *
 */

// Page-specific preparatory code goes here.

?>

<?php require_once __DIR__ . '/../inc/above.php'; ?>





<!-- Sample Section -->
<section class="sample-section">
</section>
<!-- END: Sample Section -->


<!-- Header Section -->
<section class="header-section fill-light">
	<div class="row">
		<div class="container">
			<div class="logo columns small-6">
				<img src="media/icons/dc-logo.svg<?php $ver ?>">
			</div>
			<div class="navigation columns small-6">
				<div class="nav-tray">
					+ 91 98765 43210
					Services
					Portfolio
					About
					Process
					Contact Us
				</div>
				<div class="nav-toggle">
					<button class="fill-light">Menu</button>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- END: Header Section -->


<!-- Splash Video Section -->
<section class="splash-video-section">
	<div class="row">
		<div class="video-embed video-embed-bg js_video_embed js_video_get_player" data-src="MUxY21qqEhI" data-loop="true" data-autoplay="true">
			<div class="video-embed-placeholder" style="background-image: url( 'media/home/splash-video-thumb.jpg' );"></div>
		</div>
	</div>
</section>
<!-- END: Splash Video Section -->


<!-- Service Section -->
<section class="service-section">
	<div class="service-intro row space-one-top-bottom">
		<div class="container">
			<div class="columns small-12 medium-5 large-4">
				<div class="h2 space-min-bottom">Inclusive Methods. Exclusive Design.</div>
				<div class="h3 text-neutral">A new-school approach to a timeless practice.</div>
			</div>
			<div class="columns small-12 medium-offset-1 medium-6 large-7 hide-for-mobile">
				<div class="image-bg" style="background-image: url('media/home/service.jpg<?php $ver ?>');"></div>
			</div>
		</div>
	</div>
	<div class="row space-double-bottom">
		<div class="container">
			<div class="tabs columns small-12 large-10 large-offset-1">
				<div class="row tab-item show">
					<div class="columns small-12 medium-6">
						<div class="tab-title fill-off-neutral button block text-left">Architecture & Interior design</div>
					</div>
					<div class="columns small-12 medium-6">
						<div class="tab-content p">Our Architecture and Interior Design studio, in business since 2015, is our bread and butter. Led by Kaushik Kumar, we have designed and executed dozens of projects, bringing our own flavour to each one.</div>
					</div>
				</div>
				<div class="row tab-item">
					<div class="columns small-12 medium-6">
						<div class="tab-title fill-off-neutral button block text-left">In-depth Research & Design</div>
					</div>
					<div class="columns small-12 medium-6">
						<div class="tab-content p">Exploring the intersections between art and architecture, our Deep Design studio applies design thinking to domains in and beyond architecture. This allows us to work within the latest industry practices. Chandrakanth GM takes charge of this studio.</div>
					</div>
				</div>
				<div class="row tab-item">
					<div class="columns small-12 medium-6">
						<div class="tab-title fill-off-neutral button block text-left">Project Management</div>
					</div>
					<div class="columns small-12 medium-6">
						<div class="tab-content p">While we apply our time-tested and watertight project management capabilities to every project, Joshy Thomas and his project management department offer these services as a standalone to other architects or builders as well.</div>
					</div>
				</div>
				<div class="row tab-item">
					<div class="columns small-12 medium-6">
						<div class="tab-title fill-off-neutral button block text-left">3D & VR Studio</div>
					</div>
					<div class="columns small-12 medium-6">
						<div class="tab-content p">This studio provides cutting-edge 3D and Virtual Reality services as an add-on to any existing project. Similar to our Project Management department, this works as a modular plugin to our own projects, or as a direct service to others.</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- END: Service Section -->


<!-- Portfolio Section -->
<section class="portfolio-section">
	<div class="featured-project">
		<div class="row featured-image">
			<div class="block image-bg" style="background-image: url('media/home/project-1-cover.jpg<?php $ver ?>');"></div>
		</div>
		<div class="row featured-content space-one-top-bottom fill-off-neutral">
			<div class="container">
				<div class="row">
					<div class="columns small-12 large-5 large-offset-7">
						<div class="row">
							<div class="columns small-12 medium-4 large-5">
								<div class="h4 space-half-bottom">We believe in designing the bigger picture.</div>
							</div>
							<div class="columns small-12 medium-6 medium-offset-2 large-6 large-offset-1">
								<div class="p space-one-bottom">
									Our birds-eye perspective on planning and execution allows us to get our hands dirty when it comes to design.
									<br><br>
									Our independently functioning studios work in tandem to execute a collective vision. We also bring in the right collaborators at the right stage, to do the job right.
									<br><br>
									That’s why we call ourselves a cartel.
								</div>
							</div>
							<div class="columns small-12 medium-5">
								<div class="h5 featured-name">Bau-House</div>
							</div>
							<div class="columns small-12 medium-6 medium-offset-1">
								<div class="button">View Project</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="other-project space-one-bottom">
		<div class="row">
			<div class="container">
				<div class="columns small-12">
					<div class="h5 space-half-top-bottom">Check out our other projects:</div>
				</div>
			</div>
		</div>
		<div class="row carousel space-half-bottom">
			<div class="project-list carousel-list text-light">
				<div class="project-item carousel-list-item image-bg inline-top" style="background-image: url('media/home/project-2-cover.jpg<?php $ver ?>');">
					<div class="h5 space-half">The Floating Table Office</div>
				</div>
				<div class="project-item carousel-list-item image-bg inline-top" style="background-image: url('media/home/project-3-cover.jpg<?php $ver ?>');">
					<div class="h5 space-half">The Grey Office</div>
				</div>
				<div class="project-item carousel-list-item image-bg inline-top" style="background-image: url('media/home/project-4-cover.jpg<?php $ver ?>');">
					<div class="h5 space-half">The Red Office</div>
				</div>
				<div class="project-item carousel-list-item image-bg inline-top" style="background-image: url('media/home/project-5-cover.jpg<?php $ver ?>');">
					<div class="h5 space-half">The Rustic House</div>
				</div>
				<div class="project-item carousel-list-item image-bg inline-top" style="background-image: url('media/home/project-6-cover.jpg<?php $ver ?>');">
					<div class="h5 space-half">The White Office</div>
				</div>
			</div>
			<div class="carousel-controls">
				<div class="button prev fill-light">Previous</div>
				<div class="button next fill-light">Next</div>
			</div>
		</div>
	</div>
</section>
<!-- END: Portfolio Section -->


<!-- About Section -->
<section class="about-section space-double-bottom">
	<div class="row about-intro">
		<div class="container">
			<div class="frame columns small-12 medium-8 fill-off-neutral space-one-top-bottom">
				<div class="h3 space-half-bottom">What do you get when you put two architects and an engineer to work in an office that used to be a music studio in the 80s?</div>
				<div class="p strong">An architecture and design firm that functions like a well-oiled machine.</div>
			</div>
		</div>
	</div>
	<div class="row about-image">
		<div class="block image-bg" style="background-image: url('media/home/about.jpg<?php $ver ?>');"></div>
	</div>
	<div class="row about-content">
		<div class="container">
			<div class="columns small-12 large-4 large-offset-1">
				<div class="p space-half-top">
					We mix and match our in-house departments, trusted collaborators, contractors, and skilful technicians to create a highly efficient assembly chain. Each section plugs in and out at just the right point in the process.
					<br><br>
					What brings the studio heads of Design Cartel together is a shared academic and research-based experience in architecture. However, the origin stories are quite diverse. Within this company are a professional musician, a photographer, a DIY enthusiast, avid travellers, and Scotch enthusiasts. Knowledge and experience from these other creative fields trickle into the smallest design nuances.
				</div>
			</div>
		</div>
	</div>
</section>
<!-- END: About Section -->


<!-- Process Section -->
<section class="process-section block space-one-top-bottom fill-off-neutral" style="background-image: url('https://via.placeholder.com/800<?php $ver ?>'); background-position: center center; background-size: cover; background-blend-mode: multiply;">
	<div class="row">
		<div class="container">
			<div class="columns small-12">
				<div class="h3 space-half-bottom">Here’s a look at how our projects take shape:</div>
			</div>
			<div class="tabs columns small-12 large-10 large-offset-1">
				<div class="row tab-item show">
					<div class="columns small-12 medium-6">
						<div class="tab-title fill-off-light button block text-left">Project Brief</div>
					</div>
					<div class="columns small-12 medium-6">
						<div class="tab-content p">
							<div class="h5">We start our project with a deep dive into the collective vision.</div>
							<br>
							We want to hear stories, discuss ideas, and ascertain the true nature of what we’re setting out to do, over some freshly brewed coffee.
							<br><br>
							This journey begins with going into the inspiration for the space, looking at detailed references, and putting a tentative budget together.
						</div>
					</div>
				</div>
				<div class="row tab-item">
					<div class="columns small-12 medium-6">
						<div class="tab-title fill-off-light button block text-left">Conceptualisation</div>
					</div>
					<div class="columns small-12 medium-6">
						<div class="tab-content p">
							<div class="h5">Once we have all the information we need and we’ve established our methodology, we get to the drawing board (and sometimes our LEGO blocks).</div>
							<br>
							This stage is when we sit down with our multi-faceted and experienced collaborators to help finalise the overall project.
						</div>
					</div>
				</div>
				<div class="row tab-item">
					<div class="columns small-12 medium-6">
						<div class="tab-title fill-off-light button block text-left">Implementation</div>
					</div>
					<div class="columns small-12 medium-6">
						<div class="tab-content p">
							<div class="h5">Once the concepts are green-lit, we will help you create and issue a Work Order, along with a list of all the finalised items that will go into the project.</div>
							<br>
							A comprehensive project timeline will help everyone keep up with the project status.
						</div>
					</div>
				</div>
				<div class="row tab-item">
					<div class="columns small-12 medium-6">
						<div class="tab-title fill-off-light button block text-left">Construction</div>
					</div>
					<div class="columns small-12 medium-6">
						<div class="tab-content p">
							<div class="h5">We’re sticklers for detail and love an organised project.</div>
							<br>
							To ensure everything is running smoothly, we supervise all collaborators, consultants, and labour. We share updates at every stage of the construction process by comparing the completed work with the project timeline.
							<br><br>
							Constant reviews and site visits are also done to ensure quality and consistency.
						</div>
					</div>
				</div>
				<div class="row tab-item">
					<div class="columns small-12 medium-6">
						<div class="tab-title fill-off-light button block text-left">Handover</div>
					</div>
					<div class="columns small-12 medium-6">
						<div class="tab-content p">
							<div class="h5">A final quality check of everything, including a detailed inspection will be done before all the project documents are shared.</div>
							<br>
							Once all payments and paperwork are closed, the project is then added to our ever-growing portfolio of unique living, working, and commercial experiences.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- END: Process Section -->


<!-- Testimonial Section -->
<section class="testimonial-section space-one-top-bottom">
	<div class="row">
		<div class="container">
			<div class="columns small-12">
				<div class="h4 space-half-top-bottom">Every project is an opportunity to do great work with great people.</div>
			</div>
		</div>
	</div>
	<div class="row carousel space-half-bottom">
		<div class="testimonial-list carousel-list text-light">
			<div class="testimonial-item carousel-list-item image-bg inline-top fill-off-neutral space-half">
				<div class="icon" style="background-image: url('https://via.placeholder.com/64'<?php $ver ?>)"></div>
				<div class="content p space-half-top-bottom">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur.</div>
				<div class="name p strong space-min-bottom">Firstname Lastname</div>
				<div class="company p">XYZ Company</div>
			</div>
			<div class="testimonial-item carousel-list-item image-bg inline-top fill-off-neutral space-half">
				<div class="icon" style="background-image: url('https://via.placeholder.com/64'<?php $ver ?>)"></div>
				<div class="content p space-half-top-bottom">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur.</div>
				<div class="name p strong space-min-bottom">Firstname Lastname</div>
				<div class="company p">XYZ Company</div>
			</div>
			<div class="testimonial-item carousel-list-item image-bg inline-top fill-off-neutral space-half">
				<div class="icon" style="background-image: url('https://via.placeholder.com/64'<?php $ver ?>)"></div>
				<div class="content p space-half-top-bottom">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur.</div>
				<div class="name p strong space-min-bottom">Firstname Lastname</div>
				<div class="company p">XYZ Company</div>
			</div>
			<div class="testimonial-item carousel-list-item image-bg inline-top fill-off-neutral space-half">
				<div class="icon" style="background-image: url('https://via.placeholder.com/64'<?php $ver ?>)"></div>
				<div class="content p space-half-top-bottom">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur.</div>
				<div class="name p strong space-min-bottom">Firstname Lastname</div>
				<div class="company p">XYZ Company</div>
			</div>
			<div class="testimonial-item carousel-list-item image-bg inline-top fill-off-neutral space-half">
				<div class="icon" style="background-image: url('https://via.placeholder.com/64'<?php $ver ?>)"></div>
				<div class="content p space-half-top-bottom">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur.</div>
				<div class="name p strong space-min-bottom">Firstname Lastname</div>
				<div class="company p">XYZ Company</div>
			</div>
		</div>
		<div class="carousel-controls">
			<div class="button prev fill-light">Previous</div>
			<div class="button next fill-light">Next</div>
		</div>
	</div>
</section>
<!-- END: Testimonial Section -->


<!-- Contact Section -->
<section class="contact-section">
	<div class="contact-intro row">
		<div class="container">
			<div class="frame columns small-12 medium-10 large-5 fill-off-neutral space-one-top space-half-bottom">
				<div class="h3 space-half-bottom">We’re the only cartel in the world that will tell you our location.</div>
				<div class="p space-min-bottom">
					198 Link Road, Seshadripuram<br>
					Bangalore – 560020<br>
					Karnataka, India
				</div>

				<a class="block p" href="tel:+919876543210">+91 98765 43210</a>
			</div>
		</div>
	</div>
	<div class="contact-form row">
		<div class="container">
			<form class="form">
				<div class="frame columns small-12 medium-10 medium-offset-2 large-8 large-offset-4 fill-off-dark space-half-top space-one-bottom">
					<div class="title h5 text-uppercase">Get in Touch</div>
					<div class="row">
						<div class="form-item columns small-12 medium-6">
							<div class="label">
								<span class="visuallyhidden">Name (Required)</span>
								<input type="text" class="block" placeholder="Name*">
							</div>
						</div>
						<div class="form-item columns small-12 medium-6">
							<div class="label">
								<span class="visuallyhidden">Company</span>
								<input type="text" class="block" placeholder="Company">
							</div>
						</div>
						<div class="form-item columns small-12 medium-6">
							<div class="label">
								<span class="visuallyhidden">Location (Required)</span>
								<input type="text" class="block" placeholder="Location*">
							</div>
						</div>
						<div class="form-item columns small-12 medium-6">
							<div class="label">
								<span class="visuallyhidden">Contact Number (Required)</span>
								<input type="text" class="block" placeholder="Contact Number*">
							</div>
						</div>
						<div class="form-item columns small-12 medium-6">
							<div class="label">
								<span class="visuallyhidden">Email (Required)</span>
								<input type="text" class="block" placeholder="Email*">
							</div>
						</div>
						<div class="form-item columns small-12 medium-6">
							<div class="label">
								<span class="visuallyhidden">Type of Inquiry (Required)</span>
								<select class="block">
									<option disabled="" selected="">Type of Inquiry*</option>
									<option>Residential</option>
									<option>Commercial</option>
								</select>
							</div>
						</div>
						<div class="form-item columns small-12">
							<div class="label">
								<span class="visuallyhidden">How can we help you?</span>
								<textarea class="block" placeholder="How can we help you?"></textarea>
							</div>
						</div>
						<div class="form-item columns small-6 medium-3">
							<div class="label">
								<span class="visuallyhidden">Send</span>
								<button class="button block">Send</button>
							</div>
						</div>
						<div class="form-item columns small-12 medium-9">
							<div class="feedback p">Thank you! We’ll get back to you shortly.</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<!-- END: Contact Section -->


<!-- Footer Section -->
<section class="footer-section fill-off-neutral space-half-top-bottom">
	<div class="row">
		<div class="container">
			<div class="social columns small-12 medium-3 inline-middle">
				<a class="inline-top" href="https://twitter.com/DesignCartelBlr" target="_blank"><img src="media/icons/icon-twitter.svg<?php $var ?>"></a>
				<a class="inline-top" href="https://in.linkedin.com/company/designcartel" target="_blank"><img src="media/icons/icon-linkedin.svg<?php $var ?>"></a>
				<a class="inline-top" href="https://www.facebook.com/designcartel.in" target="_blank"><img src="media/icons/icon-facebook.svg<?php $var ?>"></a>
				<a class="inline-top" href="https://www.instagram.com/designcartelindia/" target="_blank"><img src="media/icons/icon-instagram.svg<?php $var ?>"></a>
				<a class="inline-top" href="https://www.behance.net/design-cartel" target="_blank"><img src="media/icons/icon-behance.svg<?php $var ?>"></a>
			</div>
			<div class="signature columns small-12 medium-6 inline-middle">
				<div class="label text-center">Architecture | Interior Design | Project Management <span class="hide-for-tablet">|</span> Bangalore, India</div>
			</div>
			<div class="logo columns small-12 medium-3 inline-middle">
				<img src="media/icons/dc-logo.svg<?php $ver ?>">
			</div>
		</div>
	</div>
</section>
<!-- END: Footer Section -->


<!-- Sample Section -->
<section class="sample-section">
</section>
<!-- END: Sample Section -->





<?php require_once __DIR__ . '/../inc/below.php'; ?>
