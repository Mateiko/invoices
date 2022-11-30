@extends('layouts.admin')
@section('content')
    @empty($clients)
        <div class="alert alert-warning">
            @lang('empty_list')
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
                        <h3>{{$clients->count()}}</h3>
                        <p>@lang('clients_on_page')</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-stalker"></i>
                    </div>
                    <a href="{{ route('clients.create') }}" class="small-box-footer">@lang('new_client')<i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="card">
            <div class="card-body">
                <h1 class="text-center">@lang('client_list')</h1>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <th>@lang('id')</th>
                    <th>@lang('tin_jmbg')</th>
                    <th>@lang('activity_code')</th>
                    <th>@lang('company_name')</th>
                    <th>@lang('bank_account')</th>
                    <th>@lang('phone_number')</th>
                    <th>@lang('name')</th>
                    <th>@lang('surname')</th>
                    <th>@lang('address')</th>
                    <th>@lang('city')</th>
                    <th>@lang('email')</th>
                    </thead>
                    <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->tin_jmbg }}</td>
                            <td>{{ $client->activity_code }}</td>
                            <td>{{ $client->company_name }}</td>
                            <td>{{ $client->bank_account }}</td>
                            <td>{{ $client->phone_number }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->surname }}</td>
                            <td>{{ $client->address }}</td>
                            <td>{{ $client->city }}</td>
                            <td>{{ $client->email }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-center">
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    @endif
@endsection
