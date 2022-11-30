@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@lang('create_invoice')</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('invoices.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <input id="user_id" type="hidden"
                                           class="form-control @error('user_id') is-invalid @enderror" name="user_id"
                                           value="{{ Auth::user()->id }}" autocomplete="user_id" autofocus>
                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="client_id"
                                       class="col-md-4 col-form-label text-md-end">@lang('client')</label>

                                <div class="col-md-6">
                                    <select name="client_id" id="client_id">
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}" @if ($client->id == old('client_id'))
                                                selected="selected"
                                                @endif> {{$client->name }} ({{ $client->company_name }})
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('client_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="invoice_number"
                                       class="col-md-4 col-form-label text-md-end">@lang('invoice_number')</label>

                                <div class="col-md-6">
                                    <input id="invoice_number" type="text"
                                           class="form-control @error('invoice_number') is-invalid @enderror"
                                           name="invoice_number" value="{{ old('invoice_number') }}"
                                           autocomplete="invoice_number" autofocus>

                                    @error('invoice_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="payment_term"
                                       class="col-md-4 col-form-label text-md-end">@lang('payment_term')</label>

                                <div class="col-md-6">
                                    <input id="payment_term" type="date"
                                           class="form-control @error('payment_term') is-invalid @enderror"
                                           name="payment_term"
                                           value="{{ old('payment_term') ? old('payment_term') : date('Y-m-d') }}"
                                           autocomplete="payment_term" autofocus>

                                    @error('payment_term')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="description"
                                       class="col-md-4 col-form-label text-md-end">@lang('description')</label>

                                <div class="col-md-6">
                                    <input id="description" type="text"
                                           class="form-control @error('description') is-invalid @enderror"
                                           name="description" value="{{ old('description') }}"
                                           autocomplete="description" autofocus>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0 justify-content-center">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary justify-content-center">
                                        @lang('create_invoice')
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
