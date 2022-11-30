@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1 class="text-center">@lang('create_client')</h1>
        <form method="POST" action="{{ route('clients.store') }}">
            @csrf
            <div class="form-group">
                <label for="tin_jmbg">@lang('tin_jmbg')</label>
                <input type="text" class="form-control  @error('tin_jmbg') is-invalid @enderror" id="tin_jmbg" name="tin_jmbg" value="{{ old('tin_jmbg') }}">
                @error('tin_jmbg')
                <p class="text-danger">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="form-group">
                <label for="activity_code">@lang('activity_code')</label>
                <input type="text" class="form-control  @error('activity_code') is-invalid @enderror" id="activity_code" name="activity_code"
                    value="{{ old('activity_code') }}">
                    @error('activity_code')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
            <div class="form-group">
                <label for="company_name">@lang('company_name')</label>
                <input type="text" class="form-control  @error('company_name') is-invalid @enderror" id="company_name" name="company_name"
                    value="{{ old('company_name') }}">
                    @error('company_name')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
            </div>
            <div class="form-group">
                <label for="bank_account">@lang('bank_account')</label>
                <input type="text" class="form-control  @error('bank_account') is-invalid @enderror" id="bank_account" name="bank_account"
                    value="{{ old('bank_account') }}">
                    @error('bank_account')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
            </div>
            <div class="form-group">
                <label for="phone_number">@lang('phone_number')</label>
                <input type="text" class="form-control  @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number"
                    value="{{ old('phone_number') }}">
                    @error('phone_number')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
            </div>
            <div class="form-group">
                <label for="name">@lang('name')</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                <p class="text-danger">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="surname">@lang('surname')</label>
                <input type="text" class="form-control  @error('surname') is-invalid @enderror" id="surname" name="surname" value="{{ old('surname') }}">
                @error('surname')
                <p class="text-danger">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">@lang('address')</label>
                <input type="text" class="form-control  @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}">
                @error('address')
                <p class="text-danger">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="city">@lang('city')</label>
                <input type="text" class="form-control  @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city') }}">
                @error('city')
                <p class="text-danger">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">@lang('email')</label>
                <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                <p class="text-danger">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">@lang('create_client')</button>

        </form>
    </div>
@endsection
