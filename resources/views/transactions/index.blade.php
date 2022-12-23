@extends('layouts.master')
@section('title', 'transaction')

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
                        <i class="fa-solid fa-credit-card text-white"></i>
                    </div>
                </div>
                <div class="d-flex justify-center align-self-center">
                    <h4 class="h-auto m-0">Transaksi</h4>
                </div>
            </div>
            <div>
                <a href="{{ route('transaction.create') }}" class="btn btn-primary"><i class="fa-solid fa-square-plus me-2"></i>
                    Tambah</a>
            </div>
        </div>
    </div>

    <div class="card rounded-4 border-0 shadow-lg mt-3 mb-5 p-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">
                        <div class="col-md-12">
                            <div class="row p-3">
                                <div class="col-md-12 fw-bold">#</div>
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
                        @forelse ($transactions as $transaction)
                        <div class="col-md-12 py-2">
                            <div class="row border px-2 py-3 rounded-3">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>Rp. {{ $transaction->nominal }}</h5>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-outline-primary mt-2">
                                                {{ $transaction->account->nama }}
                                                <i class="fa-solid fa-arrow-right mx-3"></i>
                                                {{ $transaction->tujuan }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 text-end">
                                    {{ Date($transaction->created_at) }}
                                    <br>
                                    <span class="badge bg-secondary">
                                        {{ $transaction->kategori }}
                                    </span>
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
            {!! $transactions->links() !!}
        </div>
    </div>
@endsection
