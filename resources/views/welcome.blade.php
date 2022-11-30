@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {{--        <div class="col-md-8">--}}
            {{--            <div class="card">--}}
            {{--                <div class="card-body">--}}
            {{--                    @if (session('status'))--}}
            {{--                        <div class="alert alert-success" role="alert">--}}
            {{--                            {{ session('status') }}--}}
            {{--                        </div>--}}
            {{--                    @endif--}}

            {{--                    {{ __('You are logged in!') }}--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            --}}
            {{--            <p class="display-4">Pocetna stranica</p>--}}
            {{--        </div>--}}
            <div class="col-lg-6">
                <div>
                    <img src="https://pausal.rs/wp-content/uploads/2022/07/fr-pausal.jpg" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6">
                <h1>
                    @lang('invoices')
                </h1>
                <p class="text-right fs-4">
                    @lang('welcome_text')
                </p>
                <h3>
                    @lang('buttons')
                </h3>{{--dodati @lang kada zavrsimo pocetnu--}}
                <div class="my-5 d-flex justify-content-between">
                    <button class="btn btn-primary">
                        Dugme 1
                    </button>
                    <button class="btn btn-success">
                        Dugme 2
                    </button>
                    <button class="btn btn-warning">
                        Dugme 3
                    </button>
                    <button class="btn btn-danger">
                        Dugme 3
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
