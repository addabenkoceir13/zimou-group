<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\Product\ProductRepository;

class EloquentProduct implements ProductRepository
{
    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return Product::all();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Product::find($id);
    }
    /**
     * {@inheritdoc}
     */
    public function ByUser($id)
    {
        $product = Product::whereUserId($id)->get();
        return $product;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $product = Product::create($data);

        return $product;
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $product = $this->find($id);

        $product->update($data);

        return $product;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $product = $this->find($id);

        return $product->delete();
    }

    /**
     * @param $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|mixed
     */
    public function paginate($perPage)
    {
        $query = Product::query();


        $result = $query->orderBy('id', 'desc')
            ->paginate($perPage);

        return $result;
    }
}
