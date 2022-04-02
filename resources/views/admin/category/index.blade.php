@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>職種一覧</h2>
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary">新規登録</a>
    </div>
    <div class="bg-white border rounded p-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="col-1">ID</th>
                    <th class="col-7">職種名</th>
                    <th class="col-2">編集</th>
                    <th class="col-2">削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td class="text-center">{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td class="text-center"><a href="{{ route("admin.category.edit", $category->id) }}" class="btn btn-primary">編集</a></td>
                        <td class="text-center">
                            <form action="{{ route('admin.category.delete', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        {{ $categories->links() }}
    </div>
@endsection
