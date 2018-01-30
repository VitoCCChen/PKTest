@foreach($results_ep->result->data as $result)
<div class="post masonry-item col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="blog-post blog-grid date-style-3 live_list">
        <div class="wt-post-media wt-img-effect zoom-slow">
            <a href="live_ins"><img src="/img/gallery/pic4.jpg" alt=""></a>
        </div>
        <div class="wt-post-info p-tb30 p-m30">
            <div class="wt-post-title ">
                <h3 class="post-title"><a href="live_ins">{{$result->pgram_name.$result->ep_id}}</a></h3>
            </div>
            <div class="wt-post-meta ">
                <ul>
                    <li class="post-date"> <i class="fa fa-television" aria-hidden="true"></i><strong>10 Aug</strong> <span> 2016</span> </li>
                </ul>
            </div>
            <div class="wt-post-text">
                這次SUN咩咩要來介紹這位台灣女模洪雅妮。本身跑遍各大展場、外拍、活動，經驗十分豐富，外型亮麗身材比例完美，並有著小狗般無辜的眼神，任誰看了都想疼
            </div>
            <div class="wt-post-readmore">
                <a href="live_ins" title="READ MORE" rel="bookmark" class="site-button-link">READ MORE <i class="fa fa-angle-double-right"></i></a>
            </div>
            <div class="wt-post-tags">
                <div class="post-tags">
                    @foreach($result->ep_anchors as $anchor)
                        <a href="javascript:void(0);">{{$anchor->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach


<script type="text/javascript" src="/js/axios.min.js"></script>

<script>
    /*axios.get('http://pkfunapi.test/api/getEpisode')
        .then(function (response){
            console.log(response);
            console.log(response['data']);
            console.log(response['data']['result']);
            $columes = response['data']['result'];
            console.log($columes);
            console.log($columes['data']);

        })
        .catch(function (error){
            console.log(error);
        })*/
</script>