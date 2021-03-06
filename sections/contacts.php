
		<?php $tdu = get_template_directory_uri(); ?>

<?php if(get_sub_field('type') == 'offices'){ ?>
<!-- IF OFFICES -->

<?php $offices = get_sub_field('offices'); ?>
<?php $count=1; ?>
<?php foreach ($offices as $value) {

	 $value->post_title;
	 $id = $value->ID;

?>
<div class="office_list office_list_<?php echo $count % 2; ?>">
<div class="container">

	<ul class="people city">
			<li class="person">
					<div class="profile_picture">
							<div class="image_from_background" style="background-image: url('<?php echo get_field('flag', $id)['url']; ?>"></div>
					</div>
					<div class="profile_details">
							<h2><?php echo get_field('suburb', $id); ?></h2>
<p>

    <?php $address = get_field('address', $id); ?>
    <?php $postcode = get_field('postcode', $id); ?>
    <?php $telephone = get_field('telephone', $id); ?>
    <?php $email = get_field('email', $id); ?>
    <?php $email2 = get_field('email2', $id); ?>
    <?php $fax = get_field('fax', $id); ?>

    <?php if ($address) { echo $address  . ', ';} ?>
    <?php if ($postcode) { echo $postcode; } ?>
    <?php echo get_field('suburb', $id); ?> - <?php echo get_field('country', $id); ?> <br />
    <?php if ($telephone) { echo 'TEL : <a href="tel:' . $telephone . '">'. $telephone.'</a>' ;} ?>
    <?php if ($telephone && $fax) { echo ' - ';} ?>
    <?php if ($fax) { echo 'FAX : <a href="tel:' . $fax . '">'. $fax.'</a>'; }; ?><br />
    <?php if ($email) { echo '<a href="mailto:' . $email . '">' . $email . '</a>';} ?>
    <?php if ($email2) { echo ' - <a href="mailto:' . $email2 . '">' . $email2 . '</a>';} ?>
	</p>
							</div>

					</li>

			</ul>
			<ul class="people row">
				<?php $post_count = 1; ?>

<?php $args = array(
'post_type' => 'person',
'posts_per_page' => -1,
'orderby' => 'meta_value',
'meta_key' => 'surname',
'order' => 'ASC',
'meta_query' => array(
        array(
            'key' => 'office',
            'value' => $id,
            'compare' => 'LIKE'
        )
			));
query_posts($args); while (have_posts()) : the_post(); ?>

<?php $post_id = get_the_ID(); ?>
<li class="person col-sm-4">
	<div class="profile_details">
		<h2><?php the_title(); ?></h2>
        <?php
        $telephone = get_field('telephone', $post_id);
        $mobile = get_field('mobile', $post_id);
        $email = get_field('email', $post_id);
        $email2 = get_field('email2', $post_id);
        $position = get_field('position', $post_id);
         ?>
		<p>
				<?php if ($position) { echo '<strong>' . $position . '</strong><br>';} ?>
        <?php if ($telephone) { echo '&#9743; Tel: <a href="tel:'. $telephone.'">' . $telephone .  '</a> <br>';} ?>
        <?php if ($mobile) { echo '&#9990;	 Mobile: <a href="tel:'. $mobile.'">' . $mobile .  '</a> <br>';} ?>
        <?php if ($email) { echo '&#9993; Email: <a href="mailto:' . $email . '">' . $email .  '</a><br>';} ?>
        <?php if ($email2) { echo '&#9993; Email: <a href="mailto:' . $email2 . '">' . $email2 .  '</a> <br>';} ?>

		</p>
	</div>
</li>
<?php if($post_count % 3 == 0){echo "</ul><ul class='people row'>";} ?>

<?php $post_count++; ?>
<?php endwhile; ?>
</ul>

</div>
</div>

<?php $count++; ?>
<?php } ?>
</div>
</div>
<?php }



// END OF OFFICES
// BEGINNING OF PEOPLE

 elseif(get_sub_field('type') == 'people'){ ?>
	 <div class="contacts_az">

	 	<div class="contact_list">
	 		<div class="container">
	 <ul class="people row">
	 	<?php $post_count = 1; ?>
		<?php $firstletter = ""; ?>
        <?php $letters = array('A'=>false, 'B'=>false, 'C'=>false, 'D'=>false, 'E'=>false, 'F'=>false, 'G' =>false , 'H'=>false, 'I'=>false, 'J'=>false, 'K'=>false, 'L'=>false, 'M'=>false, 'N'=>false, 'O'=>false, 'P'=>false, 'Q'=>false, 'R'=>false, 'S'=>false, 'T'=>false, 'U'=>false, 'V'=>false, 'W'=>false, 'X'=>false, 'Y'=>false, 'Z'=>false); ?>



		<?php $args = array(
    		'post_type' => 'person',
				'posts_per_page' => -1,
				'orderby' => 'meta_value',
				'meta_key' => 'surname',
				'order' => 'ASC',
    		'meta_key'			=> 'surname',
    		'orderby'			=> 'meta_value',
    		'order'				=> 'ASC'
	       );
		query_posts($args); while (have_posts()) : the_post(); ?>
		<?php $old_firstletter = $firstletter ?>
		<?php $surname = get_field('surname'); ?>
		<?php $surname = preg_replace('/\s+/', '', $surname); ?>
		<?php $firstletter = substr($surname, 0, 1); ?>
		<?php if($firstletter != $old_firstletter){
			$post_count = 1;
			echo '</ul><div class="people_letter" id="' . $firstletter .'">' . $firstletter . '</div><ul class="people row">';
			$letters[$firstletter]=true;

		} ?>

		<?php $post_id = get_the_ID(); ?>
		<li class="person col-sm-4">
			<div class="profile_details">
				<h2><?php the_title(); ?></h2>
				<p>
                    <?php
										$position = get_field('position', $post_id);
                    $telephone = get_field('telephone', $post_id);
                    $mobile = get_field('mobile', $post_id);
                    $email = get_field('email', $post_id);
                    $email2 = get_field('email2', $post_id);
                     ?>
				<?php if ($position) { echo '<strong>' . $position . '</strong><br>';} ?>
				<?php if ($telephone) { echo '&#9743; Tel: <a href="tel:'. $telephone.'">' . $telephone .  '</a> <br>';} ?>
				<?php if ($mobile) { echo '&#9990;	 Mobile: <a href="tel:'. $mobile.'">' . $mobile .  '</a> <br>';} ?>
				<?php if ($email) { echo '&#9993; Email: <a href="mailto:' . $email . '">' . $email .  '</a> <br>';} ?>
				<?php if ($email2) { echo '&#9993; Email: <a href="mailto:' . $email2 . '">' . $email2 .  '</a> <br>';} ?>

				</p>
			</div>
		</li>
		<?php if($post_count % 3 == 0){echo "</ul><ul class='people row'>";} ?>

		<?php $post_count++; ?>
		<?php endwhile; ?>

	 </ul>

 </div>
 </div>

	<div class="alphabet">
		<div class="container">
			<ul>
				<?php foreach($letters as $letter => $active) { ?>
					<li>
						<?php if($active){echo '<a href ="#' . $letter .'">' . $letter .'</a>';}
						else{echo $letter; } ?>
					</li>
				<?php }?>
			</ul>
		</div>
	</div>
 </div>
	<?php } elseif(get_sub_field('type') == 'function'){ ?>
</section>
<?php $offices = get_sub_field('offices'); ?>
<?php $count = 1; ?>
<?php foreach ($offices as $value) {

	 $value->post_title;
	 $id = $value->ID;

?>

<?php if($count == 1){ ?>
<div class="office_list">
	<div class="container">
			<ul class="people city">
				<li class="person">
						<?php if(get_field('flag', $id)){ ?>
							<div class="profile_picture">
								<div class="image_from_background" style="background-image: url('<?php echo get_field('flag', $id)['url']; ?>"></div>
							</div>
						<?php } ?>

					<div class="profile_details">
						<h2><?php echo get_field('function', $id); ?></h2>

							<?php $address = get_field('address', $id); ?>
							<?php $postcode = get_field('postcode', $id); ?>
							<?php $telephone = get_field('telephone', $id); ?>
							<?php $email = get_field('email', $id); ?>
							<?php $email2 = get_field('email2', $id); ?>
							<?php $fax = get_field('fax', $id); ?>

						<p>
							<?php if ($address) { echo $address  . ', ';} ?>
							<?php if ($postcode) { echo $postcode; } ?>
							<?php echo get_field('suburb', $id); ?>
							<?php if(get_field('suburb', $id) OR get_field('country', $id)){ echo ' - ';} ?>
							<?php echo get_field('country', $id); ?>
							<?php if($address OR $postcode){ echo '<br>';} ?>
							<?php if ($telephone) { echo 'TEL : <a href="tel:' . $telephone . '">'. $telephone.'</a>' ;} ?>
							<?php if ($telephone && $fax) { echo ' - ';} ?>
							<?php if ($fax) { echo 'FAX : <a href="tel:' . $fax . '">'. $fax.'</a>'; }; ?>
							<?php if($telephone OR $fax){ echo '<br>';} ?>
							<?php if ($email) { echo '<a href="mailto:' . $email . '">' . $email . '</a>';} ?>
							<?php if ($email2) { echo ' - <a href="mailto:' . $email2 . '">' . $email2 . '</a>';} ?>
						</p>
					</div>
				</li>
			</ul>
	<?php } else { ?>
	<div class="office_list office_list_<?php echo $count % 2;?>">
		<div class="container">
			<ul class="people city">
				<li class="person">
					<div class="profile_details">
						<h2><?php echo get_field('function', $id); ?></h2>
						<p>
							<?php $telephone = get_field('telephone', $id); ?>
							<?php $email = get_field('email', $id); ?>
							<?php $email2 = get_field('email2', $id); ?>
							<?php $fax = get_field('fax', $id); ?>
							<?php if ($telephone) { echo 'TEL : <a href="tel:' . $telephone . '">'. $telephone.'</a>' ;} ?>
							<?php if ($telephone && $fax) { echo ' - ';} ?>
							<?php if ($fax) { echo 'FAX : <a href="tel:' . $fax . '">'. $fax.'</a>'; }; ?><br />
							<?php if ($email) { echo '<a href="mailto:' . $email . '">' . $email . '</a>';} ?>
							<?php if ($email2) { echo ' - <a href="mailto:' . $email2 . '">' . $email2 . '</a>';} ?>
						</p>
					</div>
				</li>
			</ul>
	<?php } ?>
	<div class="people_list">
		<ul class="people row">
			<?php $post_count = 1; ?>
			<?php $args = array(
			'post_type' => 'person',
			'posts_per_page' => -1,
			'orderby' => 'meta_value',
			'meta_key' => 'surname',
			'order' => 'ASC',
			'meta_query' => array(
				array(
				'key' => 'office',
				'value' => $id,
				'compare' => 'LIKE'
			)
			));
			query_posts($args); while (have_posts()) : the_post(); ?>

			<?php $post_id = get_the_ID(); ?>
			<li class="person col-sm-4">
				<div class="profile_details">
					<h2><?php the_title(); ?></h2>
					<p>
						<?php
						$telephone = get_field('telephone', $post_id);
						$mobile = get_field('mobile', $post_id);
						$email = get_field('email', $post_id);
						$email2 = get_field('email2', $post_id);
						$position = get_field('position', $post_id);
						?>
						<?php if ($position) { echo '<strong>' . $position . '</strong><br>';} ?>
						<?php if ($telephone) { echo '&#9743; Tel: <a href="tel:'. $telephone.'">' . $telephone .  '</a> <br>';} ?>
						<?php if ($mobile) { echo '&#9990;	 Mobile: <a href="tel:'. $mobile.'">' . $mobile .  '</a> <br>';} ?>
						<?php if ($email) { echo '&#9993; Email: <a href="mailto:' . $email . '">' . $email .  '</a> <br>';} ?>
						<?php if ($email2) { echo '&#9993; Email: <a href="mailto:' . $email2 . '">' . $email2 .  '</a> <br>';} ?>
					</p>
				</div>
			</li>
			<?php if($post_count % 3 == 0){echo "</ul><ul class='people row'>";} ?>

			<?php $post_count++; ?>
			<?php endwhile; ?>
		</ul>
	</div>
</div>
</div>
<?php $count++; ?>
<?php } ?>


	<?php } ?>

<?php wp_reset_query(); ?>
