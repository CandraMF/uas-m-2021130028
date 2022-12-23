@extends('layouts.master')
@section('title', 'Account')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="card rounded-4 border-0 shadow-lg mt-5 p-4">
        <div class="d-flex justify-content-between">
            <div class="d-flex">
                <div class="bg-primary rounded-3 me-4" style="width: 45px; height: 45px;">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <i class="fa-solid fa-user text-white"></i>
                    </div>
                </div>
                <div class="d-flex justify-center align-self-center">
                    <h4 class="h-auto m-0">Akun</h4>
                </div>
            </div>
            <div>
                <a href="{{ route('accounts.create') }}" class="btn btn-primary"><i class="fa-solid fa-square-plus me-2"></i>
                    Tambah</a>
            </div>
        </div>
    </div>

    <div class="card rounded-4 border-0 shadow-lg mt-3 mb-5 p-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">
                        <div class="col-md-12 py-2">
                            <div class="row p-3">
                                <div class="col-md-1 fw-bold">#</div>
                                <div class="col-md-2">Id</div>
                                <div class="col-md-5">Nama</div>
                                <div class="col-md-2">Jenis</div>
                                <div class="col-md-2 text-end">Aksi</div>
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                <tr>
                    <td>
                        @forelse ($accounts as $account)
                        <div class="col-md-12 py-2">
                            <div class="row border p-3 rounded-3">
                                <div class="col-md-1 fw-bold">{{ $i++ }}</div>
                                <div class="col-md-2">{{ sprintf("%016d", $account->id) }}</div>
                                <div class="col-md-5">{{ $account->nama }}</div>
                                <div class="col-md-2"><button class="btn btn-{{ $account->jenis == 'Bisnis'? 'success' : 'primary'}} ">{{ $account->jenis }}</button></div>
                                <div class="col-md-2 text-end d-flex justify-content-end">
                                    <a href="{{ route('accounts.edit', sprintf("%016d", $account->id)) }}" class="btn btn-warning me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action={{ route('accounts.destroy', sprintf("%016d", $account->id)) }} method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty

                        <div class="col-md-12 py-2">
                            <div class="row border p-3 rounded-3">
                                <div class="col-md-12 text-center">
                                    Data Kosong
                                </div>
                            </div>
                        </div>

                        @endforelse
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $accounts->links() !!}
        </div>
    </div>
@endsection
