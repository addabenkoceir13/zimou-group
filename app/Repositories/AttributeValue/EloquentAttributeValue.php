<?php

namespace App\Repositories\AttributeValue;

use App\Models\AttributeValue;
use App\Repositories\AttributeValue\AttributeValueRepository;

class EloquentAttributeValue implements AttributeValueRepository
{
    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return AttributeValue::all();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return AttributeValue::find($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $AttributeValue = AttributeValue::create($data);

        return $AttributeValue;
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $AttributeValue = $this->find($id);

        $AttributeValue->update($data);

        return $AttributeValue;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $AttributeValue = $this->find($id);

        return $AttributeValue->delete();
    }

    /**
     * @param $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|mixed
     */
    public function paginate($perPage)
    {
        $query = AttributeValue::query();


        $result = $query->orderBy('id', 'desc')
            ->paginate($perPage);

        return $result;
    }
}
