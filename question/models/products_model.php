<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require(APPPATH."third_party/infusionsoft/isdk.php");	

class Products_model extends CI_Model 
{
	
	function getAllProducts()
	{
		$app = new iSDK;

		if ($app->cfgCon("connectionName")) 
		{
			$returnFields = array('Id','ProductName', 'ProductPrice','InventoryLimit');
			$query = array('Id' => '%', 'Status' => 1 );
			$products = $app->dsQuery("Product",100,0,$query,$returnFields);
			
			return $products;
		}
		return 0;	
	}
	
	function getProduct( $id )
	{
		if ( $id < 0) 
		{
			return 0;	
		}
		
		$app = new iSDK;
		if ($app->cfgCon("connectionName")) 
		{
			$returnFields = array('Id','ProductName', 'ProductPrice','ShortDescription');
			$query = array('Id' => $id );
			$products = $app->dsQuery("Product",1,0,$query,$returnFields);
			//var_dump($products);
			//die('ss');
			
			return $products;
		}
		return 0;
		
	}
	
	function addProduct($row)
	{
		if ( !isset($row) ) 
		{
			return 0;	
		}
		var_dump($row);
		die('in product model');
		
		$field = array(
			'ProductName' 		=> $row['ProductName'],
			'ProductPrice' 		=> $row['ProductPrice'],
			'ShortDescription'	=> $row['ShortDescription']
			);
		
		$app = new iSDK;
		if ($app->cfgCon("connectionName")) 
		{
			
			$product_id = $app->dsAdd("Product", $field);
			return $product_id;
		}
		
		return 0;
		
	}
	
	
	function updateProduct($row)
	{
		if ( !isset($row) ) 
		{
			return 0;	
		}
		
		$row['product_id'] = 37;
		
		$field = array(
			'ProductName' 		=> $row['ProductName'],
			'ProductPrice' 		=> $row['ProductPrice'],
			'ShortDescription'	=> $row['ShortDescription']
			);
		
		$app = new iSDK;
		if ($app->cfgCon("connectionName")) 
		{
			
			$product_id = $app->dsUpdate("Product", $row['product_id'] , $field);
			return $product_id;
		}
		
		return 0;
		
	}
		
	function getInventory($product_id)
	{
		if ( $product_id < 0) 
		{
			return 0;	
		}
		
		$app = new iSDK;
		if ($app->cfgCon("connectionName")) 
		{
			$inventory = $app->getInventory($product_id);
			return $inventory;
		}
		
		return 0;
	}
	
}

?>
