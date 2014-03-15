<?php
ini_set('display_errors', 1);
require "bigcommerce.php";
use Bigcommerce\Api\Client as Bigcommerce;

$store_url = 'https://store-dlt3eoeu.mybigcommerce.com';

Bigcommerce::configure(array(
    'store_url' => $store_url,
    'username' => 'API',
    'api_key' => 'b19dbc86768d135471e638882bea63c04a98307c'
    ));

Bigcommerce::setCipher('RC4-SHA');
Bigcommerce::verifyPeer(false);


/*
$x = array('name' => "[Sample] Tomorrow is today, Red printed scarf" );
$id=32;
$update = Bigcommerce::updateProduct($id,$x);*/
$a=array(
    "name"=> "Plain T-Shirt",
    "type"=> "physical",
    "description"=> "This timeless fashion staple will never go out of style!",
    "price"=> "29.99",  "categories"=> array(14),  "availability"=> "available",  "weight"=> "0.5"
);

//$x = Bigcommerce::createProduct($a);

$filter = array('limit' => 6, 'page' => 1);
$products = Bigcommerce::getProducts($filter);
?>
<div style="width: 900px; margin: 0 auto;">
<?php
//$product_count = Bigcommerce::getProductsCount();
//echo "Total Products in Store:".$product_count."<br/>";
//echo "<pre/>";
//print_r($products);
//die;
foreach($products as $product) {
	$image = Bigcommerce::getProductImages($product->id);
?>
	<div class="product" style="width: 250px; float: left; clear: none; border: 1px solid; margin: 3px; padding: 3px;">
		<a target="_blank" href="<?php echo $store_url.$product->custom_url; ?>"><img src="<?php echo $image->standard_url; ?>" alt="<?php echo $product->name; ?>" /></a>
		<br />
		<a target="_blank" href="<?php echo $store_url.$product->custom_url; ?>"><h><?php echo $product->name; ?> </h></a>
		<br />
		<center><label>Price:</label><label><?php echo $product->price; ?></label></center>
	</div>
<?php	
}
?>
</div>