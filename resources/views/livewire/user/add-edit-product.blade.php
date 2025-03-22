{{-- <div>
    <div class="row mt-2">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Product Details</h5>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Product Images</label>

                            <livewire:dropzone wire:model="thumbnail" :rules="['image', 'mimes:png,jpeg', 'max:10420']" :key="'dropzone-one'" />
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control" placeholder="Enter Product Name">
                        </div>


                        <div class="col-md-4 mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" placeholder="Enter Price">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Before Discound Price</label>
                            <input type="number" class="form-control"
                                placeholder="Enter Before Discound Price">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="number" class="form-control" placeholder="Enter Quantity">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label">SKU</label>
                            <input type="text" class="form-control" placeholder="Enter SKU">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-control">
                                <option value="Option 1">Option 1</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Brand</label>
                            <select class="form-control">
                                <option value="Option 1">Option 1</option>
                            </select>
                        </div>

                    

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Product Variant</label>
                            @foreach ($variants as $index => $variant)
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" placeholder="Variant Name" wire:model="variants.{{ $index }}.name">
                                    <input type="number" class="form-control" placeholder="Variant Price" wire:model="variants.{{ $index }}.price">
                                    <button class="btn btn-danger" type="button" wire:click="removeVariant({{ $index }})">Remove</button>
                                </div>
                            @endforeach
                        
                            <br>
                            <button class="btn btn-outline-secondary" type="button" wire:click="addVariant">+ Add Variant</button>
                        </div>


                        <div class="col-md-12 mb-3">
                            <label class="form-label">Products highlights</label>
                            <textarea class="form-control summernote" name="" cols="30" rows="3"
                                placeholder="Products highlights"></textarea>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Product Detail</label>
                            <textarea class="form-control summernote" name="" cols="30" rows="3" placeholder="Product Detail"></textarea>
                        </div>



                        <div class="col-md-12 mb-3">

                            <div class="row mb-3">
                                <div class="col-form-label col-3 pt-0">Delivery Available
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="delivery_available" id="delivery" value="1"
                                            checked="checked">
                                        <label class="form-check-label" for="delivery">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="delivery_available" id="pickup" value="0">
                                        <label class="form-check-label" for="pickup">No/Pickup
                                            Only</label>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>

                </div>


            </div>
            <div class="col-md-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mb-4">Submit</button>

            </div>

        </div>
    </div>
</div> --}}


<div>
    <div class="row mt-2">
        <div class="col-md-12">
            @if(count($product_images) > 0 || $thumbnail_image)
            <div class="card">
                <div class="card-header">
                    <h5>Product Images</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if($thumbnail_image)
                        <div class="col-sm-6 col-xl-3">
                            <div class="card product-card">
                                <div class="card-img-top"><img
                                    src="{{ asset('uploads/products/'.$thumbnail_image) }}" alt="image"
                                    class="mx-auto d-block img-prod img-fluid">
                                    <div class="btn-prod-cart card-body position-absolute end-0 bottom-0">
                                        <div class="btn btn-warning" wire:click="confirmDelete('thumbnail')">
                                            <svg class="pc-icon">
                                                <use xlink:href="#custom-bag"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body"><p class="prod-content mb-0 text-muted">Thumbnail</p>
                                    
                                </div>
                            </div>
                        </div>
                        @endif

                            @foreach($product_images as $key => $item)
                                <div class="col-sm-6 col-xl-3">
                                    <div class="card product-card">
                                        <div class="card-img-top"><img
                                            src="{{ asset('uploads/products/'.$item->image_path) }}" alt="image"
                                            class="mx-auto d-block img-prod img-fluid">
                                    
                                            <div class="btn-prod-cart card-body position-absolute end-0 bottom-0">
                                                <div class="btn btn-warning" wire:click="confirmDelete({{ $item->id }})"><svg class="pc-icon">
                                                        <use xlink:href="#custom-bag"></use>
                                                    </svg></div>
                                            </div>
                                        </div>
                                        <div class="card-body"><p class="prod-content mb-0 text-muted">Product Image {{ $key+1 }}</p>
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        
                    </div>
                </div>
            </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Product Details</h5>
                </div>
                <div class="card-body">

                    <div>
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif


                        <form wire:submit.prevent="save">
                            <div class="row">
                                @if(!$thumbnail_image)
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Product Thumnail</label>
                                    <input type="file" class="form-control" wire:model="thumbnail"
                                        accept="image/*">
                                    @error('thumbnail')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @endif

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Product Images</label>
                                    <livewire:dropzone wire:model="images" :multiple="true" :rules="['image', 'mimes:png,jpeg,Jpg', 'max:10420']"
                                        :key="'dropzone-one'" />
                                    @error('images.*')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Product Name -->
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" class="form-control" wire:model="name"
                                        placeholder="Enter Product Name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Product Price -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="number" class="form-control" wire:model="price"
                                        placeholder="Enter Price">
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Before Discount Price -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Before Discount Price</label>
                                    <input type="number" class="form-control" wire:model="before_discount_price"
                                        placeholder="Enter Before Discount Price">
                                    @error('before_discount_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Quantity -->
                                <div class="col-md-2 mb-3">
                                    <label class="form-label">Quantity</label>
                                    <input type="number" class="form-control" wire:model="quantity"
                                        placeholder="Enter Quantity">
                                    @error('quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- SKU -->
                                <div class="col-md-2 mb-3">
                                    <label class="form-label">SKU</label>
                                    <input type="text" class="form-control" wire:model="sku"
                                        placeholder="Enter SKU">
                                    @error('sku')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Category -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Category</label>
                                    <select class="form-control" wire:model="category_id">
                                        <option value="">Select Category</option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Brand -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Brand</label>
                                    <select class="form-control" wire:model="brand_id">
                                        <option value="">Select Brand</option>
                                        <option value="1">Brand 1</option>
                                        <option value="2">Brand 2</option>
                                    </select>
                                    @error('brand_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Product Variants -->
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Product Variant</label>
                                    @foreach ($variants as $index => $variant)
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control"
                                                wire:model="variants.{{ $index }}.name"
                                                placeholder="Variant Name">
                                            <input type="number" class="form-control"
                                                wire:model="variants.{{ $index }}.price"
                                                placeholder="Variant Price">
                                            <button class="btn btn-danger" type="button"
                                                wire:click="removeVariant({{ $index }})">Remove</button>
                                        </div>
                                        @error("variants.{$index}.name")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        @error("variants.{$index}.price")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    @endforeach
                                    <button class="btn btn-outline-secondary" type="button"
                                        wire:click="addVariant">+ Add Variant</button>
                                </div>

                                <!-- Product Highlights -->
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Product Highlights</label>
                                    <div wire:ignore>
                                        <textarea class="form-control summernote" id="highlights" wire:model="highlights" placeholder="Product Highlights"></textarea>

                                    </div>
                                    @error('highlights')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Product Detail -->
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Product Detail</label>
                                    <div wire:ignore>
                                        <textarea class="form-control summernote" id="detail" wire:model="detail" placeholder="Product Detail"></textarea>
                                    </div>
                                    @error('detail')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Delivery Available -->
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Delivery Available</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            wire:model="delivery_available" value="1">
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            wire:model="delivery_available" value="0">
                                        <label class="form-check-label">No/Pickup Only</label>
                                    </div>
                                    @error('delivery_available')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="col-md-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>


            </div>


        </div>
    </div>


    @section('script')
        <script>
            $('#highlights').on('summernote.change', function(we, contents, $editable) {
                @this.set('highlights', contents);
            });

            $('#detail').on('summernote.change', function(we, contents, $editable) {
                @this.set('detail', contents);
            });
        </script>
    @endsection
</div>
