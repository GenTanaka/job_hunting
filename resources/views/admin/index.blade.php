@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header"></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            You are admin logged in!
        </div>
    </div>
@endsection
