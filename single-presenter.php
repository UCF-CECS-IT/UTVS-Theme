<?php

get_header();
the_post();

$headshot = get_field( 'presenter_headshot', $post->ID );
$organization = get_field( 'presenter_organization', $post->ID );
$role = get_field( 'presenter_role', $post->ID );
$bio = get_field( 'presenter_bio', $post->ID ) ?: 'TBD';
$title = get_field( 'presenter_presentation_title', $post->ID) ?: 'TBD';
$abstract = get_field( 'presenter_presentation_abstract', $post->ID ) ?: 'TBD';

?>

<div class="container mt-4 mt-sm-5 mb-5 pb-sm-4 ucf-post-list ucfwp-post-list-people">
	<div class="row">
		<div class="col-lg-3 col-md-4">
			<img class="img-fluid box-shadow-soft" src="<?php echo $headshot; ?>">
		</div>
		<div class="col-lg-9 col-md-8">
			<h2 class="heading-underline text-transform-none">
				<?php echo $organization; ?> <br>
				<small class="font-slab-serif"><?php echo $role; ?></small><br>
			</h2>
			<div>
				<?php echo $bio; ?>
			</div>
			<hr class="bg-primary my-4">
			<h5>Talk:</h5>
			<p><?php echo $title; ?>

			<h5>Abstract:</h5>
			<p><?php echo $abstract; ?>
		</div>
	</div>
</div>

<?php

get_footer();

?>
