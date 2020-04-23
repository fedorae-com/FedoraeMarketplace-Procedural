<?php
  require_once('controllers/authController.php');

// main menu to left

$menu = array('mdi-view-dashboard' => array('Dashboard' => 'dashboard.php' ),
              'mdi-chart-bubble' => array('Products' => 'products.php'),
              'mdi-airplane' => array('Logistics' => 'logistics.php'),
              'mdi-cloud-sync' => array('Backup' => 'backup.php'),
              'mdi-settings' => array('Settings' => 'settings.php')
 );

// dropdown menu to right

$dropdown = array('mdi-storefront' => array('Stores' => '/stores'),
                  'mdi-settings' => array('Settings' => 'page/settings.php'),
                  'mdi-logout' => array('Sign Out' => '/multi-vendor/dashboard.php?logout=1')
);

//prodController
$products = array();


// Other Variables -->
$title = 'CMS';
$vendor = 'Vendor';

// profile image is_uploaded
$msg = "";
$css_class = "";

// product headers

$productheaders = array('<input class="uk-checkbox" type="checkbox" onClick="toggle(this)" id="checkall" />','Image', 'Product Name', 'Price', 'Quantity', 'Status', 'Action');
?>
