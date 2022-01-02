<div class="container mt-5 mb-5">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-6 col-12 gust-post">

            @if (isset($posts) && $posts->count() > 0)
                @foreach ($posts as $post)

                    {{-- Post --}}
                    <div class="card">
                        <div class="d-flex justify-content-between p-2 px-3">
                            <div class="d-flex flex-row align-items-center">
                                <img src="{{ asset('uploads/images/' . $post->users->image) }}" width="50"
                                    class="rounded-circle">
                                <div class="d-flex flex-column ml-2">
                                    <span class="font-weight-bold">{{ $post->users->name }}</span>

                                    <a href="{{ route('category.post', $post->categoryes->id) }}">
                                        <small class="text-primary" style="display: flex;">

                                            {{ $post->categoryes->name }}
                                        </small>
                                    </a>

                                </div>
                            </div>
                            <div class="d-flex flex-row mt-1 ellipsis">
                                <small class="mr-2">

                                    {{ $post->created_at->diffForHumans() }}

                                    {{-- @php
                                        date_default_timezone_set("europe/istanbul");
         
                                        $nowDate = strtotime("now");
                                        $postDate = strtotime($post->created_at);
                                        $totalSecondsDiff = abs($nowDate-$postDate); 
                                        $totalMinutesDiff = floor( $totalSecondsDiff/60 ); 
                                        $totalHoursDiff   = floor( $totalSecondsDiff/60/60 );

                                        if($totalSecondsDiff <= 59)
                                            echo $totalSecondsDiff . " " . __('home.second');
                                        else if($totalMinutesDiff <= 59)
                                            echo $totalMinutesDiff . " " . __('home.minutes'); 
                                        else if($totalHoursDiff <= 23)
                                            echo $totalHoursDiff . " " . __('home.hours');
                                        else 
                                            echo date_format($post->created_at, 'g:ia \o\n l jS F Y');

                                    @endphp --}}
                                </small>
                            </div>
                        </div>

                        <div class="dropdown-divider"></div>


                        <div class="p-2">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $post->translate(app()->getLocale())->title }}
                                </h5>
                                <p class="card-text">
                                    {!! $post->translate(app()->getLocale())->description !!}
                                </p>
                            </div>

                        </div>

                        <img src="{{ asset('uploads/images/' . $post->image) }}" class="img-fluid">

                    </div>

                @endforeach
            @endif
        </div>
    </div>
</div>
