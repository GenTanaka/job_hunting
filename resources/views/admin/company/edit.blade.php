@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center pb-3">
        <h2>企業情報</h2>
        <a href="{{ route('admin.company.editPass', $company['id']) }}" class="btn btn-primary">パスワード変更</a>
    </div>
    <div class="bg-white border rounded p-3">
        @if ($errors->any())
            <div class="error-list bg-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-white">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.company.update', $company['id']) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3 row">
                <label for="companyCreate" class="col-sm-2 col-form-label">企業名</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="companyCreate" name="name" value="{{ old('name', $company['name']) }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="companyPresident" class="col-sm-2 col-form-label">代表者名</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="companyPresident" name="president" value="{{ old('president', $company['president']) }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="companyFoundation" class="col-sm-2 col-form-label">創立</label>
                <div class="d-flex col-sm-10 h2 align-items-center">
                    <input type="text" class="form-control col-2 d-inline" id="companyFoundation" name="year" placeholder="year" value="{{ old('year', $company['year']) }}"> /
                    <input type="text" class="form-control col-1 d-inline" id="companyFoundation" name="month" placeholder="month" value="{{ old('month', $company['month']) }}"> /
                    <input type="text" class="form-control col-1 d-inline" id="companyFoundation" name="day" placeholder="day" value="{{ old('day', $company['day']) }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="companyEmail" class="col-sm-2 col-form-label">メールアドレス</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="companyEmail" name="email" value="{{ old('email', $company['email']) }}">
                </div>
            </div>
            <div class="d-flex mt-5">
                <button type="button" class="btn btn-outline-secondary mr-3" onclick="history.back()">戻る</button>
                <button type="submit" class="btn btn-primary">更新</button>
            </div>
        </form>
    </div>
@endsection
