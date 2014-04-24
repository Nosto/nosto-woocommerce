=== WooCommerce Nosto Tagging ===
Contributors: nosto
Tags: nosto tagging, woocommerce, e-commerce, ecommerce
Requires at least: 3.5.0
Tested up to: 3.5.1
Stable tag: 1.0.0
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Implements the required tagging blocks for using Nosto marketing automation service.

== Description ==

The plugin integrates the Nosto marketing automation service, that can produce personalized product recommendations on
the site.

The plugin adds the needed data to the site through the WordPress Action API. There are two types of data added by the
plugin; tagging blocks and Nosto elements.

Tagging blocks are used to hold meta-data about products, categories, orders, shopping cart and customers on your site.
These types of blocks do not hold any visual elements, only meta-data. The meta-data is sent to the Nosto marketing
automation service when customers are browsing the site. The service then produces product recommendations based on the
information that is sent and displays the recommendations in the Nosto elements.

Nosto elements are placeholders for the product recommendations coming from the Nosto marketing automation service. The
elements consist of only an empty div element that is populated with content from the Nosto marketing automation
service.

By default the plugin creates the following Nosto elements:

* 3 elements for the product page
	* "Other Customers Were Interested In"
	* "You Might Also Like"
	* "Most Popular Products In This Category"
* 3 elements for the shopping cart page
	* "Customers Who Bought These Also Bought"
	* "Products You Recently Viewed"
	* "Most Popular Right Now"
* 2 elements for the product category page, top and bottom
	* "Most Popular Products In This Category"
	* "Your Recent History"
* 2 elements for the search results page, top and bottom
	* "Customers who searched '{search term}' viewed"
	* "Your Recent History"
* 2 elements for the sidebars, 1 left and 1 right
	* "Popular Products"
	* "Products You Recently Viewed"
* 2 elements for all pages, top and bottom
	* "Products containing '{keywords}'"
	* "Products You Recently Viewed"

Note that you can change what recommendations are shown in the Nosto elements. You can also add additional elements
to the site by simply dropping in div elements of the following format:
`<div class="nosto_element" id="{id of your choice}"></div>`

The plugin also creates a new page called "Top Sellers". The page is added to the sites main menu automatically when
activating the plugin. The page contains only one Nosto element by default.

A new sidebar widget is also added by the module. This widget is to be used if you wish to include Nosto elements in
your shops sidebars.

== Installation ==

Before proceeding please make sure that you are running WordPress 3.5 or above and WooCommerce 2.0.0 or above.

Please refer to the WordPress documentation on how to get the plugin to appear in your installation admin section.

Once the plugin appears in your installation, you must activate it. Navigate to the "Plugins" section and locate the
"WooCommerce Nosto Tagging" plugin. The activation is done simply by clicking the "Activate" link next to the plugin
name in the list.

The activation procedure will create a new page called "Top Sellers". This page can be found and edited under the
"Pages" section in the backend. The page contains a single div element that is used to show product recommendations. A
link to the page should appear in the shops main navigation menu.

The plugin uses the WordPress Action API to add content to the shop. However, there are a few actions that will have to
be added to the shops theme in order for the plugin to function to its full extent.

* wcnt_before_search_result
	* This action should be called above the search result list on the on search pages
	* You need to add `<?php do_action('wcnt_before_search_result'); ?>` in your themes search page template at the
	appropriate location
	* Please note that this only applies to the WordPress search and not the WooCommerce search
		* If you are using the WooCommerce search, you do not need to add any actions to the templates
* wcnt_after_search_result
	* This action should be called below the search result list on the on search pages
	* You need to add `<?php do_action('wcnt_after_search_result'); ?>` in your themes search page template at the
	appropriate location
	* Please note that this only applies to the WordPress search and not the WooCommerce search
		* If you are using the WooCommerce search, you do not need to add any actions to the templates
* wcnt_before_main_content
	* This action should be called at the beginning of every page in the shop
	* You need to add `<?php do_action('wcnt_before_main_content'); ?>` in your themes header template, inside the main
	content section
* wcnt_after_main_content
	* This action should be called at the end of every page in the shop
	* You need to add `<?php do_action('wcnt_after_main_content'); ?>` in your themes footer template, inside the main
	content section

Once you have activated the plugin and added the necessary actions, you need to configure the plugin. The plugins
configuration page can be found under the "Settings->Store" section, in the tab called "Nosto Tagging".

The configuration page consists of three settings:

* Server address
	* This is the server address for the Nosto marketing automation service
	* It will have the default value of "connect.nosto.com" and you do not need to change this
* Account name
	* This is your Nosto marketing automation service account name that you got when registering for the service
* Use default Nosto elements
	* This setting controls if the plugin should create and output the default Nosto elements for showing the product
	recommendations
	* You can disable the defaults if you want to use your own elements in your theme

All of the above settings are needed for the plugin to work.

The "Nosto Tagging" widget added by the plugin for showing Nosto elements in the shops sidebars, needs to be configured
if you wish to use it. The widget can be found under the "Appearance->Widgets" section and it works like any other
WordPress widget. After dropping the widget in the appropriate sidebar container, you need to configure its Nosto ID.
This ID is used as the Nosto element div ID attribute and can be whatever you decide.

== Changelog ==

= 1.0.1 =
* Hide "Server address" from plugin configuration
* Change "Account name" to "Account ID" in plugin configuration
* Remove html escape from product description in product tagging
* Change order tagging buyer info to always come from the checkout form billing address
* Update embed script

= 1.0.0 =
* Initial release

== Screenshots ==

1. This screenshot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the /assets directory or the directory that contains the stable readme.txt (tags or trunk). Screenshots in the /assets
directory take precedence. For example, `/assets/screenshot-1.png` would win over `/tags/4.3/screenshot-1.png`
(or jpg, jpeg, gif).
2. This is the second screenshot
