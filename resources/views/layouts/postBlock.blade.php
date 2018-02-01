<div class="widget bg-white recent-posts-entry">
    <h4 class="widget-title">最新節目</h4>
    <div class="widget-post-bx">
        <div class="widget-post clearfix">

        @for($i=0; $i<3; $i++)
        <div class="widget-post clearfix">
            <div class="wt-post-media">
                <a href="live_ins/{{$results_ep->result->data[$i]->ep_id}}">
                    <img src="/img/gallery/{{ $results_ep->result->data[$i]->pgram_thumbnail }}" width="200" height="160" alt="">
                </a>
            </div>
            <div class="wt-post-info">
                <div class="wt-post-header">
                    <a href="live_ins/{{$results_ep->result->data[$i]->ep_id}}">
                        <h6 class="post-title">{{ $results_ep->result->data[$i]->pgram_name.'-'.$results_ep->result->data[$i]->ep_id }}</h6>
                    </a>
                </div>
                <div class="wt-post-meta">
                    <ul>
                        <li class="post-author">
                            <?php
                                $date = date_create($results_ep->result->data[$i]->ep_start_time);

                                echo date_format($date, 'Y-m-d');
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>