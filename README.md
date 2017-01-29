BC DateTime Filter
===================

This extension implements a solution to provide the ability to change the administration UI locale (language) on the fly. This solution requires and provides an extension based kernel class overrides to store cache by siteaccess name + locale identifier and switch ini locale per request dynamically for just the one request.


Version
=======

* The current version of BC DateTime Filter is 0.1.0

* Last Major update: January 28, 2017


Copyright
=========

* BC DateTime Filter is copyright 1999 - 2017 Brookins Consulting

* See: [COPYRIGHT.md](COPYRIGHT.md) for more information on the terms of the copyright and license


License
=======

BC DateTime Filter is licensed under the GNU General Public License.

The complete license agreement is included in the [LICENSE](LICENSE) file.

BC DateTime Filter is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License or at your
option a later version.

BC DateTime Filter is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

The GNU GPL gives you the right to use, modify and redistribute
BC DateTime Filter under certain conditions. The GNU GPL license
is distributed with the software, see the file doc/LICENSE.

It is also available at [http://www.gnu.org/licenses/gpl.txt](http://www.gnu.org/licenses/gpl.txt)

You should have received a copy of the GNU General Public License
along with BC DateTime Filter in doc/LICENSE.  If not, see [http://www.gnu.org/licenses/](http://www.gnu.org/licenses/).

Using BC DateTime Filter under the terms of the GNU GPL is free (as in freedom).

For more information or questions please contact: license@brookinsconsulting.com


Requirements
============

The following requirements exists for using BC DateTime Filter extension:


### eZ Publish version

* Make sure you use eZ Publish version 5.x (required) or higher.

* Designed and tested with eZ Publish Community Project GitHub Release tag (via composer) v2015.01.3


### PHP version

* Make sure you have PHP 5.x or higher.


Features
========

### Extended Attribute Filter

This solution provides the following extended attribute filter classes:

* PHP Class : `BcDateTimeExtendedFilter` - Found by default at: `classes/bcdatetimeextendedfilter.php`


Installation
============

### Extension Installation via Composer

Run the following command from your project root to install the extension:

    bash$ composer require brookinsconsulting/bcdatetimefilter dev-master;


### Extension Activation

Activate this extension by adding the following to your `settings/override/site.ini.append.php`:

    [ExtensionSettings]
    # <snip existing active extensions list />
    ActiveExtensions[]=bcdatetimefilter


### Regenerate kernel class override autoloads

Regenerate autoloads (Required).

    php ./bin/php/ezpgenerateautoloads.php;


### Clear the caches

Clear eZ Publish Platform / eZ Publish Legacy caches (Required).

    php ./bin/php/ezcache.php --clear-all;


Configuration
=============

There are currently no configuration required.

Usage
=====

The solution is configured to work virtually by default once properly installed.

* Add the extended attribute filter provided into your template fetch.

### Example

The following example list_count fetch usage fetches a count of all objects within the current year.

    {def $children_count=fetch( 'content', 'list_count', hash( 'parent_node_id', $home_page_root_node_id,
                                                                                'extended_attribute_filter', hash( 'id', 'BcDateTimeExtendedFilter', 'params', hash( 'published', makedate( 1, 1, currentdate()|datetime( 'custom', '%Y' ) ) ) ),
                                                                                'depth', $home_page_fetch_depth
                                                                             ) )}

Troubleshooting
===============

### Read the FAQ

Some problems are more common than others. The most common ones are listed in the the [doc/FAQ.md](doc/FAQ.md)


### Support

If you have find any problems not handled by this document or the FAQ you can contact Brookins Consulting through the support system: [http://brookinsconsulting.com/contact](http://brookinsconsulting.com/contact)

