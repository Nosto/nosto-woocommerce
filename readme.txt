=== Nosto - Personalization for WooCommerce ===
Contributors: nosto
Tags: nosto tagging, woocommerce, e-commerce, ecommerce, personalization, recommendations
Requires at least: 4.4.0
Tested up to: 4.7.0
Stable tag: 1.1.1
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Deliver your customers personalized shopping experiences, at every touch point, across every device.

== Description ==

Every customer is unique. Are you treating them that way? Nosto analyzes hundreds of thousands of data points across your store in real-time, to help you go beyond the numbers and see the individual. We harnesses big data to build a deep understanding of your every customer in real-time, automatically predicting and delivering the most relevant shopping experiences at every touch point, across every device.

Developed with busy ecommerce professionals and ease of use in mind, Nosto is the most effective way to build and launch personalized marketing campaigns without the need for dedicated IT resources. Nosto ensures your rich data isn't being locked away in silos, but can be accessed and utilised efficiently through one complete personalization solution.

We are proud to be trusted by over 20,000 retailers from 150+ countries worldwide including brands like Volcom and FlightClub.

Get started today with 14 days free – no credit card required!

**Important note**: Powerful personalization needs a lot of data fuel! For that reason, to really see the benefit of Nosto **you need to stock more than 10 products and have over 1,000 visitors per month.**

== Features ==

### Personalized Facebook Ads
The fastest, easiest way to deliver personalized advertising to a marketplace of over 1.4 billion people.

### Personalized Product Recommendations
Recommend shoppers the most relevant products in real-time based on their unique user behavior.

### Personalized Behavioral Pop-ups
Reduce site abandonment and increase conversion with time-limited special offers and one-time discounts.

### Personalized Triggered Emails
Reconnect with your customers through automated, personalized emails.

== OK, but why Nosto? ==

### One Platform. Infinite Possibilities.
Nosto’s all-in-one solution allows you to manage all your personalization campaigns from one place. With rich customization options and advanced merchandizing rules we give you full control over which recommendations to display, when, where and to whom. With our advanced API we enable you to extend the power of Nosto’s personalization to even more channels.

### Built for marketers. Loved by IT.
Nosto has been developed with busy ecommerce professionals in mind. Our easy-to-use interface allows you create, launch and optimize multi-channel personalization campaigns in real- time, without the need for IT.

### Continuous learning. Continuous optimization.
With a rapidly growing community of over 20,000 retailers using Nosto across the globe, we are able to leverage vasts amounts of data to uncover deep insights into what drives successful shopping experiences. Running tests across millions of daily visitors we know which personalization strategies work best for which kind of retailers and are continuously improving our algorithms to improve the performance on your store.

### An entire team dedicated to your success
Our in-house ecommerce experts have worked with thousands of retailers worldwide. Using these learnings we ensure you have the best personalization setup for your store and are continually optimizing for peak performance thereafter.

### Success-based pricing
Nosto’s pricing scales with your business. No set-up costs. No fixed fees. No minimum contract lengths. We simply take a small % of the revenue we help you generate.

### Fast, easy implementation
Nosto has completely transformed the way personalization technology integrates with ecommerce stores. Our solution can be added to any site with just a few snippets of code, or a 1-click download of our module, allowing retailers to get up and running with personalization in days rather than months. This is where our patents lie and the reason we’re the fastest-growing personalization solution in the world today.

== Installation ==

Before proceeding please make sure that you are running WordPress 4.4 or above and WooCommerce 2.6.0 or above.

Please refer to the WordPress documentation on how to get the plugin to appear in your installation admin section.

Once the plugin appears in your installation, you must activate it. Navigate to the "Plugins" section and locate the
"WooCommerce Nosto Tagging" plugin. The activation is done simply by clicking the "Activate" link next to the plugin
name in the list.

The activation procedure will create a new page called "Top Sellers". This page can be found and edited under the
"Pages" section in the backend. The page contains a single div element that is used to show product recommendations. A
link to the page should appear in the shops main navigation menu.

Once you have activated the plugin and added the necessary actions, you need to configure the plugin. The plugins
configuration page can be found under the "Woocommerce > Settings > Integration".

The configuration page consists of three settings:

* Account name
	* This is your Nosto marketing automation service account name that you got when registering for the service
* Use default Nosto elements
	* This setting controls if the plugin should create and output the default Nosto elements for showing the product
	recommendations
	* You can disable the defaults if you want to use your own elements in your theme

All of the above settings are needed for the plugin to work. You do not need to add Nosto javascript manually to your store.

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
* wcnt_notfound_content
	* This action should be called above the search result list on the on search pages
	* You need to add `<?php do_action('wcnt_notfound_content'); ?>` in your themes not found page template (404.php) at the
	appropriate location

The "Nosto Tagging" widget added by the plugin for showing Nosto elements in the shops sidebars, needs to be configured
if you wish to use it. The widget can be found under the "Appearance->Widgets" section and it works like any other
WordPress widget. After dropping the widget in the appropriate sidebar container, you need to configure its Nosto ID.
This ID is used as the Nosto element div ID attribute and can be whatever you decide.

== Changelog ==

= 1.1.1 =
* Bump the min required Wordpress version
* Add missing templates to SVN repo

= 1.1.0 =
* Remove date_published from tagging
* Add page type tagging
* Change the signature of validate_text_field to match the parent method
* Set Nosto script to be included async
* Introduce "js stub" for Nosto script

= 1.0.7 =
* Run the shortcodes for product description

= 1.0.6 =
* Fix issue with undefined server address

= 1.0.5 =
* Support WooCommerce 2.6.0 version
* Fix the issue with variation list price

= 1.0.4 =
* Support WordPress 4.3.1 & WooCommerce 2.4.7 versions
* Updated plugin description

= 1.0.3 =
* Fix rename of woocommerce method "get_shipping" to "get_total_shipping" in versions 2.1.0 and above

= 1.0.2 =
* Settings page has url been fixed

= 1.0.1 =
* Hide "Server address" from plugin configuration
* Change "Account name" to "Account ID" in plugin configuration
* Remove html escape from product description in product tagging
* Change order tagging buyer info to always come from the checkout form billing address
* Update embed script

= 1.0.0 =
* Initial release

== Screenshots ==

1. The real-time Nosto admin dashboard for a clear overview
2. “Top list” on-site recommendation as displayed by Nosto
3. Personalized Behavioral Pop-Ups
4. Personalized Facebook Ads
5. Personalized Triggered Emails / An Abandoned Cart email example
6. Personalized shopping experiences - wherever your customers are

== Known issues ==

* Does not support products that are sold only in a group product but NOT individually in the store
	* A group product consists of multiple simple products and the group is tagged on the product page
	while the individual simple products in the group are tagged in the cart and order

== Upgrade notice ==

When updating to 1.0.6 please make sure you have not added Nosto javascript manually (or via some plug-in) to your store. Duplicated Nosto script will result in javascript error and your store might became unstable.