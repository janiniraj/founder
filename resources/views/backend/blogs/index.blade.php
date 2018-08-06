@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . __('labels.backend.blogs.management'))

@section('breadcrumb-links')
    @include('backend.blogs.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.blogs.management') }}
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @include('backend.blogs.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('labels.backend.blogs.table.title') }}</th>
                                <th>{{ __('labels.backend.blogs.table.slug') }}</th>
                                <th>{{ __('labels.backend.blogs.table.createdat') }}</th>
                                <th>{{ __('labels.general.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->name }}</td>
                                    <td>{{ $blog->slug }}</td>
                                    <td>{{ $blog->created_at->diffForHumans() }}</td>
                                    <td>{!! $blog->action_buttons !!}</td>
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
                        {!! $blogs->total() !!} {{ trans_choice('labels.backend.blogs.table.total', $blogs->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $blogs->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
