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
                        <li><a href="#"><i class="fa fa-facebook fa-lg"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus fa-lg"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter fa-lg"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube fa-lg"></i></a></li>
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
                <form class="banner-from">
                    <div class="row">
                        <div class="col-md-2 col-sm-4 col-xs-7">
                                <select class="form-control input-sm">
                                    <option value="">All cities</option>
                                    <option value="">One</option>
                                </select>
                                <select class="form-control input-sm">
                                    <option value="">Property for sale</option>
                                    <option value="">One</option>
                                </select>
                                <select class="form-control input-sm">
                                    <option value="">Property for rent</option>
                                    <option value="">One</option>
                                </select>
                                <select class="form-control input-sm">
                                    <option value="">Property by Location</option>
                                    <option value="">One</option>
                                </select>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-7">
                            <div class="inner-gray-box">
                                <label for="exampleInputEmail1">Price(AED)</label>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control input-sm" id="exampleInputEmail1" placeholder="Price From">
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control input-sm" id="exampleInputEmail1" placeholder="Price To">
                                    </div>
                                </div>
                                <label for="exampleInputEmail1">Bedroom(Min/Max)</label>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control input-sm">
                                            <option value="">Studio</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">5</option>
                                            <option value="">6</option>
                                            <option value="">7</option>
                                            <option value="">8</option>
                                            <option value="">9</option>
                                            <option value="">10</option>
                                            <option value="">11</option>
                                            <option value="">12+</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control input-sm">
                                            <option value="">Studio</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">5</option>
                                            <option value="">6</option>
                                            <option value="">7</option>
                                            <option value="">8</option>
                                            <option value="">9</option>
                                            <option value="">10</option>
                                            <option value="">11</option>
                                            <option value="">12+</option>
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
	