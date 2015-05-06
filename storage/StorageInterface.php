<?php
namespace shortcutmediaro\cart\storage;

use shortcutmediaro\cart\Cart;

/**
 * Interface StorageInterface
 * @package shortcutmediaro\cart\cart
 */
interface StorageInterface
{

    /**
     * @param \shortcutmediaro\cart\Cart $cart
     *
     * @return void
     */
    public function load(Cart $cart);

    /**
     * @param \shortcutmediaro\cart\Cart $cart
     *
     * @return void
     */
    public function save(Cart $cart);
}
