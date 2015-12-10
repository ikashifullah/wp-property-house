<?php 
//global $javo_theme_option;
global $javo_tso;
//$javo_theme_option = @unserialize(get_option("javo_themes_settings"));
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <meta name="description" content="">
    <meta name="author" content="Kashif Ullah; kashifullahwebdeveloper@gmail.com">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $javo_tso->get('favicon_url', '');?>" />

    <title><?php wp_title(); ?></title>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php
// Custom CSS AREA
if($javo_tso->get('custom_css', '') != ''){
	printf('<style type="text/css">%s</style>', stripslashes( $javo_tso->get('custom_css', '') ) );
};
if($javo_tso->get('h1_normal_size', '')) {
	printf('<style type="text/css">h1 { font-size: %spx !important;}</style>', stripslashes( $javo_tso->get('h1_normal_size', '') ) );
}
?>
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="container">
	<div class="row">
        <header>
        <div class="col-md-12">
            <div class="logo pull-left">
                <a href="<?php home_url();?>" alt="">
					<img src="<?php echo $javo_tso->get('logo_url', get_template_directory_uri().'/images/property_house_logo.png'); ?>" width="200" />
				</a>
            </div>
            <div class="pull-right">
                <div class="top-social-icons">
                    <ul>
                        <li><a href="<?php echo $javo_tso->get('facebook', '#'); ?>" target="_blank"><i class="fa fa-facebook fa-lg"></i></a></li>
                        <li><a href="<?php echo $javo_tso->get('google', '#'); ?>" target="_blank"><i class="fa fa-google-plus fa-lg"></i></a></li>
                        <li><a href="<?php echo $javo_tso->get('twitter', '#'); ?>" target="_blank"><i class="fa fa-twitter fa-lg"></i></a></li>
                        <li><a href="<?php echo $javo_tso->get('youtube', '#'); ?>" target="_blank"><i class="fa fa-youtube fa-lg"></i></a></li>
                    </ul>
                </div>
                <a href="#" class="btn red big-button">Place your Property</a>
            </div>
        </div>
        </header>
    </div>
	<nav id="site-navigation" class="main-navigation" role="navigation">
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'property-house' ); ?></button>
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
	</nav><!-- #site-navigation -->
	<div class="clearfix"></div>
	<div class="home-banner-form">
                <form class="banner-from" method="get" action="<?php bloginfo('url');?>/listing-search-results/">
                    <div class="row">
                        <div class="col-md-2 col-sm-4 col-xs-7">
								<?php echo buildSelect('property_city'); ?>
                                
								<?php echo buildSelect('property_status'); ?>
								
								<?php echo buildSelect('locations'); ?>
								
								<?php echo buildSelect('property_type'); ?>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-7">
                            <div class="inner-gray-box">
                                <label for="exampleInputEmail1">Bathroom(Min/Max)</label>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control input-sm" name="min_bathroom">
											<option value="">Any</option>
                                            <option value="-1" selected>Studio</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12+</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control input-sm" name="max_bathroom">
											<option value="">Any</option>
                                            <option value="-1">Studio</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12" selected>12+</option>
                                        </select>
                                    </div>
                                </div>
                                <label for="exampleInputEmail1">Bedroom(Min/Max)</label>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control input-sm" name="min_bedroom">
											<option value="">Any</option>
                                            <option value="-1" selected>Studio</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12+</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control input-sm" name="max_bedroom">
											<option value="">Any</option>
                                            <option value="-1">Studio</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12" selected>12+</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div>
                                <input type="submit" class="btn black home-banner-form-btn" value="Search" />
                            </div>
                        </div>
                    </div>
                </form>
        </div>
        <div class="clearfix"></div>
	