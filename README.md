# assignment
 
CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements
 * Installation
 * Configuration
 * Resources
 
 INTRODUCTION
------------
A Site Config API module is used to alter Drupal basic config form and add api key field. and save and update this APK key in the database.

Using this key we can get the Page node data in JSON format.

Make sure you have a page(Basic Page) content type with data.

REQUIREMENTS
------------

This module requires no modules outside of the Drupal core.

INSTALLATION
------------

 * Install the Site Config API module as you would normally install a contributed
   Drupal module.
   
The configuration page is at admin/config/system/site-information,
  where you can configure the Basic site details as well as add or update API key.

CONFIGURATION
-------------

    1. Navigate to Administration > Extend and enable the module.
    2. Navigate to Administration > Configuration > System > Site Information
    3. Add APK key and update the configuration.
    
 * After updating configuration visit this URL : /data/dummyapikey/30
 Here,
 API key is: dummyapikey
 Node ID is: 30
 
 if the node id and api key both are valid you will get the result.
 
 RESOURCES
-------------
   - [Add Custom Field in site config](https://www.drupal.org/forum/support/post-installation/2019-02-06/add-a-new-custom-field-to-site-infomation-form-in-drupal8)
   - [Extending Sit Config form](https://www.jaypan.com/tutorial/drupal-extending-core-configuration-extending-core-forms-and-overriding-core-routes)
   - [Add New Route](https://www.drupal.org/docs/drupal-apis/routing-system/altering-existing-routes-and-adding-new-routes-based-on-dynamic-ones)
   - [JSON Response](https://api.drupal.org/api/drupal/vendor%21symfony%21http-foundation%21JsonResponse.php/class/JsonResponse/8.2.x)
 
