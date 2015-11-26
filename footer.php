<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Property_House
 */

?>
<div class="row col-md-12">
	<p class="footer-info">Copyright &copy 2015 Propertyhouse. All Rights Reserved.</p>
</div>
</div> <!-- Container ending -->


<?php wp_footer(); ?>
    <script>
        jQuery(document).ready(function() {

            jQuery("#property-feature-sale-id").owlCarousel({
				//autoPlay: true,
				items : 3,
				navigation: true,
				navigationText: [
				  "<i class='fa fa-chevron-left fa-lg'></i>",
				  "<i class='fa fa-chevron-right fa-lg'></i>"
				  ],
				pagination : false  
			});
			jQuery("#property-feature-rent-id").owlCarousel({
				//autoPlay: true,
				items : 3,
				navigation: true,
				navigationText: [
				  "<i class='fa fa-chevron-left fa-lg'></i>",
				  "<i class='fa fa-chevron-right fa-lg'></i>"
				  ],
				pagination : false  
			});

        });
    </script>

</body>
</html>
