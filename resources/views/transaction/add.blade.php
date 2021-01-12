@extends('layout.layout')

@section('content')
    <div class="container py-5 mt-5">
        @include('transaction.form', [
            'action' => route('wallet_transaction_store', $wallet->getId()),
            'method' => 'POST',
            'entity' => $transaction
        ])
    </div>
@endsection