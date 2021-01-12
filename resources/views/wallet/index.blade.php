@extends('layout.layout')

@section('content')
    <div class="container my-5 py-5">
        <h2 class="mb-4">Wallets</h2>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th width="5%">#</th>
                <th width="40%">Name</th>
                <th width="15%">type</th>
                <th width="15%">Value</th>
                <th width="25%">Operations</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td colspan="5">
                    <a class="btn btn-sm btn-rounded blue-gradient-rgba text-white" href="{{ route('wallets_create') }}">Create new wallet</a>
                </td>
            </tr>
            @foreach($items as $wallet)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $wallet->getName() }}</td>
                    <td>{{ class_basename($wallet) }}</td>
                    <td>{{ $wallet->getValue() }}</td>
                    <td>
                        <form action="{{ route('wallets_delete', $wallet->getId()) }}" method="POST">
                            {!! @csrf_field() !!}

                            <input type="hidden" name="_method" value="DELETE">

                            <a class="btn btn-sm btn-rounded peach-gradient-rgba mr-3 text-white"
                               href="{{ route('wallet_transactions', $wallet->getId()) }}" title="Transactions">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-sm btn-rounded blue-gradient-rgba mr-3 text-white"
                               href="{{ route('wallets_edit', $wallet->getId()) }}" title="Edit">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-sm btn-rounded purple-gradient-rgba"
                               onclick="if (confirm('Are you sure?')) $(this).parent('form').submit();" title="Delete">
                                <i class="fa fa-trash"></i>
                            </a>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection