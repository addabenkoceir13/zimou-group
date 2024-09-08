<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Attribute\AttributeRepository;
use App\Repositories\AttributeValue\AttributeValueRepository;
use Illuminate\Http\Request;

class AttributesValueController extends Controller
{
    private $attributeValue;
    private $attribute;

    public function __construct(AttributeValueRepository $attributeValue, AttributeRepository $attribute)
    {
        $this->attribute = $attribute;
        $this->attributeValue = $attributeValue;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $attributeValues = $this->attributeValue->all();
        return view('admin.Attributevalue.index', compact('attributeValues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributes = $this->attribute->all();
        return view('admin.Attributevalue.add', compact('attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validata = $request->validate([
            'attribute_id' => 'required|exists:attributes,id',
            'name' => 'required|unique:attribute_values,name'
        ]);

        $attributeValue = $this->attributeValue->create($request->all());
        toastr()->success('Attribute value was successfully created');
        return redirect()->route('dashboard.attributevalue.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attributeValue = $this->attributeValue->find($id);
        $attributes = $this->attribute->all();
        return view('admin.attributevalue.edit', compact('attributeValue', 'attributes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validata = $request->validate([
            'attribute_id' => 'required|exists:attributes,id',
            'name' => 'required|unique:attribute_values,name,'. $id
        ]);

        $this->attributeValue->update( $id, $request->all());
        toastr()->success('Attribute value was successfully updated');
        return redirect()->route('dashboard.attributevalue.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->attributeValue->delete($id);
        toastr()->success('Attribute value was successfully deleted');
        return redirect()->route('dashboard.attributevalue.index');
    }
}
