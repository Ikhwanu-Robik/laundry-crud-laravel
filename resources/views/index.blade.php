@extends('layouts.general')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css?v=') . time() }}">
@endsection

@section('content')
    <h1>Clean n Clear</h1>

    <main>
        <div id="order-actions">
            <div id="order">
                <table>
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>pelanggan</th>
                            <th>tgl terima</th>
                            <th>tgl kembali</th>
                            <th>jenis</th>
                            <th>harga</th>
                            <th>jumlah</th>
                            <th>total</th>
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div id="actions">
                <a href="/update" class="link-button">Update</a>
                <a href="/delete" class="link-button">Delete</a>
            </div>
        </div>

        <div id="create">
            <h1>Tambah Nota</h1>

            <form action="/actions/create" method="post">
                @csrf
                <label for="pelanggan">Pelanggan</label>
                <select name="customer_id" id="pelanggan">
                    @foreach ($customers as $customer)
                        <option value={{ $customer['id'] }}>{{ $customer['name'] }}</option>
                    @endforeach
                </select>
                <label for="types">Jenis</label>
                <select name="laundry_type_id" id="types" onchange="adjustPrice()">
                    @foreach ($types as $type)
                        <option value="{{ $type['id'] }}">{{ $type['name'] }}</option>
                    @endforeach
                </select>
                <label for="price">Harga</label>
                <input type="number" name="price" id="price" readonly>
                <label for="qty">Jumlah</label>
                <input type="number" name="qty" id="qty">
                <label for="total">Total</label>
                <input type="number" name="total" id="total" readonly>
                <input type="submit" value="Tambah">
            </form>
        </div>
    </main>

    <script src="{{ asset('js/index.js?v=') . time() }}"></script>
@endsection
