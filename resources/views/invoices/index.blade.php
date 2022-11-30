@extends('layouts.admin')
@section('content')
    @empty($invoices)
        <div class="alert alert-warning">
            @lang('empty_list');
        </div>
    @else
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="row mt-2 justify-content-left ml-2">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$invoices->count()}}</h3>
                        <p>@lang('invoices_on_page')</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-compose"></i>
                    </div>
                    <a href="{{ route('invoices.create') }}" class="small-box-footer">@lang('new_invoice')<i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="card">
            <div class="card-body">
                <h1 class="text-center">@lang('invoice_list')</h1>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <th>@lang('id')</th>
                    <th>@lang('invoice_number')</th>
                    <th>@lang('from')</th>
                    <th>@lang('to')</th>
                    <th>@lang('payment_term')</th>
                    <th>@lang('status')</th>
                    <th>@lang('action')</th>
                    </thead>
                    <tbody>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->id }}</td>
                            <td>{{ $invoice->invoice_number }}</td>
                            <td>{{ $invoice->u_name . ' ' . $invoice->u_surname }}</td>
                            <td>{{ $invoice->c_name . ' ' . $invoice->c_surname }}</td>
                            <td>{{ $invoice->payment_term }}</td>
                            <td>{{ $invoice->status }}</td>
                            <td>
                                <a class="btn btn-info"
                                   href="{{ route('invoices.show', ['invoice' => $invoice->id]) }}">@lang('show_more')</a>
                                <form class="d-inline" method="POST"
                                      action="{{ route('invoices.destroy', ['invoice' => $invoice->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                            onclick="confirm('Are you sure you want delete this item')">@lang('delete')</button>
                                </form>
                                </form>
                                <form class="d-inline" method="GET"
                                      action="{{ route('invoices.edit', ['invoice' => $invoice->id]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-warning">@lang('edit')</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-center">
                    {{ $invoices->links() }}
                </div>
            </div>
        </div>
    @endif
@endsection
