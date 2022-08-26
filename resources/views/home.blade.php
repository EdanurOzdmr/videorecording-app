@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <center>
                            <h2>Mesleğinle ilgili en sevdiğin 3 detay nedir?</h2>
                        </center>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <center>
                            <button type="submit" class="btn btn-success">
                                <a class="nav-link" href="{{ route('videoRegisterPage') }}">{{ __('Kayda Başla') }}</a>
                            </button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
