@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . __('labels.backend.publications.management'))

@section('breadcrumb-links')
    @include('backend.publications.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.publications.management') }}
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @include('backend.publications.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('labels.backend.publications.table.title') }}</th>
                                <th>{{ __('labels.backend.publications.table.slug') }}</th>
                                <th>{{ __('labels.backend.publications.table.createdat') }}</th>
                                <th>{{ __('labels.general.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($publications as $publication)
                                <tr>
                                    <td>{{ $publication->name }}</td>
                                    <td>{{ $publication->slug }}</td>
                                    <td>{{ $publication->created_at->diffForHumans() }}</td>
                                    <td>{!! $publication->action_buttons !!}</td>
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
                        {!! $publications->total() !!} {{ trans_choice('labels.backend.publications.table.total', $publications->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $publications->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
