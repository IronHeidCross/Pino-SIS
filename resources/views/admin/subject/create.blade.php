@extends('layouts.master')

@section('title') Subject Add @endsection

@section('content')


@include('layouts.default-message')

<link rel="stylesheet" href="{{ asset('css/form.css') }}">
<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4 text-center">Subject Create Form</h4>
        <form action="{{ route('admin.subject.create') }}" method="post">
            @csrf
            <div class="mb-3 row">
                <label for="input--group_id" class="col-md-2 offset-md-2 col-form-label text-end">
                    Subject Group <sup class="text-danger">*</sup>
                </label>
                <div class="col-md-5">
                    <select class="form-select" name="group_id" id="input--group_id" required>
                        <option selected>Please Select</option>
                        @if ($groups)
                            @foreach ($groups as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        @endif
                      </select>

                    @error('group_id')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="input--name" class="col-md-2 offset-md-2 col-form-label text-end">
                    Subject Name <sup class="text-danger">*</sup>
                </label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="name" id="input--name" placeholder="enter roll"
                        required value="{{ old('name', '') }}">

                    @error('name')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success btn-lg mt-3">Create</button>
            </div>

        </form>
    </div>
</div>

@endsection