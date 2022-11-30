@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>@lang('edit_invoice')</h1>
        <form method="POST" action="{{ route('invoices.update', ['invoice' => $invoice->id]) }}">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="id">@lang('id')</label>
                    <input type="text" class="form-control" name="id" id="id" value={{ $invoice->id }} disabled>
                </div>
                <div class="form-group col-md-2">
                    <label for="number">@lang('invoice_number')</label>
                    <input type="text" class="form-control" neme="number" id="number"
                           value={{ $invoice->invoice_number }} disabled>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="client">@lang('created_to')</label>
                    <select class="custom-select" name="client">
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}"
                                    @if ((string) $client->id == $currentClientId) selected="selected" @endif>
                                {{ $client->name . ' ' . $client->surname }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="dateOfPayment">@lang('payment_term')</label>
                    <input type="date" class="form-control" name="dateOfPayment" value={{ $currentDateOfPayment }}>
                </div>
                <div class="form-group col-md-4">
                    <label for="status">@lang('status')</label>
                    <select class="custom-select" name="status">
                        <option value="not_paid" @if ($currentStatus == 'not_paid') selected="selected" @endif>Not paid
                        </option>
                        <option value="paid" @if ($currentStatus == 'paid') selected="selected" @endif>Paid</option>
                        <option value="in_progress" @if ($currentStatus == 'in_progress') selected="selected" @endif>In
                            progress
                        </option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary float-right">@lang('update')</button>
        </form>
    </div>
@endsection
