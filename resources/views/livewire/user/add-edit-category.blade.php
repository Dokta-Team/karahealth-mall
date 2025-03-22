

<div>
    <div class="row mt-2">
        <div class="col-md-12">
            @if($thumbnail_image)
            <div class="card">
                <div class="card-header">
                    <h5>Product Images</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-xl-3">
                            <div class="card product-card">
                                <div class="card-img-top"><img
                                    src="{{ asset('uploads/categories/'.$thumbnail_image) }}" alt="image"
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

                    </div>
                </div>
            </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Category Details</h5>
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
                                    <label class="form-label">Category Thumnail</label>
                                    <input type="file" class="form-control" wire:model="thumbnail"
                                        accept="image/*">
                                    @error('thumbnail')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @endif

                             
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Category Name</label>
                                    <input type="text" class="form-control" wire:model="name"
                                        placeholder="Enter Category Name">
                                    @error('name')
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


</div>
