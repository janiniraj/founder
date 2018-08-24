@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . __('labels.backend.quotes.management'))

@section('breadcrumb-links')
    @include('backend.quotes.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.quotes.management') }}
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @include('backend.quotes.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('labels.backend.quotes.table.title') }}</th>
                                <th>{{ __('labels.backend.quotes.table.slug') }}</th>
                                <th>{{ __('labels.backend.quotes.table.createdat') }}</th>
                                <th>{{ __('labels.general.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($quotes as $quote)
                                <tr>
                                    <td>{{ $quote->name }}</td>
                                    <td>{{ $quote->slug }}</td>
                                    <td>{{ $quote->created_at->diffForHumans() }}</td>
                                    <td>{!! $quote->action_buttons !!}</td>
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
                        {!! $quotes->total() !!} {{ trans_choice('labels.backend.quotes.table.total', $quotes->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $quotes->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
