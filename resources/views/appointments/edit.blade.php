{{-- Extends layout --}}
@extends('layouts.new')

{{-- Content --}}
@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">
                {{ $page_title }}
            </h3>
            <div class="text-right">
                <a href="{{ route('appointments.index') }}" style="margin-top: 16px;"
                    class="btn btn-primary mr-2">@lang('Back') ></a>
            </div>
        </div>

        <!--begin::Form-->
        <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <!-- EN Form -->
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('Start_date') <span class="text-danger">*</span></label>
                            <input type="text" class="form-control {{ $errors->has('Start_date') ? 'is-invalid' : '' }}"
                                name="Start_date" placeholder="@lang('Start_date')"
                                value="{{ old('Start_date') ?  old('Start_date') : $appointment->Start_date }}" required />
                            @if ($errors->has('Start_date'))
                                <div class="fv-plugins-message-container">
                                    <div class="fv-help-block">
                                        <strong>{{ $errors->first('Start_date') }}</strong>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('End_date') <span class="text-danger">*</span></label>
                            <input type="text" class="form-control {{ $errors->has('End_date') ? 'is-invalid' : '' }}"
                                name="End_date" placeholder="@lang('End_date')"
                                value="{{ old('End_date') ?  old('End_date') :  $appointment->End_date }}" required />
                            @if ($errors->has('End_date'))
                                <div class="fv-plugins-message-container">
                                    <div class="fv-help-block">
                                        <strong>{{ $errors->first('End_date') }}</strong>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">@lang('update') </button>
            </div>
        </form>
        <!--end::Form-->
    </div>

@endsection
