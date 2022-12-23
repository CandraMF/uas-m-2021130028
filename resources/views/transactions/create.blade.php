@extends('layouts.master')
@section('title', 'Account')

@section('content')
    <div class="card rounded-4 border-0 shadow-lg mt-5 p-4">
        <div class="d-flex justify-content-between">
            <div class="d-flex">
                <div class="bg-primary rounded-3 me-4" style="width: 45px; height: 45px;">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <i class="fa-solid fa-credit-card text-white"></i>
                    </div>
                </div>
                <div class="d-flex justify-center align-self-center">
                    <h4 class="h-auto m-0">Tambah Transaksi</h4>
                </div>
            </div>
            <div>
                <a href="{{ URL::previous() }}" class="btn btn-primary"><i class="fa-solid fa-chevron-left"></i></a>
            </div>
        </div>
    </div>

    <form action="{{ route('transaction.store') }}" method="POST">
        @csrf
        <div class="card rounded-4 border-0 shadow-lg mt-4 mb-2 p-4">
            <div class="col-md-12">
                <div class="row">
                    <div class="col">
                        <div class="mb-2">
                            <label for="account_id" class="form-label">Pengirim</label>
                            <select class="form-control" name="account_id" id="account_id" @error('account_id') is-invalid @enderror value="{{ old('account_id') }}">
                                @forelse ($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->nama }}</option>
                                @empty
                                    <option disabled >Data tidak ditemukan</option>
                                @endforelse
                            </select>
                            @error('account_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="d-flex justify-content-center align-items-center h-100">
                            <i class="fa-solid fa-arrow-right-arrow-left"></i>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="tujuan" class="form-label">Tujuan</label>
                            <input name="tujuan" type="text" class="form-control" id="tujuan" placeholder="Masukkan Tujuan" @error('tujuan') is-invalid @enderror value="{{ old('tujuan') }}">
                            @error('tujuan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card rounded-4 border-0 shadow-lg mb-5 p-4">
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input name="kategori" type="text" class="form-control" id="kategori" placeholder="Masukkan Kategori" @error('kategori') is-invalid @enderror value="{{ old('kategori') }}">
                @error('kategori')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nominal" class="form-label">Nominal</label>
                <input name="nominal" type="text" class="form-control" id="nominal" placeholder="Masukkan Nominal" @error('nominal') is-invalid @enderror value="{{ old('nominal') }}">
                @error('nominal')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 d-flex justify-content-end">
                <input type="reset" value="Reset" class="btn btn-secondary me-2">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
        </div>
    </form>
@endsection
