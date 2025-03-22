<div>
    <div class="card">
        <div class="card-body py-0">
            <ul class="nav nav-tabs profile-tabs" id="myTab" role="tablist">
                <li class="nav-item"><a href="javascript:;" class="nav-link {{ $tab == 'customer' ? 'active' : '' }}" wire:click="activeTab('customer')">Customer</a></li>
                <li class="nav-item"><a href="javascript:;" class="nav-link {{ $tab == 'profession' ? 'active' : '' }}" wire:click="activeTab('profession')">Profession</a></li>
                <li class="nav-item"><a href="javascript:;" class="nav-link {{ $tab == 'vendor' ? 'active' : '' }}" wire:click="activeTab('vendor')">Vendors</a></li>
                <li class="nav-item"><a href="javascript:;" class="nav-link {{ $tab == 'admin' ? 'active' : '' }}" wire:click="activeTab('admin')">Admin</a></li>
                <li class="nav-item"><a href="javascript:;" class="nav-link text-danger {{ $tab == 'deactive' ? 'active' : '' }}" wire:click="activeTab('deactive')">Deactive</a></li>
            </ul>
        </div>
    </div>
    <div class="card table-card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="pc-dt-simple">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $item)
                            <tr>
                                <td>
                                    <div class=" d-flex align-items-center">
                                        <div class=" pe-0">
                                            <img src="{{ asset('uploads/users/' . $item->profile_image) }}"
                                                alt="{{ $item->name }}" class="wid-40 rounded" />
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-1 text-truncate" style="max-width: 250px">
                                                {{ $item->name }}
                                            </h6>

                                        </div>
                                    </div>
                                </td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    @if ($item->role->name == 'admin')
                                        <span class="badge bg-light-danger f-12">{{ $item->role->name }}</span>
                                    @elseif($item->role->name == 'vendor' || $item->role->name == 'profession')
                                        <span class="badge bg-light-success f-12">{{ $item->role->name }}</span>
                                    @else
                                        <span class="badge bg-light-primary f-12">{{ $item->role->name }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <ul class="list-inline me-auto mb-0">

                                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                            title="Edit">
                                            <a href="{{ route('user.user.edit', ['id' => $item->id]) }}"
                                                class="avtar avtar-xs btn-link-success btn-pc-default"><i
                                                    class="ti ti-edit-circle f-18"></i></a>
                                        </li>
                                        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                            title="Delete">
                                            <a href="javascript:;" wire:click="confirmDelete({{ $item->id }})"
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

                            {{ $users->links() }}

                        </ul>

                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
