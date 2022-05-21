@extends('layouts.app')
@section('page.title', 'الاشعارات')

@section('content')
    <div class="portfolio-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
            <div class="row p-5">
                <div class="col-lg-12">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="home" role="tabpanel">
                            @if(count($notifications))
                                <div class="col-lg-9 col-md-8">
                                    <div class="project-details">
                                        @foreach($notifications as $notification)
                                            <h2>{{ $notification->title }}</h2>
                                            <h3>{{ $notification->body }}</h3>
                                            @if(!$loop->last)
                                                <hr />
                                            @endif
                                        @endforeach
                                    </div>
                                    {!! $notifications->links('vendor.pagination.bootstrap-4') !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
