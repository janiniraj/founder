@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . __('labels.backend.news.management'))

@section('breadcrumb-links')
    @include('backend.news.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.news.management') }}
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @include('backend.news.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('labels.backend.news.table.title') }}</th>
                                <th>{{ __('labels.backend.news.table.slug') }}</th>
                                <th>{{ __('labels.backend.news.table.createdat') }}</th>
                                <th>{{ __('labels.general.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($news as $oneNews)
                                <tr>
                                    <td>{{ $oneNews->name }}</td>
                                    <td>{{ $oneNews->slug }}</td>
                                    <td>{{ $oneNews->created_at->diffForHumans() }}</td>
                                    <td>{!! $oneNews->action_buttons !!}</td>
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
                        {!! $news->total() !!} {{ trans_choice('labels.backend.news.table.total', $news->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $news->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
