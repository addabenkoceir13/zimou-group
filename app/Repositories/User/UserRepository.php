<?php

namespace App\Repositories\User;

interface UserRepository
{
    /**
     * Get all available Admin.
     * @return mixed
     */
    public function all();

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
