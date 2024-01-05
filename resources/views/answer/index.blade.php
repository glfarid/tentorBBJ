@extends('layouts.app')
@section('page_title', 'Questions')
@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            <span class="font-weight-semibold">{{ session('success') }}</span>
        </div>
    @endif

    <div class="card">


        <div class="card-body">
            <div class="row">


                @foreach ($Question as $qs)
                    <div class="col-md-6">

                        <label for="exampleFormControlTextarea1" class="form-label">{{ $qs->soal }}</label>
                        <form action="{{ route('response.store') }}" id="simpan" method="POST">

                            @csrf
                            <input type="hidden" name="id_questions[]" value="{{ $qs->id }}">

                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="7" name="jawaban[]" required></textarea>

                    </div>
                @endforeach

                @if(!$Question->isEmpty() && auth()->user()->responses()->exists() ? false : true )
                <div class="card-header header-elements-inline">
                    <h5 class="card-title"></h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <button type="submit" class="btn bg-dark btn-labeled btn-labeled-left" id="btn-submit"><b><i
                                        class="icon-add"></i></b>
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
                @else
                @endif
             

                </form>

                <div class="success" data-success="{{ Session::get('success') }}"></div>


            </div>
        </div>

    </div>


@endsection
