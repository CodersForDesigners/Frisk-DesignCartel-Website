<?php

// Get utility functions
require_once __DIR__ . '/utils.php';
// Include WordPress for Content Management
initWordPress();

/* -- Lazaro disclaimer and footer -- */
require_once __DIR__ . '/lazaro.php';

/*
 * A version number for versioning assets to invalidate the browser cache
 */
$ver = '?v=20181126';

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml"
	prefix="og: http://ogp.me/ns# fb: http://www.facebook.com/2008/fbml">

	<?php require_once 'head.php'; ?>

	<body id="body" class="body">

	<!--  ★  MARKUP GOES HERE  ★  -->

	<div id="page-wrapper" data-page="<?php echo $viewName ?>"><!-- Page Wrapper -->

		<?php require_once 'navigation.php'; ?>

		<!-- Page Content -->
		<div id="page-content">
