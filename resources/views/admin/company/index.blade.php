@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>企業一覧</h2>
        <a href="{{ route('admin.company.create') }}" class="btn btn-primary">新規登録</a>
    </div>
    <div class="bg-white border rounded p-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="col-1">ID</th>
                    <th class="col-7">企業名</th>
                    <th class="col-2">詳細</th>
                    <th class="col-2">ログイン</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td class="text-center">{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td class="text-center"><a href="{{ route("admin.company.edit", $company->id) }}" class="btn btn-primary">詳細</a></td>
                        <td class="text-center"><a href="#" class="btn btn-warning">ログイン</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        {{ $companies->links() }}
    </div>
@endsection
