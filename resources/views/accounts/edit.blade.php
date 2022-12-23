@extends('layouts.master')
@section('title', 'Account')

@section('content')
    <div class="card rounded-4 border-0 shadow-lg mt-5 p-4">
        <div class="d-flex justify-content-between">
            <div class="d-flex">
                <div class="bg-primary rounded-3 me-4" style="width: 45px; height: 45px;">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <i class="fa-solid fa-user-plus text-white"></i>
                    </div>
                </div>
                <div class="d-flex justify-center align-self-center">
                    <h4 class="h-auto m-0">Ubah Akun</h4>
                </div>
            </div>
            <div>
                <a href="{{ URL::previous() }}" class="btn btn-primary"><i class="fa-solid fa-chevron-left"></i></a>
            </div>
        </div>
    </div>

    <div class="card rounded-4 border-0 shadow-lg mt-3 mb-5 p-5">
        <form action="{{ route('accounts.update', ['account' => sprintf("%016d", $account->id)]) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input name="nama" type="text" class="form-control" id="nama" placeholder="Masukkan Nama" @error('nama') is-invalid @enderror value="{{ old('nama') ?? $account->nama }}">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Akun</label><br>

                <input type="radio" class="btn-check" value="Personal" name="jenis" id="personal" autocomplete="off" {{ (@old('jenis') ?? $account->jenis) == 'Personal'? 'checked' : '' }}>
                <label class="btn btn-outline-primary" value="Personal" for="personal">Personal</label>

                <input type="radio" class="btn-check" value="Bisnis" name="jenis" id="bisnis" autocomplete="off" {{ (@old('jenis') ?? $account->jenis) == 'Bisnis'? 'checked' : '' }}>
                <label class="btn btn-outline-success" for="bisnis">Bisnis</label>

                <br>

                @error('jenis')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 d-flex justify-content-end">
                <input type="reset" value="Reset" class="btn btn-secondary me-2">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>
    </div>

@endsection
