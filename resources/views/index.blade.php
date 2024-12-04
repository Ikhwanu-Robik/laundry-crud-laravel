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
                                <td>{{ $order['name'] }}</td>
                                <td>{{ $order['date_acc'] }}</td>
                                <td>{{ $order['date_clr'] }}</td>
                                <td>{{ $order['type'] }}</td>
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
                <select name="name" id="pelanggan">
                    <option value="NULL">-</option>
                    @foreach ($customers as $customer)
                        <option value={{ $customer['name'] }}>{{ $customer['name'] }}</option>
                    @endforeach
                </select>
                <label for="jenis">Jenis</label>
                <select name="type" id="jenis" onchange="adjustPrice()" onfocus="this.selectedIndex = -1;">
                    @foreach ($types as $type)
                        <option value="{{ $type['name'] }}">{{ $type['name'] }}</option>
                    @endforeach
                </select>
                <label for="harga">Harga</label>
                <input type="number" name="price" id="harga" readonly>
                <label for="jumlah">Jumlah</label>
                <input type="number" name="qty" id="jumlah">
                <label for="total">Total</label>
                <input type="number" name="total" id="total" readonly>
                <input type="submit" value="Tambah">
            </form>
        </div>
    </main>

    <script src="{{ asset('js/index.js?v=') . time() }}"></script>
@endsection
