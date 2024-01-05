@extends('layouts.app')

@section('content')
    @if (auth()->user()->usertype == 'Admin')
        <div class="row">
            <div class="col-lg-4">

                <div class="card card-body">
                    <div class="media">
                        <div class="mr-3 align-self-center">
                            <i class="icon-cube icon-3x text-indigo-400"></i>
                        </div>

                        <div class="media-body text-right">
                            <h3 class="font-weight-semibold mb-0">{{ $aspek }}</h3>
                            <span><a href="{{ route('aspek.index') }}" class="text-uppercase font-size-sm text-muted">Data
                                    Aspek</a></span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-4">
                <div class="card card-body">
                    <div class="media">
                        <div class="mr-3 align-self-center">
                            <i class="icon-cube3 icon-3x text-indigo-400"></i>
                        </div>

                        <div class="media-body text-right">
                            <h3 class="font-weight-semibold mb-0">{{ $kriteria }}</h3>
                            <span><a href="{{ route('kriteria.index') }}"
                                    class="text-uppercase font-size-sm text-muted">Data Kriteria</a></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card card-body">
                    <div class="media">
                        <div class="mr-3 align-self-center">
                            <i class="icon-users4 icon-3x text-indigo-400"></i>
                        </div>

                        <div class="media-body text-right">
                            <h3 class="font-weight-semibold mb-0">{{ $alternatif }}</h3>
                            <span><a href="{{ route('alternatif.index') }}"
                                    class="text-uppercase font-size-sm text-muted">Data Alternatif</a></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card card-body">
                    <div class="media">
                        <div class="mr-3 align-self-center">
                            <i class="icon-user icon-3x text-indigo-400"></i>
                        </div>

                        <div class="media-body text-right">
                            <h3 class="font-weight-semibold mb-0">{{ $dpribadi }}</h3>
                            <span><a href="{{ route('peserta.index') }}" class="text-uppercase font-size-sm text-muted">Data
                                    Peserta</a></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card card-body">
                    <div class="media">
                        <div class="mr-3 align-self-center">
                            <i class="icon-question3 icon-3x text-indigo-400"></i>
                        </div>

                        <div class="media-body text-right">
                            <h3 class="font-weight-semibold mb-0">{{ $question }}</h3>
                            <span><a href="{{ route('questions.index') }}"
                                    class="text-uppercase font-size-sm text-muted">Data Question</a></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card card-body">
                    <div class="media">
                        <div class="mr-3 align-self-center">
                            <i class="icon-question3 icon-3x text-indigo-400"></i>
                        </div>

                        <div class="media-body text-right">
                            <h3 class="font-weight-semibold mb-0">{{ $tesp }}</h3>
                            <span><a href="{{ route('questionspemahaman.index') }}"
                                    class="text-uppercase font-size-sm text-muted">Data Tes Pemahaman</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }} {{ Auth::user()->name }}
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
