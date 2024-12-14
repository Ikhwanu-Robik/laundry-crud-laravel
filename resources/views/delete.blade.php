@extends('layouts.general')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/update.css?v=') . time() }}"">
@endsection

@section('content')
    <main>
        <h1>Delete Orders</h1>

        <div id="order">
            <table>
                <thead>
                    <tr>
                        <th>no</th>
                        <th>pelanggan</th>
                        <th>tgl_terima</th>
                        <th>tgl_kembali</th>
                        <th>jenis</th>
                        <th>harga</th>
                        <th>jumlah</th>
                        <th>total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order['id'] }}</td>
                            <td>{{ $order['customer_name'] }}</td>
                            <td>{{ $order['date_acc'] }}</td>
                            <td>{{ $order['date_clr'] }}</td>
                            <td>{{ $order['laundry_type_name'] }}</td>
                            <td>{{ $order['price'] }}</td>
                            <td>{{ $order['qty'] }}</td>
                            <td>{{ $order['total'] }}</td>
                            <td>
                                <form action="{{ route("orders.destroy", $order["id"]) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit">Delete</button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <a href="/">Kembali</a>
    </main>
@endsection
