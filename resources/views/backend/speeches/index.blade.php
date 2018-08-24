@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . __('labels.backend.speeches.management'))

@section('breadcrumb-links')
    @include('backend.speeches.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.speeches.management') }}
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @include('backend.speeches.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('labels.backend.speeches.table.title') }}</th>
                                <th>{{ __('labels.backend.speeches.table.slug') }}</th>
                                <th>{{ __('labels.backend.speeches.table.createdat') }}</th>
                                <th>{{ __('labels.general.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($speeches as $speech)
                                <tr>
                                    <td>{{ $speech->name }}</td>
                                    <td>{{ $speech->slug }}</td>
                                    <td>{{ $speech->created_at->diffForHumans() }}</td>
                                    <td>{!! $speech->action_buttons !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
            <div class="row">
                <div class="col-7">
                    <div class="float-left">
                        {!! $speeches->total() !!} {{ trans_choice('labels.backend.speeches.table.total', $speeches->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $speeches->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
