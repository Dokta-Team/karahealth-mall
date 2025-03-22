

<div>
    <div class="row mt-2">
        <div class="col-md-12">
            @if($thumbnail_image)
            <div class="card">
                <div class="card-header">
                    <h5>Profession Images</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-xl-3">
                            <div class="card product-card">
                                <div class="card-img-top"><img
                                    src="{{ asset('uploads/professions/'.$thumbnail_image) }}" alt="image"
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
                    <h5>Profession Details</h5>
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
                                    <label class="form-label">Profession Thumnail</label>
                                    <input type="file" class="form-control" wire:model="thumbnail"
                                        accept="image/*">
                                    @error('thumbnail')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @endif

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Select Category</label>
                                    <select class="form-control" wire:model="sub_category">
                                        <option value="">-- Select Category --</option>
                                        @foreach($categories as $key => $item)
                                        <optgroup label="{{ $item->name }}">
                                            @foreach($item->subCategories as $key => $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                          </optgroup>
                                        @endforeach
                                    </select>
                                    @error('sub_category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" wire:model="name" placeholder="Enter Name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-8 mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" wire:model="title" placeholder="Enter Title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Experience (Years)</label>
                                    <input type="number" class="form-control" wire:model="experience" placeholder="Enter Experience">
                                    @error('experience')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" wire:model="email" placeholder="Enter Email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" wire:model="phone" placeholder="Enter Phone">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Link</label>
                                    <input type="text" class="form-control" wire:model="link" placeholder="Enter Link">
                                    @error('link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Location</label>
                                    <input type="text" class="form-control" wire:model="location" placeholder="Enter Location">
                                    @error('location')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Short Description</label>

                                    <textarea class="form-control" wire:model="short_description" placeholder="Enter Short Description" cols="30" rows="3"></textarea>
                                    
                                    @error('short_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Description</label>
                                 
                                    <textarea class="form-control" wire:model="description" placeholder="Enter Short Description" cols="30" rows="5"></textarea>

                                    @error('description')
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
