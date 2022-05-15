<div class="container-fluid fixed-bottom pb-5" >
    <div class="row ">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center breaking-news bg-white">
                <marquee class="news-scroll" behavior="scroll" direction="right" onmouseover="this.stop();" onmouseout="this.start();">
                    @foreach($posts as $post)
                        <a  href="{{route('singleNews',$post->id)}}">{{$post->title}}</a>
                        &nbsp;
                        <span class="dot "></span>
                        &nbsp;
                        @endforeach
                        </a> </marquee>
                <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-primary py-2 text-white px-1 news"><span class="d-flex align-items-center p-2">&nbsp;اخر الاخبار</span></div>

            </div>
        </div>
    </div>
</div>
