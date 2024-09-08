<?php

namespace App\Repositories\Product;

interface ProductRepository
{
    /**
     * Get all available Admin.
     * @return mixed
     */
    public function all();

    /**
     * Get all available Admin.
     * @return mixed
     */
    public function find($id);

    /**
     * Get all available Admin.
     * @return mixed
     */
    public function ByUser($id);

    /**
     * {@inheritdoc}
     */
    public function create(array $data);

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data);

    /**
     * {@inheritdoc}
     */
    public function delete($id);

    /**
     * Paginate Admin.
     *
     * @param $perPage
     * @return mixed
     */
    public function paginate($perPage);
}
