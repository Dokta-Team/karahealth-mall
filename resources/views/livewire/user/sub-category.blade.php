<div>
    <div class="table-responsive">
        <table class="table table-hover" id="pc-dt-simple">
            <thead>
                <tr>
                    <th>Category Detail</th>

                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sub_categories as $key => $item)
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-auto pe-0">
                                <img src="{{ $item->image != NULL ? asset('uploads/categories/'.$item->image) : 'https://placehold.co/150x150?text='.urlencode($item->name) }}"
                                    alt="{{ $item->name }}" class="wid-40 rounded" />
                            </div>
                            <div class="col">
                                <h6 class="mb-1 text-truncate" style="max-width: 250px">
                                    {{ $item->name }}
                                </h6>
                               
                            </div>
                        </div>
                    </td>
                    
                  
                    <td class="text-center">
                        
                        <ul class="list-inline me-auto mb-0">
                           
                            <li class="list-inline-item align-bottom"
                                data-bs-toggle="tooltip" title="Edit">
                                <a href="{{ route('user.edit-sub-category', ['id' => $item->id]) }}"
                                    class="avtar avtar-xs btn-link-success btn-pc-default"><i
                                        class="ti ti-edit-circle f-18"></i></a>
                            </li>
                            <li class="list-inline-item align-bottom"
                            data-bs-toggle="tooltip" title="Delete">
                            <a href="javascript:;"  wire:click="confirmDelete({{ $item->id }})"
                                class="avtar avtar-xs btn-link-danger btn-pc-default"><i
                                    class="ti ti-trash f-18"></i></a>
                        </li>
                        </ul>
                    </td>
                </tr>
        
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>
