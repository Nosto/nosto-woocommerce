# WooCommerce Nosto Tagging

## Description

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
'`<div class="nosto_element" id="{id of your choice}"></div>`'

The plugin also creates a new page called "Top Sellers". The page is added to the sites main menu automatically when
activating the plugin. The page contains only one Nosto element by default.

## License

GNU General Public License version 2 (GPLv2)

## Dependencies

WordPress version 3.5 or above and WooCommerce 2.0.0 or above.

## Changelog

* 1.0.2
	* Settings page has url been fixed

* 1.0.1
	* Hide "Server address" from plugin configuration
	* Change "Account name" to "Account ID" in plugin configuration
	* Remove html escape from product description in product tagging
	* Change order tagging buyer info to always come from the checkout form billing address
	* Update embed script

* 1.0.0
	* Initial release

## Known issues

* Does not support products that are sold only in a group product but NOT individually in the store
	* A group product consists of multiple simple products and the group is tagged on the product page
	while the individual simple products in the group are tagged in the cart and order
