@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . __('labels.backend.pages.management'))

@section('breadcrumb-links')
    @include('backend.pages.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.pages.management') }}
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @include('backend.pages.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('labels.backend.pages.table.title') }}</th>
                                <th>{{ __('labels.backend.pages.table.slug') }}</th>
                                <th>{{ __('labels.backend.pages.table.createdat') }}</th>
                                <th>{{ __('labels.general.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($pages as $page)
                                <tr>
                                    <td>{{ $page->name }}</td>
                                    <td>{{ $page->slug }}</td>
                                    <td>{{ $page->created_at->diffForHumans() }}</td>
                                    <td>{!! $page->action_buttons !!}</td>
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
                        {!! $pages->total() !!} {{ trans_choice('labels.backend.pages.table.total', $pages->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $pages->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
