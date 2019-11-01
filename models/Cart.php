<?php

namespace app\models;

use yii\db\ActiveRecord;


class Cart extends ActiveRecord
{

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }


    public function addToCart($product, $qty = 1, $size = 'S')
    {
        $mainImg = $product->getImage();
        if (isset($_SESSION['cart'][$product->id])) {
            $_SESSION['cart'][$product->id]['qty'] += $qty;
            $_SESSION['cart'][$product->id]['size'] = $size;

        } else {
            $_SESSION['cart'][$product->id] = [
                'qty' => $qty,
                'size' => $size,
                'name' => $product->name,
                'price' => $product->price,
                'img' => $mainImg->getUrl('')
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $product->price : $qty * $product->price;
    }

    /**
     * @param $id
     * @return bool
     */
    public function recalc($id)
    {
        if (!isset($_SESSION['cart'][$id])) return false;
        $qtyMinus = $_SESSION['cart'][$id]['qty'];
        $sumMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.sum'] -= $sumMinus;
        unset($_SESSION['cart'][$id]);
    }
}