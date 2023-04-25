<section
	class="w-full h-[431px] px-[14px] lg:px-[82px] lg:h-[545px] max-h-full flex flex-col justify-end"
	style="
					background: url('<?php echo esc_url($args['person_hero_image']['url']) ?>');
					background-repeat: no-repeat;
					background-size: cover;
				"
	>
	<div class="w-full px-[15px] flex flex-col justify-center items-center mx-auto">
		<?php echo wp_get_attachment_image( $args['person_image'], 'full', false, array( "class" => "img-responsive single-person-img" ) ); ?>
	</div>
</section>
