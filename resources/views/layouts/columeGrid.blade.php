@foreach($results_ep->result->data as $result_ep)
<div class="post masonry-item col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="blog-post blog-grid date-style-3 live_list">
        <div class="wt-post-media wt-img-effect zoom-slow">
            <a href="live_ins/{{$result_ep->ep_id}}"><img src="/img/gallery/{{$result_ep->pgram_thumbnail}}" alt=""></a>
    </div>
        <div class="wt-post-info p-tb30 p-m30">
            <div class="wt-post-title ">
                <h3 class="post-title"><a href="live_ins/{{$result_ep->ep_id}}">{{ $result_ep->pgram_name.'-'.$result_ep->ep_id }}</a></h3>
            </div>
            <div class="wt-post-meta ">
                <ul>
                    <li class="post-date"> <i class="fa fa-television" aria-hidden="true"></i>
                        <strong>
                            <?php
                            $date = date_create($result_ep->ep_start_time);

                            echo date_format($date, 'd F');
                            ?>
                        </strong>
                        <span>
                            {{ date_format($date, 'Y') }}
                        </span>
                    </li>
                </ul>
            </div>
            <div class="wt-post-text">
                {{ $result_ep->pgram_description }}
            </div>
            <div class="wt-post-readmore">
                <a href="live_ins/{{$result_ep->ep_id}}" title="READ MORE" rel="bookmark" class="site-button-link">READ MORE <i class="fa fa-angle-double-right"></i></a>
            </div>
            <div class="wt-post-tags">
                <div class="post-tags">
                    @foreach($result_ep->ep_anchors as $anchor)
                        <a href="javascript:void(0);">{{$anchor->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach