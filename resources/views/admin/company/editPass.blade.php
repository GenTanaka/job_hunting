@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center pb-3">
        <h2>企業情報</h2>
        <a href="{{-- route(admin.company.editPass) --}}" class="btn btn-primary">パスワード変更</a>
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
        <form action="{{ route('admin.company.updatePass', $id) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $id }}">
            <div class="mb-3 row">
                <label for="old-pwd" class="col-sm-2 col-form-label">旧パスワード</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="old-pwd" name="old_pwd">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="new-pwd" class="col-sm-2 col-form-label">新パスワード</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="newPwd" name="new_pwd">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="new-pwd-confirm" class="col-sm-2 col-form-label">再入力</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="new-pwd-confirm" name="new_pwd_confirmation">
                </div>
            </div>
            
            <div class="d-flex mt-5">
                <button type="button" class="btn btn-outline-secondary mr-3" onclick="history.back()">戻る</button>
                <button type="submit" class="btn btn-primary">更新</button>
            </div>
        </form>
    </div>
@endsection
