<div>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>User</th>
                <th>Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Pengembalian</th>
                <th>Tnggal Mengembalikan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rentlog as $item)
            <tr class="{{ $item->actual_return_date == null ? '' : ($item->actual_return_date > $item->return_date ? 'table-danger' : 'table-success' ) }}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->user->username}}</td>
                    <td>{{$item->book->title}}</td>
                    <td>{{$item->rent_date}}</td>
                    <td>{{$item->return_date}}</td>
                    <td>{{$item->actual_return_date}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>