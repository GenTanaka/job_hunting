@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>給与形態一覧</h2>
        <a href="{{ route('admin.salaryForm.create') }}" class="btn btn-primary">新規作成</a>
    </div>
    <div class="bg-white border rounded p-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="col-1">ID</th>
                    <th class="col-7">タグ名</th>
                    <th class="col-2">編集</th>
                    <th class="col-2">削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($salary_forms as $salary_form)
                    <tr>
                        <td class="text-center">{{ $salary_form->id }}</td>
                        <td>{{ $salary_form->name }}</td>
                        <td class="text-center"><a href="{{ route("admin.salaryForm.edit", $salary_form->id) }}" class="btn btn-primary">編集</a></td>
                        <td class="text-center">
                            <form action="{{ route('admin.salaryForm.delete', $salary_form->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        {{ $salary_forms->links() }}
    </div>
@endsection
