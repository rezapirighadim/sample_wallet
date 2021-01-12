<h2 align="center">Create new wallet</h2>

<form action="{{ $action }}" method="POST">
    {!! @csrf_field() !!}

    <input type="hidden" name="_method" value="{{ $method }}">

    <div class="row">

        <div class="col-md-6">
            <div class="md-form">
                <input type="text" id="name" class="form-control" name="name" required value="{{ $entity->getName() }}">
                <label for="name" class="">Wallet name</label>
            </div>
        </div>

        <div class="col-md-6">
            <select class="mdb-select md-form" name="type" {{ $entity->getName() != null ? 'disabled' : null }}>
                <option value="0" disabled selected>Choose Wallet type</option>
                <option value="{{ \App\Entities\Wallet::TYPE_CREDIT }}" {{ is_a($entity, \App\Entities\Credit::class) ? 'selected' : null }}>
                    Credit
                </option>
                <option value="{{ \App\Entities\Wallet::TYPE_CACHE }}" {{ is_a($entity, \App\Entities\Cache::class) ? 'selected' : null }}>
                    Cache
                </option>
            </select>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="md-form">
                <input type="number" id="val" class="form-control" name="val" required {{ $entity->getName() != null ? 'readonly' : null }}
                       value="{{ $entity->getName() != null ? $entity->getValue() : 0 }}" min="{{ $entity->getWalletMinVal() }}">
                <label for="val" class="">Value</label>
            </div>
        </div>
    </div>

    <div class="text-center text-md-left my-4">
        <a class="btn btn-rounded blue-gradient-rgba text-white" href="{{ route('wallets') }}">Back</a>
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