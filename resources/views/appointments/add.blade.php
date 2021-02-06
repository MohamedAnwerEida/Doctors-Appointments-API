{{-- Extends layout --}}
@extends('layouts.new')

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
        <form action="{{ route('appointments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <!-- EN Form -->
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('Start_date') <span class="text-danger">*</span></label>
                            <input type="text" class="form-control {{ $errors->has('Start_date') ? 'is-invalid' : '' }}"
                                name="Start_date" placeholder="@lang('Start_date')" value="{{ old('Start_date') }}" required
                                autofocus />
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
                                name="End_date" placeholder="@lang('End_date')" value="{{ old('End_date') }}" required
                                autofocus />
                            @if ($errors->has('End_date'))
                                <div class="fv-plugins-message-container">
                                    <div class="fv-help-block">
                                        <strong>{{ $errors->first('End_date') }}</strong>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Doctor">Doctor</label>
                            <select class="form-control" name="Doctor" id="Doctor">
                                @foreach (App\Models\User::where('type_id', App\Models\Type::GetTypeId(App\Models\Type::Doctor))->get() as $item)
                                    <option value="{{ $item->id }}" >{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Patient">Patient</label>
                            <select class="form-control" name="Patient" id="Patient">
                                @foreach (App\Models\User::where('type_id', App\Models\Type::GetTypeId(App\Models\Type::Patient))->get() as $item)
                                    <option value="{{ $item->id }}" >{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-block">@lang('create') </button>
            </div>
        </form>
        <!--end::Form-->
    </div>

@endsection

