
<div class="col-lg-4 right-blog-d">
    <div class="sidebar">
        <aside class="widget w-latest-news">
            <h5 class="widget-title">Latest Posts</h5>
            <ul class="latest-news-list">
            @foreach($trending as $vtrending)
                @php $vslug=str_slug($vtrending->title); @endphp
                <li>
                    <article itemscope="" itemtype="http://schema.org/NewsArticle" class="latest-news-item">
                        <div class="post__date">
                            <time class="published" datetime="2018-03-08 12:00:00">
                                <span class="number">{{date("j", strtotime($vtrending->created_at))}}</span> {{date("M", strtotime($vtrending->created_at))}}, {{date("Y", strtotime($vtrending->created_at))}}
                            </time>
                        </div>
                        <a href="{{url('/')}}/single/{{$vtrending->id}}/{{$vslug}}" class="h6 post__title entry-title">{{$vtrending->title}}</a>
                    </article>
                </li>
            @endforeach
            </ul>
        </aside>
        <div id="categories" class="widget widget_categories">
            <h5 class="">Categories</h5>
            <ul>
            @foreach($cat as $vcat)  
                @php
                    $cslug=str_slug($vcat->categories);
                    $rate=count(DB::select('select * from trending where cat_id=? and status=?', [$vcat->id,1]));
                @endphp 
                <li><a href="{{url('/')}}/cat/{{$vcat->id}}/{{$cslug}}">{{$vcat->categories}}<span class="count">({{$rate}})</span></a></li>
            @endforeach
            </ul>
        </div>
    </div>
</div>