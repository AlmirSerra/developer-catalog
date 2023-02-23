@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Delete Developer') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('developers.destroy', $developer->id) }}">
                            @csrf
                            @method('DELETE')

                            <p>Are you sure you want to delete this developer?</p>
                            <p><strong>{{ $developer->name }}</strong></p>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Delete Developer') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
