@extends('layouts.master')
@section('title', 'Book')

@section('content')
    <div class="col-md-12 my-5">
        <div class="row">
            <div class="col-md-9">
                <div class="card border-0 rounded-3 rounded shadow-lg p-4 h-100">
                    <div class="d-flex justify-content-between mb-3">
                        <h5>Transaksi Terakhir</h5>
                        <h5>Transaksi</h5>
                    </div>

                    @forelse ($transactions as $transaction)
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6 my-1">
                                    <button class="btn btn-dark btn-sm">
                                        {{ $transaction->account->nama }}
                                        <i class="fa-solid fa-arrow-right mx-3"></i>
                                        {{ $transaction->tujuan }}
                                    </button>
                                </div>
                                <div class="col-md-6 text-end">
                                    <button class="btn">
                                        {{ $transaction->created_at }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12 text-center">
                            Belum Ada Data Transaksi
                        </div>
                    @endforelse


                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 rounded-3 rounded shadow-lg p-4">
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h1>{{ $accounts_count }}</h1>
                                    <h5>Total Akun</h5>
                                </div>
                                <div class="bg-primary rounded-3 " style="width: 45px; height: 45px;">
                                    <div class="d-flex justify-content-center align-items-center h-100">
                                        <i class="fa-solid fa-user text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card border-0 rounded-3 rounded shadow-lg p-4 mt-4">
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h1>{{ $transactions_count }}</h1>
                                    <h5>Total Transaksi</h5>
                                </div>
                                <div class="bg-primary rounded-3" style="width: 45px; height: 45px;">
                                    <div class="d-flex justify-content-center align-items-center h-100">
                                        <i class="fa-solid fa-credit-card text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

