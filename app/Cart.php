<?php namespace CodeCommerce;


class Cart
{

    private $items;

    public function  __construct()
    {
        $this->items = [];
    }


    public function add($id, $name, $price, $img, $ext)
    {
        $this->items += [
            $id => [
                'id' => $id,
                'qtd' => isset($this->items[$id]['qtd']) ? $this->items[$id]['qtd']++ : 1,
                'price' => $price,
                'name' => $name,
                'img' => $img.'.'.$ext
            ]
        ];

        return $this->items;
    }

    public function update($id, $qtd)
    {
        if($qtd == 0)
        {
            unset($this->items[$id]);
        }
        else
        {
            $this->items[$id]['qtd'] = $qtd;
        }
        return $this->items;
    }

    public function remove($id)
    {
        unset($this->items[$id]);
    }

    public function all()
    {
        return $this->items;
    }

    public function isNull()
    {
        if($this->items)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function getTotal()
    {
        $total = 0;
        foreach($this->items as $items)
        {
            $total += $items['qtd'] * $items['price'];
        }

        return $total;
    }
}