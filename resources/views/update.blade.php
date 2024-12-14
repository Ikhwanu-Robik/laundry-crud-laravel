@extends('layouts.general')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/update.css?v=') . time() }}"">
@endsection

@section('content')
    <h1>Update Orders</h1>

    <main>
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

        <div id="edit">
            <form action="/actions/update" method="post">
                @csrf
                <div class="input-group">
                    <label for="no">no</label>
                    <select name="id" id="no">
                        @foreach ($orders as $order)
                            <option value="{{ $order['id'] }}">{{ $order['id'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group">
                    <label for="name">pelanggan</label>
                    <select name="name" id="name">
                        @foreach ($customers as $customer)
                            <option value="{{ $customer['name'] }}">{{ $customer['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group">
                    <label for="date_acc">tgl terima</label>
                    <input type="date" name="date_acc" id="date_acc">
                </div>
                <div class="input-group">
                    <label for="types">jenis</label>
                    <select name="type" id="types" onchange="adjustPrice()" onfocus="this.selectedIndex = -1;">
                        @foreach ($types as $type)
                            <option value="{{ $type['name'] }}">{{ $type['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group">
                    <label for="price">harga</label>
                    <input type="number" name="price" id="price" readonly>
                </div>
                <div class="input-group">
                    <label for="qty">jumlah</label>
                    <input type="number" name="qty" id="qty">
                </div>
                <div class="input-group">
                    <label for="total">total</label>
                    <input type="number" name="total" id="total" readonly>
                </div>

                <input type="submit" value="Update">
            </form>
        </div>
        <a href="/">Kembali</a>
    </main>

    <script src="{{ asset('js/index.js?v=') . time() }}"></script>
@endsection
