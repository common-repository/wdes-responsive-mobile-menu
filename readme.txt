=== WDES Responsive Mobile Menu ===
Contributors: Anthony Carbon
Donate link: https://www.paypal.me/anthonypagaycarbon
Tags: mobile, menu, responsive, navigation, mobile menu, responsive mobile menu, modal, popup, anthonycarbon.com
Version: 1.2.5
Requires at least: 4.4
Tested up to: 5.3.2
Stable tag: 1.2.4
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

WDES Responsive Mobile Menu is a developer friendly WordPress responsive mobile menu. Providing easy access within your website in mobile with mobile friendly layout.

== Description ==

WDES Responsive Mobile Menu is a developer friendly WordPress responsive mobile menu. Providing easy access within your website in mobile with mobile friendly layout.

Give your mobile visitor a best experience using WDES Responsive Mobile Menu and not bored because they cannot access any pages on your site. This plugin has very flexible design in any mobile screen and no conflict CSS/JS to your theme.

You can manage styles, logo, etc. via admin options. This plugin is automatically running (if enabled in admin option) without doing any backend coding from several themes like WPCargo, Genesis, Outreach Pro, Executive Pro, Extended Pro, The7, Avada, Canvas, and Jupiter.

If your current themes is not mentioned above, you can still use WDES Responsive Mobile Menu by just adding the `wdes_responsive_mobile_menu()` function after the body opening tags. Normally this can be found in header.php of your theme template.

= Example: =

`<body>
<?php wdes_responsive_mobile_menu(); ?>`

= WDES Responsive Mobile Menu Demo Site =
[Responsive Tool](https://responsivetool.anthonycarbon.com).

= Features =

* Can select one of the `Navigation Menus` created in menu dashboard. Default is the menu that is set as primary.
* It has `Header Top` section where you can add your `phone number`, `email address`, and `social networks`. This is displayed above your site logo and navigation menu.
* Manage the `site logo`, `Background Color`, `Text Color`, `Text Font Size`, border, etc in WDES Responsive Mobile Menu page options.
* `Custom CSS` where you can add you custom CSS codes (if needed).
* `Import/Export` options.
* More available layouts in [WDES Responsive Mobile Menu Layouts](https://www.anthonycarbon.com/product-category/wdes-responsive-mobile-menu-layout-add-ons/).

= Related plugins =
[Anthony Carbon Plugins](https://www.anthonycarbon.com/product-category/wordpress-plugins/)

= Develop by =
[anthonycarbon.com - WordPress Developer / Programmer](https://www.anthonycarbon.com/)

Happy coding everyone :D.

== Installation ==

[youtube https://www.youtube.com/watch?v=B71F_M_JF5w]

1. Upload the plugin files to the `/wp-content/plugins/` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the "WDES Mobile" screen to configure the plugin settings.

== Frequently Asked Questions ==

= How do I use this plugin? =

If your themes is WPCargo, or Genesis, or Outreach Pro, or Executive Pro, or Extended Pro, or The7, or Avada, or Canvas, or Jupiter, then the plugin is automatically working, no need for coding (if enabled in admin options).

If your current themes is not mentioned above, Then add the `wdes_responsive_mobile_menu()` function after the body opening tags. Normally this can be found in header.php of your theme template.

Example:

`<body>
<?php wdes_responsive_mobile_menu(); ?>`

== Screenshots ==

1. WDES Responsive Mobile Menu frontend view main.
2. WDES Responsive Mobile Menu frontend view on popup.
3. WDES Responsive Mobile Menu admin page settings 1.
4. WDES Responsive Mobile Menu admin page settings 2.

== Changelog ==

= 1.0.1 =
* Update menu id slug conflict.
* Update content class in visual composer.
* Update to compatible in all themes.

= 1.0.2 =
* Fix the menu visibility in other themes that is not mentioned above.
= 1.0.8 =
* Added zip files of the previous versions in braches plugin repository.
= 1.0.9 =
* change the `wdes_rmm_mobile_responsive_menu` function to `wdes_responsive_mobile_menu`. Still you can use the old function.
* Revise the plugin description.
= 1.1.0 =
* Remove console log in layout-1.js
= 1.1.2 =
* Remove classic header display none conflict.
* Fix add-on 404 link.
= 1.1.3 =
* Add `wdes_rmm_menu` filters where you can filter custom menu ID.
* Add `wdes_rmm_menu_default` where you can change the default menu text.
= 1.1.4 =
* Fix error `Fatal error: Uncaught Error: Call to undefined function add_filters()`.
= 1.1.5 =
* Add extra ID in li and a tag.
= 1.1.7 =
* fix ID in li and a tag error.
= 1.2.0 =
* Add minified CSS and JS.


== Upgrade Notice ==

Just upgrade via Wordpress.