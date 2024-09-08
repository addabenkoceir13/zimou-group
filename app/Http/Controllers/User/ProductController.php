<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Attribute\AttributeRepository;
use App\Repositories\AttributeValue\AttributeValueRepository;
use App\Repositories\Product\ProductRepository;
use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\ProductAttribute;
use App\Models\ProductRefer;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    private $attributes;
    private $attributeValue;
    private $product;
    private $productAttribute;

    public function __construct(AttributeValueRepository $attributeValue, AttributeRepository $attributes, ProductRepository $product)
    {
        $this->attributes = $attributes;
        $this->attributeValue = $attributeValue;
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->ByUser(auth()->user()->id);
        // $products = Product::whereUserId;
        return view('user.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributes = $this->attributes->all();
        $attributeValues = $this->attributeValue->all();

        return view('user.product.add', compact('attributes', 'attributeValues'));
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
            'name'          =>'required|unique:products,name',
            'reference'     =>'required',
            'buying_price'  =>'required|numeric',
            'selling_price' =>'required|numeric',
            'description'   =>'required',
            'image'         =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'attributes' => 'required|array',
            // 'attributes.*.attribute_id' => 'required|exists:attributes,id',  // Ensure each attribute_id is valid
            'attributes.*.attribute_values' => 'required|array',  // Ensure each attribute has attribute values
            // 'attributes.*.attribute_values.*' => 'exists:attribute_values,id',  // Ensure each attribute value exists
            // 'attributes'    =>'required|array',
            // 'attribute_values'      =>'required|array',
        ]);

        try
        {
            DB::beginTransaction();

            if($request->has('image'))
            {

                $imageName = time().'.'.$request->image->extension();
                $path_image = $request->image->move('images/', $imageName);
            }
            $product = Product::create([
                'user_id'   => auth()->user()->id,
                'name'      => $request->name,
                'reference'     => $request->reference,
                'buying_price'  => $request->buying_price,
                'selling_price' => $request->selling_price,
                'image'     =>   $path_image,
                'description'   => $request->description,
            ]);

            $attributes = $request->input('attributes'); // Get all the attributes
            for($index = 0; $index < count($attributes); $index++)
            {
                for($i = 0; $i < count($attributes[$index]['attribute_values']); $i++)
                {
                    $propertAttribute = new ProductAttribute();
                    $propertAttribute->product_id = $product->id;
                    $propertAttribute->attribute_id = $attributes[$index]['attribute_id'];
                    $propertAttribute->attribute_value_id = $attributes[$index]['attribute_values'][$i];
                    $propertAttribute->save();
                }
            }
            $productAttributes = ProductAttribute::where('product_id', $product->id)
            ->join('attributes', 'product_attributes.attribute_id', '=', 'attributes.id')
            ->join('attribute_values', 'product_attributes.attribute_value_id', '=', 'attribute_values.id')
            ->select('attributes.name as attribute_name', 'attribute_values.name as value_name', 'attribute_values.id as value_id', 'attributes.id as attribute_id')
            ->get()
            ->groupBy('attribute_id'); // Group by attribute_id

            // Generate all combinations of attribute values
            $attributeCombinations = $this->getAttributeCombinations($productAttributes);

            // Start with the product reference (or name)
            $referenceBase = $product->reference ?? $product->name;

            // Save each combination of attributes as a variant
            foreach ($attributeCombinations as $combination) {
                $variantReference = $referenceBase . '-' . implode('-', $combination);

                // Save the reference in the product_refre table
                ProductRefer::create([
                    'product_id' => $product->id,
                    'reference' => $variantReference,
                ]);
            }

            toastr()->success('created product successfully');

            DB::commit();

            return redirect()->route('e-shopping.product.index');
        }

        catch(Exception $e)
        {
            DB::rollBack();
            toastr()->error($e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product->find($id);
        $productAttributes = ProductAttribute::where('product_id', $id)
        ->join('attributes', 'product_attributes.attribute_id', '=', 'attributes.id')
        ->join('attribute_values', 'product_attributes.attribute_value_id', '=', 'attribute_values.id')
        ->select('attributes.name as attribute_name', 'attributes.id as attribute_id', 'attribute_values.name as value_name', 'attribute_values.id as value_id')
        ->get()
        ->groupBy('attribute_id');
        // $attrubites = ProductAttribute::whereProductId($id)->get();
        return view('user.product.view', compact('product', 'productAttributes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->find($id);
        // $attributes = $this->attributes->all();
        $attributeValues = $this->attributeValue->all();
        $attributes = Attribute::with('AttributeValue')->get();

        $productAttributes = ProductAttribute::where('product_id', $id)
        ->join('attributes', 'product_attributes.attribute_id', '=', 'attributes.id')
        ->join('attribute_values', 'product_attributes.attribute_value_id', '=', 'attribute_values.id')
        ->select('attributes.name as attribute_name', 'attributes.id as attribute_id', 'attribute_values.name as value_name', 'attribute_values.id as value_id')
        ->get()
        ->groupBy('attribute_id');

        return view('user.product.edit', compact('product', 'attributes', 'attributeValues', 'productAttributes'));
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
            'name'          =>'required|unique:products,name,'.$id,
            'reference'     =>'required',
            'buying_price'  =>'required|numeric',
            'selling_price' =>'required|numeric',
            'description'   =>'required',
            'image'         =>'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'attributes' => 'required|array',
        ]);

        $product = $this->product->find($id);

        $imageProduct = $product->image;
        if($request->has('image') && $request->image!= $imageProduct)
        {
            File::delete($imageProduct);
            $imageName = time().'.'.$request->image->extension();
            $imageProduct = $request->image->move('images/', $imageName);
        }
        $data = array_replace($request->all(),[
            'name' => $request->name,
            'reference' => $request->reference,
            'buying_price' => $request->buying_price,
            'selling_price' => $request->selling_price,
            'description' => $request->description,
            'image' => $imageProduct,
        ]);

        $product = $this->product->update($id, $data);


        ProductAttribute::where('product_id', $id)->delete();
        ProductRefer::where('product_id', $id)->delete();

        // Now, save the new attribute values
        foreach ($request->input('attributes', []) as $attributeId => $attributeValues) {
            foreach ($attributeValues as $attributeValueId) {
                ProductAttribute::create([
                    'product_id' => $id,
                    'attribute_id' => $attributeId,
                    'attribute_value_id' => $attributeValueId,
                ]);
            }
        }

        $productAttributes = ProductAttribute::where('product_id', $product->id)
        ->join('attributes', 'product_attributes.attribute_id', '=', 'attributes.id')
        ->join('attribute_values', 'product_attributes.attribute_value_id', '=', 'attribute_values.id')
        ->select('attributes.name as attribute_name', 'attribute_values.name as value_name', 'attribute_values.id as value_id', 'attributes.id as attribute_id')
        ->get()
        ->groupBy('attribute_id'); // Group by attribute_id

        // Generate all combinations of attribute values
        $attributeCombinations = $this->getAttributeCombinations($productAttributes);

        // Start with the product reference (or name)
        $referenceBase = $product->reference ?? $product->name;

        // Save each combination of attributes as a variant
        foreach ($attributeCombinations as $combination) {
            $variantReference = $referenceBase . '-' . implode('-', $combination);

            // Save the reference in the product_refre table
            ProductRefer::create([
                'product_id' => $product->id,
                'reference' => $variantReference,
            ]);
        }

        toastr()->success('updated product successfully');
        return redirect()->route('e-shopping.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->find($id);
        File::delete($product->image);
        Product::destroy($id);

        toastr()->success('deleted product successfully');
        return redirect()->route('e-shopping.product.index');
    }

    public function getAttributeValues($attributeId)
    {
        $values = AttributeValue::where('attribute_id', $attributeId)->get();
        return response()->json($values);
    }

    private function getAttributeCombinations($groupedAttributes)
    {
        // Prepare an array of attribute values for combination generation
        $attributeValues = [];
        foreach ($groupedAttributes as $attributeGroup) {
            $attributeValues[] = $attributeGroup->pluck('value_name')->toArray();
        }

        // Generate all combinations using cartesian product
        return $this->cartesian($attributeValues);
    }

// Cartesian product function to generate all combinations
    private function cartesian($input)
    {
        $result = [[]];
        foreach ($input as $values) {
            $append = [];
            foreach ($result as $product) {
                foreach ($values as $value) {
                    $append[] = array_merge($product, [$value]);
                }
            }
            $result = $append;
        }
        return $result;
    }
}
