<table class="table table-hover table-bordered m-0 bg-white">
    <thead class="table-dark">
        <tr>
            <th>Nama Paket Fotografi</th>
            <th>Harga (Rp)</th>
            <th>Data Booking Terkait</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($packages as $pkg)
        <tr>
            <td class="align-middle fw-bold">{{ $pkg->name }}</td>
            <td class="align-middle">{{ number_format($pkg->price, 0, ',', '.') }}</td>
            
            <td class="align-middle">
                <ul class="mb-0 text-muted" style="font-size: 0.9em;">
                    @foreach ($pkg->bookings as $booking)
                        <li class="mb-2">
                            <strong class="text-dark">{{ $booking->customer_name }}</strong><br>
                            Tgl: {{ $booking->booking_date }} <br>
                            Email: {{ $booking->customer_email }}
                        </li>
                    @endforeach
                </ul>
            </td>
            
            <td class="align-middle text-center">
                <a href="#" class="btn btn-sm btn-primary">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
