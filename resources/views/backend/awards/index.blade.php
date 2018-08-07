@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . __('labels.backend.awards.management'))

@section('breadcrumb-links')
    @include('backend.awards.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.awards.management') }}
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @include('backend.awards.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('labels.backend.awards.table.title') }}</th>
                                <th>{{ __('labels.backend.awards.table.year') }}</th>
                                <th>{{ __('labels.backend.awards.table.createdat') }}</th>
                                <th>{{ __('labels.general.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($awards as $award)
                                <tr>
                                    <td>{{ $award->name }}</td>
                                    <td>{{ $award->year }}</td>
                                    <td>{{ $award->created_at->diffForHumans() }}</td>
                                    <td>{!! $award->action_buttons !!}</td>
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
                        {!! $awards->total() !!} {{ trans_choice('labels.backend.awards.table.total', $awards->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $awards->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
