@extends('layout.layout')

@section('content')
    <div class="container my-5 py-5">
        <h2 class="mb-4">Wallet {{ $wallet->getName() }} Transactions</h2>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>index</th>
                <th width="30%">Price</th>
                <th width="30%">Balance</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td colspan="4">
                    <a class="btn btn-sm btn-rounded blue-gradient-rgba text-white"
                       href="{{ route('wallet_transaction_create', $wallet->getId()) }}">Create new transaction</a>
                </td>
            </tr>
            @foreach($items as $transaction)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaction->getPrice() }}</td>
                    <td>{{ $transaction->getBalance() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection