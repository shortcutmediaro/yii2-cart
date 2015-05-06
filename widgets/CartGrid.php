<?php
namespace shortcutmediaro\cart\widgets;

use yii\base\Widget;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;
use shortcutmediaro\cart\Cart;

/**
 * Class Cart
 * @package shortcutmediaro\cart\widgets
 */
class CartGrid extends Widget
{

    /**
     * @var
     */
    public $cartDataProvider;

    /**
     * Grid view olumns
     * @var
     */
    public $cartColumns = [
        'id',
        'label',
    ];

    /**
     * GridView options
     * @var array
     */
    public $gridOptions = [];

    /**
     * @var string Only items of that type will be rendered. Defaults to Cart::ITEM_PRODUCT
     */
    public $itemType = Cart::ITEM_PRODUCT;

    /**
     * Setting defaults
     */
    public function init()
    {
        $cart = \Yii::$app->get('cart');

        if (!isset($this->cartDataProvider)) {
            $this->cartDataProvider = new ArrayDataProvider([
                'allModels' => $cart->getItems($this->itemType),
                'pagination' => false,
            ]);
        }
    }

    /**
     * @return string
     */
    public function run()
    {
        return $this->render('cart', [
            'gridOptions' => $this->getGridOptions(),
        ]);
    }

    /**
     * Get grid options
     */
    public function getGridOptions()
    {
        return ArrayHelper::merge($this->gridOptions, [
            'dataProvider' => $this->cartDataProvider,
            'columns' => $this->cartColumns
        ]);
    }
}
