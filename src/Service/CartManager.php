<?php

namespace Service;

use Service\DBManager;

/**
 * ProfileManager
 *
 * @author wszubryt
 */
class CartManager
{
	public function getCart()
	{
		if (!isset($_SESSION['cart']))
		{
			$cart = array();
			return $cart;
		}
		
		return $_SESSION['cart'];
	}	
	
	public function addToCart($book)
	{
		if (!isset($_SESSION['cart']))
		{
			$_SESSION['cart']=array();
		}
		
		array_push($_SESSION['cart'], $book);
	}
	
	public function deleteFromCart($book)
	{
		$cart = $_SESSION['cart'];
		$newCart = array();
		
        foreach ($cart as $item) {
		
			if ($item['id'] != $book['id'])
			{
				array_push($newCart, $book);
			}
		
		}
				
		$_SESSION['cart']=$newCart;
	}
	
	public function clearCart()
	{
		if (isset($_SESSION['cart']))
		{
			$_SESSION['cart']=array();
		}
	}
}