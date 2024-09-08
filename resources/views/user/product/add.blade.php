@extends('layouts.user.include')
@section('title', 'Products')

@section('title-section', 'Products')
@section('content')
@if ($errors->any())
    @foreach ($errors->all() as $error)
        @php
            toastr()->error($error)
        @endphp
    @endforeach
@endif
<div class="container-fluid py-4">
    <div class="card my-4">
        <div class="card-body px-0 pb-1">
            <form action="{{ route('e-shopping.product.store') }}" method="POST" class="row g-3 m-3" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="name" class="form-label">Name Product</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name product" value="{{ old('name') }}">
                    @error('name')
                        <small class="text-danger d-block">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="reference" class="form-label">Reference</label>
                    <input type="text" name="reference" class="form-control" id="reference" placeholder="Enter reference" value="{{ old('reference') }}">
                    @error('reference')
                        <small class="text-danger d-block">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="buying_price" class="form-label">Buying Price</label>
                    <input type="number" name="buying_price" class="form-control" id="buying_price" placeholder="Enter buying price" min="0" value="{{ old('buying_price') }}">
                    @error('buying_price')
                        <small class="text-danger d-block">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="selling_price" class="form-label">Selling Price</label>
                    <input type="number" name="selling_price" class="form-control" id="selling_price" placeholder="Enter selling price" min="0" value="{{ old('selling_price') }}">
                    @error('selling_price')
                        <small class="text-danger d-block">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="image" placeholder="Enter image" accept="image/*" value="{{ old('image') }}">
                    @error('image')
                        <small class="text-danger d-block">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" placeholder="Enter description " id="description" >{{ old('description') }}</textarea>
                    @error('description')
                        <small class="text-danger d-block">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-control-label">{{__('Attribute')}}</label>
                            <select class="form-control attributeClass" name="attributes[0][attribute_id]">
                                <option value="" selected>choose</option>
                                @foreach ($attributes as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group attribute-values" data-index="0">
                                <!-- Checkboxes will be loaded here via AJAX -->
                            </div>
                        </div>
                    </div>
                    <div id="productTypeFieldsContainer"></div>
                    <button type="button" id="addProductType" class="btn btn-primary" style="margin: 8px;">
                        {{__('Add Attribute')}}
                    </button>
                </div>



                <button type="submit" class="btn btn-primary">Added</button>
            </form>
        </div>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    var attributeIndex = 0; // Index to keep track of dynamically added fields
    console.log(attributeIndex);

    // Event delegation for dynamically added elements
    $(document).on('change', '.attributeClass', function() {
        var attributeId = $(this).val();
        var attributeValuesContainer = $(this).closest('.row').find('.attribute-values');

        if (attributeId) {
            $.ajax({
                url: '/attribute-values/' + attributeId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var checkboxes = '';
                    $.each(data, function(index, value) {
                        // Adjust the name attribute to keep it grouped with the corresponding attribute
                        checkboxes += `
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="value-${value.id}" name="attributes[${attributeIndex}][attribute_values][]" value="${value.id}">
                                <label class="form-check-label" for="value-${value.id}">
                                    ${value.name} 
                                </label>
                            </div>`;
                    });
                    attributeValuesContainer.html(checkboxes);
                }
            });
        } else {
            attributeValuesContainer.empty(); // Clear values if no attribute is selected
        }
    });

    // Add new attribute block
    $('#addProductType').click(function() {
        attributeIndex++; // Increment the index for the new block

        var newFieldSet = `
        <div class="row">
            <div class="col-md-6">
                <label class="form-control-label">{{__('Attribute')}}</label>
                <select class="form-control attributeClass" name="attributes[${attributeIndex}][attribute_id]">
                    <option value="" selected>choose</option>
                    @foreach ($attributes as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <div class="form-group attribute-values"></div>
            </div>
            <button type="button" class="removeProductType btn btn-secondary" style="margin: 8px;">
                {{__('Remove')}}
            </button>
        </div>`;

        $('#productTypeFieldsContainer').append(newFieldSet);
    });

    // Remove attribute block
    $(document).on('click', '.removeProductType', function() {
        $(this).closest('.row').remove();
    });
});


</script>





