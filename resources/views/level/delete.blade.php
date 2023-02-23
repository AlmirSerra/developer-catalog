@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Delete Level') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('levels.destroy', $level->id) }}">
                            @csrf
                            @method('DELETE')

                            <p>Are you sure you want to delete this level?</p>
                            <p><strong>{{ $level->name }}</strong></p>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Delete Level') }}
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
