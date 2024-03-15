@extends('app')
@section('content')
<div class="row">
    <div class="col-md-6">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('mahasiswa.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Name <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="{{ old('nama') }}" />
            </div>
            <div class="mb-3">
                <label>NIM <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nim" value="{{ old('nim') }}" />
            </div>
            <div class="mb-3">
                <label>Jurusan</label>
                <input class="form-control" type="text" name="jurusan" value="{{ old('jurusan') }}" />
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Save</button>
                <a class="btn btn-danger" href="{{ route('mahasiswa.index') }}">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection