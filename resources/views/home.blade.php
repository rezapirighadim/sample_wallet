@extends('layout.layout')

@section('navbar')
    <header>
        <div class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url(https://mdbootstrap.com/img/Photos/Others/model-3.jpg); background-repeat: no-repeat; background-size: cover; background-position: center center;">
            <div class="mask rgba-white-light">
                <div class="container h-100 d-flex justify-content-center align-items-center">
                    <div class="row pt-5 mt-3">
                        <div class="col-md-12 mb-3">
                            <div class="intro-info-content text-center">
                                <h1 class="display-3 mb-5 wow fadeInDown" data-wow-delay="0.3s">NEW
                                    <a class="indigo-text font-weight-bold">WALLET</a>
                                </h1>
                                <h5 class="text-uppercase mb-5 mt-1 font-weight-bold wow fadeInDown" data-wow-delay="0.3s">Free
                                    digital wallet & transactions</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
        <h2 class="my-5" align="center">
        Select an action
    </h2>

    <div class="container d-flex justify-content-between mt-5">
        <div class="card" style="margin-right: 2rem;">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img
                        src="https://mdbootstrap.com/img/new/slides/042.jpg"
                        class="img-fluid"
                />
            </div>
            <div class="card-body">
                <h5 class="card-title">Wallet</h5>
                <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the
                    card's content.
                </p>
                <a href="{{ route('wallets') }}" class="btn btn-outline-primary">
                    Wallets
                </a>
            </div>
        </div>

        <div class="card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img
                        src="https://mdbootstrap.com/img/new/slides/041.jpg"
                        class="img-fluid"
                />
                <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                </a>
            </div>
            <div class="card-body">
                <h5 class="card-title">Transaction</h5>
                <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the
                    card's content.
                </p>
                <a href="#!" class="btn btn-outline-primary">
                    Transactions
                </a>
            </div>
        </div>

    </div>

@endsection