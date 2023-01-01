@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-3">
                            <div class="card text-bg-primary mb-3 text-center">
                                <div class="card-header">Manage Users</div>
                                <div class="card-body">
                                    <h1 class="card-title">{{App\Models\User::count()}}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-bg-success mb-3 text-center">
                                <div class="card-header">Manage Drivers</div>
                                <div class="card-body">
                                    <h1 class="card-title">0</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-bg-warning mb-3 text-center">
                                <div class="card-header">Manage Orders</div>
                                <div class="card-body">
                                    <h1 class="card-title">0</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-bg-info mb-3 text-center">
                                <div class="card-header">Manage Drivers</div>
                                <div class="card-body">
                                    <h1 class="card-title">0</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
