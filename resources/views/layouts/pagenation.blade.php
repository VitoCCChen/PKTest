<div class="pagination-bx col-lg-12 clearfix ">
    <ul class="custom-pagination pagination">
        {{--<li><a href="?page={{$i-1}}">&laquo;</a></li>--}}
        @for($i=0; $i<$results_ep->result->total_page; $i++)
            @if($results_ep->result->page-1 == $i)
                <li class="active"><a href="?page={{$i+1}}">{{$i+1}}</a></li>
            @else
                <li><a href="?page={{$i+1}}">{{$i+1}}</a></li>
            @endif
        @endfor
        {{--<li><a href="?page={{$i+1}}">&raquo;</a></li>--}}
    </ul>
</div>