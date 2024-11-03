@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Hồ sơ</h1>
    <form action="{{ route('profile.update-avatar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="avatar">Tải lên Avatar</label>
            <input type="file" name="avatar" id="avatar">
        </div>
        <button type="submit">Cập nhật Avatar</button>
    </form>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
</div>
@endsection
