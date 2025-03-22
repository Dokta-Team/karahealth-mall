<div class="table-responsive">
    <table class="table mb-0">
        <thead>
            <tr>
                <th>Order #</th>
                <th>Date Purchased</th>
                <th>Status</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td class="py-3">
                        <a class="nav-link-style fw-medium fs-sm" 
                           href="{{ route('customer.track-order', ['id' => $order->id]) }}">
                            {{ strtoupper(substr(md5($order->id), 0, 10)) }}
                        </a>
                    </td>
                    <td class="py-3">{{ $order->purchased_date ? \Carbon\Carbon::parse($order->purchased_date)->format('M d, Y') : 'N/A' }}</td>                    <td class="py-3">
                        <span class="badge bg-soft-info m-0">{{ ucfirst($order->status) }}</span>
                    </td>
                    <td class="py-3">${{ number_format($order->total, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-3">No orders found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
