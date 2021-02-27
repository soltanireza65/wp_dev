<?php


get_header();
?>

<main id="primary" class="site-main">

	<section class="error-404 not-found">

		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 mt-5">
					<div class="c-404 text-center">
						<div class="c-404__title">
							<h1>صفحه مورد نظر شما یافت نشد!</h1>
						</div>

						<div class="c-404__image"><img src="<?php echo get_theme_file_uri('/assets/images/404.png'); ?>" alt="404"></div>
						<div class="c-404__actions c_404_goto_home  mt-3 mx-auto">
							<a href="<?php echo site_url(); ?>" class="c-404__action btn btn-block text-white radius">صفحه نخست</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
