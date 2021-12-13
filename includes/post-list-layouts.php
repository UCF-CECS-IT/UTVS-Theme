<?php

function utvs_post_list_layouts( $layouts ) {

	$layouts['utvs'] = 'Presenter Layout';
	$layouts['pantheon'] = 'Pantheon of Videos Layout';
	$layouts['committee'] = 'Committee Layout';

	return $layouts;
}

add_filter( 'ucf_post_list_get_layouts', 'utvs_post_list_layouts' );


/**
 * UTVS layout
 */
if ( ! function_exists( 'ucfwp_post_list_display_utvs_before' ) ) {
	function ucfwp_post_list_display_utvs_before( $content, $items, $atts ) {
		ob_start();
	?>
	<div class="ucf-post-list ucfwp-post-list-utvs">
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_utvs_before', 'ucfwp_post_list_display_utvs_before', 10, 3 );

if ( ! function_exists( 'ucfwp_post_list_display_utvs_title' ) ) {
	function ucfwp_post_list_display_utvs_title( $content, $items, $atts ) {
		$formatted_title = '';
		if ( $atts['list_title'] ) {
			$formatted_title = '<h2 class="ucf-post-list-title">' . $atts['list_title'] . '</h2>';
		}
		return $formatted_title;
	}
}

add_filter( 'ucf_post_list_display_utvs_title', 'ucfwp_post_list_display_utvs_title', 10, 3 );

if ( ! function_exists( 'ucfwp_post_list_display_utvs' ) ) {
	function ucfwp_post_list_display_utvs( $content, $items, $atts ) {
		if ( ! is_array( $items ) && $items !== false ) { $items = array( $items ); }

		if ( $items ):
			$groupedByPresentation = group_by_presentation( $items );
			ob_start();
			?>

			<div class="row ucf-post-list-items">
				<?php foreach ( $groupedByPresentation as $group ): ?>
					<?php foreach($group as $item):
						$prefix = get_field( 'presenter_title_prefix', $item->ID );
						$first = get_field( 'presenter_first_name', $item->ID );
						$last = get_field( 'presenter_last_name', $item->ID );
						$suffix = get_field( 'presenter_title_suffix', $item->ID );
						$role = get_field( 'presenter_role', $item->ID );
						$org = get_field( 'presenter_organization', $item->ID );
						$topic = get_field( 'presenter_topic', $item->ID );
						$time = get_field( 'presenter_time', $item->ID );
						$headshot = get_field( 'presenter_headshot', $item->ID );
						$name = '';
						if ($prefix) {
							$name .= "{$prefix} ";
						}
						$name .= "{$first} {$last}";
						if ($suffix) {
							$name .= ", {$suffix}";
						}
						?>
						<div class="col-xl-3 col-lg-4 col-md-6 mb-3 utvs-post-list-item">
							<div class="card h-100 box-shadow-soft">
								<a class="person-link" href="<?php echo get_permalink( $item->ID ); ?>">
									<img class="card-img-top" src="<?php echo $headshot; ?>">
								</a>
								<div class="p-3 font-size-sm d-flex flex-column">
									<h5 class="heading-underline text-transform-none mb-2"><span class="font-serif"><?php echo $name; ?></span></h5>
									<div class="role-text mb-1 font-italic"><?php echo $role; ?>, <b><?php echo $org; ?></b></div>
									<hr class="w-100 my-1">
									<p class="card-text mb-1"><b>Topic:</b> <?php echo $topic; ?></p>
									<p class="card-text"><b>Time:</b> <?php echo $time; ?></p>
									<div class="text-center mt-auto mb-0"><a class="btn btn-primary btn-sm" href="<?php echo get_permalink( $item->ID ); ?>">More Info</a></div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endforeach; ?>
			</div>
		<?php else: ?>
			<div class="ucf-post-list-error mb-4">More presenters will be added soon.</div>
		<?php endif; ?>
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_utvs', 'ucfwp_post_list_display_utvs', 10, 3 );


if ( ! function_exists( 'ucfwp_post_list_display_utvs_after' ) ) {
	function ucfwp_post_list_display_utvs_after( $content, $items, $atts ) {
		ob_start();
	?>
	</div>
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_utvs_after', 'ucfwp_post_list_display_utvs_after', 10, 3 );

/**
 * Groups presenters by presentation title and alphabetizes each group
 *
 * @param array $items
 * @return array
 */
function group_by_presentation( $items ) {

	$grouped = array();

	usort($items, function ($a, $b) {
		return ( get_field( 'presenter_last_name', $a->ID ) <=> get_field( 'presenter_last_name', $b->ID ) );
	});

	foreach( $items as $item ) {
		$topic = get_field( 'presenter_topic', $item->ID );
		$grouped[$topic][] = $item;
	}

	return $grouped;
}

/**
 * PANTEHON layout
 */
if ( ! function_exists( 'ucfwp_post_list_display_pantheon_before' ) ) {
	function ucfwp_post_list_display_pantheon_before( $content, $items, $atts ) {
		ob_start();
	?>
	<div class="ucf-post-list ucfwp-post-list-pantheon">
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_pantheon_before', 'ucfwp_post_list_display_pantheon_before', 10, 3 );

if ( ! function_exists( 'ucfwp_post_list_display_pantheon_title' ) ) {
	function ucfwp_post_list_display_pantheon_title( $content, $items, $atts ) {
		$formatted_title = '';
		if ( $atts['list_title'] ) {
			$formatted_title = '<h2 class="ucf-post-list-title">' . $atts['list_title'] . '</h2>';
		}
		return $formatted_title;
	}
}

add_filter( 'ucf_post_list_display_pantheon_title', 'ucfwp_post_list_display_pantheon_title', 10, 3 );

if ( ! function_exists( 'ucfwp_post_list_display_pantheon' ) ) {
	function ucfwp_post_list_display_pantheon( $content, $items, $atts ) {
		if ( ! is_array( $items ) && $items !== false ) { $items = array( $items ); }

		if ( $items ):
			ob_start();

			$grouped = group_by_category( $items );

			?>
			<table class="table table-bordered table-responsive font-size-pantheon">
				<thead>
					<tr class="bg-primary">
						<th>Presenter</th>
						<th>Title of Presentation</th>
						<th>Contact</th>
						<th>Video</th>
					</tr>
				</thead>

				<?php foreach ($grouped as $group => $items): ?>
					<tbody>
						<tr class="bg-primary-lightest">
							<th colspan="4"><?php echo $group; ?></th>
						</tr>
						<?php foreach ($items as $item):
							$presenters = get_field( 'archive_presenters', $item->ID );
							$video = get_field( 'archive_video', $item->ID );
							$contact_details = get_field( 'archive_contact_details', $item->ID );
							$topic = get_field( 'presenter_topic', $presenters[0]->ID );
							?>
							<tr>
								<td>
									<?php foreach ($presenters as $presenter):
										$prefix = get_field( 'presenter_title_prefix', $item->ID );
										$first = get_field( 'presenter_first_name', $item->ID );
										$last = get_field( 'presenter_last_name', $item->ID );
										$suffix = get_field( 'presenter_title_suffix', $item->ID );
										$role = get_field( 'presenter_role', $item->ID );
										$org = get_field( 'presenter_organization', $item->ID );
										$name = '';
										if ($prefix) {
											$name .= "{$prefix} ";
										}
										$name .= "{$first} {$last}";
										if ($suffix) {
											$name .= ", {$suffix}";
										}
										?>
										<p><?php echo $name; ?>, <span class="font-slab-serif"><?php echo $role; ?>, <?php echo $org; ?></span></p>
									<?php endforeach; ?>
								</td>
								<td><?php echo $topic; ?></td>
								<td>
									<?php if ( $rows = have_rows('archive_contact_details') ): ?>
										<ul
											<?php if (count($rows) == get_row_index()): ?>
												class="mb-0"
											<?php endif; ?>
											>
											<?php while ( have_rows('repeater_field_name') ) : the_row();
												$email = get_field( 'archive_email' );
												$website = get_field( 'archive_website' );
												$linkedin = get_field( 'archive_linkedin' );
												$youtube = get_field( 'archive_youtube' );
												$facebook = get_field( 'archive_facebook' );

												if ( $email ) {
													echo "<li><a href='mailto:{$email}'>{$email}</a></li>";
												}
												if ( $website ) {
													echo "<li><a href='{$website}' target='_blank'>Website</a></li>";
												}
												if ( $linkedin ) {
													echo "<li><a href='{$linkedin}' target='_blank'>LinkedIn</a></li>";
												}
												if ( $youtube ) {
													echo "<li><a href='{$youtube}' target='_blank'>YouTube</a></li>";
												}
												if ( $facebook ) {
													echo "<li><a href='{$facebook}' target='_blank'>Facebook</a></li>";
												}
												?>
											<?php endwhile; ?>
										</ul>
									<?php endif; ?>
								</td>
								<td>
									<?php if ($video): ?>
										<a href="<?php echo $video; ?>" target="_blank">View</a>
									<?php else: ?>
										Not Available
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				<?php endforeach; ?>


			</table>
		<?php else: ?>
			<div class="ucf-post-list-error mb-4">No results found.</div>
		<?php endif; ?>
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_pantheon', 'ucfwp_post_list_display_pantheon', 10, 3 );


if ( ! function_exists( 'ucfwp_post_list_display_pantheon_after' ) ) {
	function ucfwp_post_list_display_pantheon_after( $content, $items, $atts ) {
		ob_start();
	?>
	</div>
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_pantheon_after', 'ucfwp_post_list_display_pantheon_after', 10, 3 );

function group_by_category( array $items ) {
	$grouped = array();
	$categorized = array();

	foreach ($items as $item) {
		$category = get_the_category( $item->ID );
		$categorized[$category] = $item;
	}

	/**
	 * Legacy categories must remain in this array in their display order for
	 * archive pages
	 */
	$orderedCategories = [
		'am-keynote' => 'AM Keynote',
		'student-experience' => 'Student Experience Panel',
		'research-experience' => 'Research Experience',
		'alumni-experience' => 'Alumni Experience',
		'investor-experience' => 'Investor Experience',
		'pm-keynote' => 'PM Keynote',

	];

	return $grouped;
}

/**
 * COMMITTEE layout
 */

if ( ! function_exists( 'ucfwp_post_list_display_committee_before' ) ) {
	function ucfwp_post_list_display_committee_before( $content, $items, $atts ) {
		ob_start();
	?>
	<div class="ucf-post-list ucfwp-post-list-committee">
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_committee_before', 'ucfwp_post_list_display_committee_before', 10, 3 );

if ( ! function_exists( 'ucfwp_post_list_display_committee_title' ) ) {
	function ucfwp_post_list_display_committee_title( $content, $items, $atts ) {
		$formatted_title = '';
		if ( $atts['list_title'] ) {
			$formatted_title = '<h2 class="ucf-post-list-title">' . $atts['list_title'] . '</h2>';
		}
		return $formatted_title;
	}
}

add_filter( 'ucf_post_list_display_committee_title', 'ucfwp_post_list_display_committee_title', 10, 3 );

if ( ! function_exists( 'ucfwp_post_list_display_committee' ) ) {
	function ucfwp_post_list_display_committee( $content, $items, $atts ) {
		if ( ! is_array( $items ) && $items !== false ) { $items = array( $items ); }

		if ( $items ):
			ob_start();
			?>
			<ul class="list-group list-group-flush ucf-post-list-items">
				<?php foreach($items as $item):
					$prefix = get_field( 'person_title_prefix', $item->ID );
					$suffix = get_field( 'person_title_suffix', $item->ID );
					$role = get_field( 'person_jobtitle', $item->ID );
					$org = get_field( 'person_organization', $item->ID );
					$time = get_field( 'presenter_time', $item->ID );
					$headshot = get_the_post_thumbnail_url( $item->ID );
					$name = $item->post_title;
					?>
					<li class="list-group-item">
						<div class="row">
							<div class="col-md-2">
								<img class="img-fluid rounded" src="<?php echo $headshot; ?>">
							</div>
							<div class="col-md-10">
								<h4 class="heading-underline text-transform-none card-title mb-1"><?php echo $prefix . ' '; ?><span class="font-serif"><?php echo $name; ?><?php echo ' ' . $suffix; ?></span></h4>
								<p class="mb-2 font-italic"><?php echo $role; ?>, <span style="font-weight: 500;"><?php echo $org; ?></span></p>
								<p style="font-size: 85%"><?php echo $item->post_content; ?></p>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php else: ?>
			<div class="ucf-post-list-error mb-4">No results found.</div>
		<?php endif; ?>
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_committee', 'ucfwp_post_list_display_committee', 10, 3 );


if ( ! function_exists( 'ucfwp_post_list_display_committee_after' ) ) {
	function ucfwp_post_list_display_committee_after( $content, $items, $atts ) {
		ob_start();
	?>
	</div>
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_committee_after', 'ucfwp_post_list_display_committee_after', 10, 3 );
