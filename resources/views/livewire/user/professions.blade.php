<div>
    <div class="table-responsive">
        <table class="table table-hover" id="pc-dt-simple">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location </th>
                    <th>Experience </th>
                    <th>Email </th>
                    <th>Phone </th>
                    <th>Link </th>

                    @if(auth()->user()->role->name == 'admin')
                        <th>User</th>
                    @endif

                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($professions as $key => $item)
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-auto pe-0">
                                <img src="{{ $item->thumbnail != NULL ? asset('uploads/professions/'.$item->thumbnail) : 'https://placehold.co/150x150?text='.urlencode($item->thumbnail) }}"
                                    alt="{{ $item->name }}" class="wid-40 rounded" />
                            </div>
                            <div class="col">
                                <h6 class="mb-1 text-truncate" style="max-width: 250px">
                                    {{ $item->name }}
                                </h6>
                                <span>{{ $item->title }}</span>
                               
                            </div>
                        </div>
                    </td>
                    <td>
                        {{ $item->location }}
                    </td>
                    <td>
                        {{ $item->experience }}
                    </td>
                    <td>
                        {{ $item->email }}
                    </td>
                    <td>
                        {{ $item->phone }}
                    </td>
                    <td>
                        <a target="_blank" href="{{ $item->link }}"><i class="fa-solid fa-link"></i></a>
                    </td>
                    @if(auth()->user()->role->name == 'admin')
                        <td> {{ 'ID:'.$item->user->id.' - '.$item->user->name }}</td>
                    @endif
                  
                    <td class="text-center">
                        
                        <ul class="list-inline me-auto mb-0">
                           
                            <li class="list-inline-item align-bottom"
                                data-bs-toggle="tooltip" title="Edit">
                                <a href="{{ route('user.edit-profession', ['id' => $item->id]) }}"
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

    <div class="row">
        <div class="col-12">
            <nav class="mt-4 d-flex justify-content-center" aria-label="navigation">
                <ul class="pagination pagination-primary-soft d-inline-block d-md-flex rounded mb-0">

                    {{ $professions->links() }}

                </ul>

            </nav>
        </div>
    </div>
</div>
