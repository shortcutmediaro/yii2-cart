<?php
namespace shortcutmediaro\cart\storage;

use yii\base\Object;
use shortcutmediaro\cart\Cart;

/**
 * Class SessionStorage
 * @property \yii\web\Session session
 * @package shortcutmediaro\cart\cart
 */
class SessionStorage extends Object implements StorageInterface
{
    /**
     * @var string
     */
    public $key = 'cart';

    /**
     * @inheritdoc
     */
    public function load(Cart $cart)
    {
        $cartData = [];
        if (false !== ($session = ($this->session->get($this->key, false)))) {
            $cartData = unserialize($session);
        }
        return $cartData;
    }

    /**
     * @inheritdoc
     */
    public function save(Cart $cart)
    {
        $sessionData = serialize($cart->getItems());
        $this->session->set($this->key, $sessionData);
    }

    /**
     * @return \yii\web\Session
     */
    public function getSession()
    {
        return \Yii::$app->get('session');
    }
}
