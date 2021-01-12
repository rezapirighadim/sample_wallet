<h2 align="center">Create new transaction</h2>

<form action="{{ $action }}" method="POST">
    {!! @csrf_field() !!}

    <input type="hidden" name="_method" value="{{ $method }}">

    <div class="row">

        <div class="col-md-12">
            <div class="md-form">
                <input type="number" id="price" class="form-control" name="price" required
                       value="{{ $entity->getPrice() }}" min="{{ $wallet->getWalletMinVal() }}">
                <label for="name" class="">Transaction Price</label>
            </div>
        </div>

    </div>


    <div class="text-center text-md-left my-4">
        <a class="btn btn-rounded blue-gradient-rgba text-white" href="{{ route('wallet_transactions', $wallet->getId()) }}">Back</a>
        <button type="submit" class="btn btn-rounded blue-gradient-rgba text-white">Submit</button>
    </div>
</form>

@push('script')
    <script>
        $(document).ready(function () {
            $('.mdb-select').materialSelect();
        });
    </script>
@endpush