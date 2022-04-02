@extends('layouts.admin')

@section('content')
    <h2>給与形態作成</h2>
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

        <form action="{{ route('admin.salaryForm.store') }}" method="post">
            @csrf
            <div class="mb-3 row">
                <label for="companyCreate" class="col-sm-2 col-form-label">タグ名</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="companyCreate" name="name" value="{{ old('name') }}">
                </div>
            </div>
            <div class="d-flex mt-5">
                <button type="button" class="btn btn-outline-secondary mr-3" onclick="history.back()">戻る</button>
                <button type="submit" class="btn btn-primary">登録</button>
            </div>
        </form>
    </div>
@endsection
