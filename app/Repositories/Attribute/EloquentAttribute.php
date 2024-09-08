<?php

namespace App\Repositories\Attribute;

use App\Models\Attribute;
use App\Models\User;

class EloquentAttribute implements AttributeRepository
{
    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return Attribute::all();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Attribute::find($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $Attribute = Attribute::create($data);

        return $Attribute;
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $Attribute = $this->find($id);

        $Attribute->update($data);

        return $Attribute;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $Attribute = $this->find($id);

        return $Attribute->delete();
    }

    /**
     * @param $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|mixed
     */
    public function paginate($perPage)
    {
        $query = Attribute::query();


        $result = $query->orderBy('id', 'desc')
            ->paginate($perPage);

        return $result;
    }
}
