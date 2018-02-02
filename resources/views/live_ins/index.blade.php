@extends('layouts.master')

@section('content')
    <!-- SECTION CONTENT START -->
    <div class="section-full p-t50 p-b50 clearfix">
        <div class="container_live">

            <!-- BLOG START -->
            <div class="col-md-9 blog-post date-style-1 blog-detail">

                <div class="fb-video" data-href="{{ $data->pgram_url }}" data-show-text="false">

                    <div class="fb-xfbml-parse-ignore">
                        <blockquote cite="https://www.facebook.com/facebook/videos/10153231379946729/">
                        </blockquote>
                    </div>
                </div>
                <div class="wt-post-meta ">
                    <ul>
                        <li class="post-date">{{ $data->ep_start_time }}</li>
                    </ul>
                </div>
                <div class="wt-post-title ">
                    <h3 class="post-title"><a href="javascript:void(0);">{{ $data->pgram_name.'-'.$data->ep_id }}</a></h3>
                </div>

                <div class="wt-post-tags p-b20">
                    <div class="post-tags">
                        @foreach($data->ep_anchors as $anchor)
                            <a href="javascript:void(0);">{{  $anchor->name }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="wt-post-text">
                    <p>{{ $data->pgram_description }}</p>
                </div>
            </div>
            <div class="col-md-3" id="comment-list">
                <div class="comments-area" id="comments">
                    <div class="p-b30">
                        <h4><i class="fa fa-comments-o" aria-hidden="true"></i>聊天室</h4>
                        <ol id="chatListBlock" class="comment-list" id="chatListBlock" style="height:400px;">

                        </ol>
                        <div class="reply">
                            <input type="text" id="chatInput" disabled placeholder="請輸入留言">
                            <button id="chatSubmitButton" style="display:none;">留言</button>
                            <button class="m-b15 graphical  btn-primary blue  m-r5" id="chatLoginButton"  onClick="logInWithFacebook()" type="button" style="padding:0;margin:0;">
                                <span class="site-button-inr"><i class="fa fa-facebook"></i>
                                    <span style="padding:10px 5px;line-height:40px;text-align:left;">登入</span>
                                </span>
                            </button>

                        </div>
                    </div>
                </div>
                <div id="contributeForm" class="pointBox clearfix">
                    <div class="form long">
                        <label>元助主播:</label>
                        <select name="anchor" >
                            <option value="1">多朵</option>
                            <option value="2">朱兒</option>
                            <option value="3">若嵐</option>
                            <option value="4">張螞蟻</option>
                        </select>
                    </div>
                    <div class="form long">
                        <label>贈送元助點數:</label><input type="text" placeholder="請輸入點數" name="point">
                    </div>
                    <div class="form long">
                        <label>給她一句鼓勵的話:</label><input type="text" placeholder="" name="content">
                    </div>

                    <div class="wt-box">
                        <button type="submit" value="submit" id="contributeButton" class="site-button m-r5" style="margin: 10px 0; border-radius: 5px;">元助</button>
                    </div>
                </div>
            </div>
            <!-- BLOG END -->

        </div>
    </div>
    <!-- SECTION CONTENT END -->
@stop

@section('scriptArea_1')
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.11&appId=450483541741065';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <script src="https://cdn.socket.io/socket.io-1.2.0.js"></script>

    <script>
        $(function () {
            var name = 'CCC';


        });
    </script>
@stop

@section('scriptArea_2')
    <script type="text/javascript" src="/js/axios.min.js"></script>

    <script>
        var fb_name = "",
            fb_picture = "",
            userid = "";

        //start websocket
        var room = '{{ $data->pgram_id.'-'.$data->ep_id }}';

        var socket = io.connect('ws.pkfun.xyz:9501', {query: 'name=someone&room='+room});
        socket.emit('create', room);

        $(document).ready(function(){

            $.fn.scrollBottom = function() {
                console.log($(document).height() + " " + this.scrollTop() + " " + this.height());
                return $(document).height() - this.scrollTop() - this.height();
            };

            $("#chatSubmitButton").on("click",function(){
                if($("#chatInput").val().trim())
                {
                    socket.emit('chat message', fb_name, userid, $('#chatInput').val(), fb_picture);
                    $("#chatInput").val("");
                    //submitChatMessage($('#chatInput').val());
                }
                else
                    alert("請輸入點東西");

                //var chatComment = $("#chatInput").val().trim() ? $("#chatInput").val() : "";
                //submitChatMessage(chatComment);
            });

            $("#contributeButton").click(function(){
                console.log(typeof(parseInt($("#contributeForm").find("[name='point']").val())), $("#contributeForm").find("[name='anchor']").val(), $("#contributeForm").find("[name='point']").val(), $("#contributeForm").find("[name='content']").val());

                if(typeof(parseInt($("#contributeForm").find("[name='point']").val()))==="number" && parseInt($("#contributeForm").find("[name='point']").val()) > 0){
                    $.post("http://api.pkfun.xyz/api/contribute",{
                            anchor_id: $("#contributeForm").find("[name='anchor']").val(),
                            point: $("#contributeForm").find("[name='point']").val(),
                            contents: $("#contributeForm").find("[name='content']").val()
                        },
                        function(data, status){
                            console.log("Success", data);
                            if(data.success) {
                                alert("元助了 " + data.result.anc_name + " " + data.result.point + " 點成功，點數剩餘 " + data.result.member_point + "點。");
                                submitChatMessage("元助了 " + data.result.anc_name + " " + data.result.anc_name + " " + data.result.point + " 點, " + data.result.content);
                            }else{
                                alert("元助了 " + data.result.anc_name + " " + data.result.point + " 點失敗 " + data.result.message+ " ，點數剩餘 " + data.result.member_point + "點。");
                            }
                        });
                }else{
                    alert("請先登入");
                }
            });

            <!--region client send event to server-->

            //let user send message with enter
            $('#chatInput').on('keypress',function(e){
                if (e.which == 13){
                    console.log("enter is press by "+fb_name);
                    $('#chatSubmitButton').trigger('click');
                    return false;
                }
            });//*/

            <!--endregion-->


            <!--region client listen event from server-->

            //listen any message for client
            socket.on('chat message'+room, function(name, msg, pic){
                var dd = new Date();
                console.log(dd);
                var chatCommentDate = dd.getFullYear() + "/" + (dd.getMonth()+1) + "/" + dd.getDate() + " " + dd.getHours() + ":" + dd.getMinutes() + ":" + dd.getSeconds();

                var chatContent =   "<li class='comment'>" +
                    "<div class='comment-body'>" +
                    "<div class='comment-author vcard'>" +
                    "<img class='avatar photo' src='" + pic + "' alt=''>" +
                    "<cite class='fn'>" + name + "</cite>" +
                    "</div>" +
                    "<div class=\"comment-meta\">" + chatCommentDate + "</div>" +
                    "<p>"+ msg +"</p>" +
                    "</div></li>";

                if(msg && 0 != msg.length ) {

                    $("#chatListBlock").append(chatContent);
                    //$("#chatListBlock").scrollBottom();
                    $("#chatListBlock").scrollTop(9999999);
                };

            });

            //listen any disconnection in same room
            socket.on('disconnected'+room, function(msg){
                $('#chatListBlock').append($('<li>').text(msg));
                $("#chatListBlock").scrollBottom();
            });

            //get history messages and show it
            socket.on('load history'+room, function(history){
                history.msg.forEach(
                    function(value){
                        var sender = value.cl_sender;
                        var msg = value.cl_msg;

                        var nowDate = new Date(value.cl_creatdate);
                        var chatCommentDate = nowDate.getFullYear() + "/" + (nowDate.getMonth()+1) + "/" + nowDate.getDate() + " " + nowDate.getHours() + ":" + nowDate.getMinutes() + ":" + nowDate.getSeconds();

                        var chatContent =   "<li class='comment'>" +
                            "<div class='comment-body'>" +
                            "<div class='comment-author vcard'>" +
                            "<img class='avatar photo' src='" + value.url_photo + "' alt=''>" +
                            "<cite class='fn'>" + sender + "</cite>" +
                            "</div>" +
                            "<div class=\"comment-meta\">" + chatCommentDate + "</div>" +
                            "<p>"+ msg +"</p>" +
                            "</div></li>";

                            $("#chatListBlock").append(chatContent);
                            $("#chatListBlock").scrollTop(9999999);
                    });

                //told cerver losding history done
                socket.emit('welcome', fb_name);
            });

            //get room info
            socket.on('update roomInfo'+room, function(info){
                //$('#r').val(info);

                console.log(info);
            });
            <!--endregion-->
        });

        var getLoginSession = function(token){
            //console.log("getLoginSession", token);
            $.post("http://api.pkfun.xyz/api/login/facebook",{
                    accesstoken: token
                },
                function(data, status){
                    console.log("login success", data);
                    //var socket = io.connect('ws.pkfun.xyz:9501', {query: 'name='+fb_name});
                    userid = data.result[0].member_id;
                    socket.emit('login', fb_name, userid);
                });
        };

        var changeFBStatus = function(response){

            if (response.authResponse) {
                FB.api('/me/?fields=picture,name', function(me) {
                    document.getElementById("nameBlock").innerHTML = me.name;

                    console.log('FB.me', me);

                    fb_name = me.name;
                    fb_picture = me.picture.data.url;

                    getLoginSession(response.authResponse.accessToken);
                });

                document.getElementById("loginButton").style.display = "none";
                document.getElementById("logoutButton").style.display = "inline";

                document.getElementById("chatSubmitButton").style.display = "inline";
                document.getElementById("chatLoginButton").style.display = "none";
                document.getElementById("chatInput").removeAttribute("disabled");



            } else {
                alert('Facebook 權限發生錯誤');
            }

        };


        var logInWithFacebook = function() {
            FB.login(function(response) {

                changeFBStatus(response);

            }, {scope: 'public_profile,email'});

            return false;
        };


        var logoutWithFacebook = function(){
            FB.logout(function(response) {
                $.get("http://api.pkfun.xyz/api/logout/",{
                        //accesstoken: token
                    },
                    function(data,status){
                        //console.log("logout:", data);
                        window.location.reload();
                    });

            });
        };


        // 同步Facebook
        window.fbAsyncInit = function() {
            FB.init({
                appId: '450483541741065',
                cookie: true, // This is important, it's not enabled by default
                version: 'v2.10'
            });

            FB.getLoginStatus(function(response) {

                if (response.status === 'connected') {

                    changeFBStatus(response);

                } else {
                    document.getElementById("loginButton").style.display = "inline";
                    document.getElementById("logoutButton").style.display = "none";

                    document.getElementById("chatSubmitButton").style.display = "none";
                    document.getElementById("chatLoginButton").style.display = "inline";
                    document.getElementById("chatInput").setAttribute("disabled","disabled");
                }
            });

        };



    </script>



    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.11&appId=450483541741065';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

@stop