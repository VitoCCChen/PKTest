@extends('layouts.master')

@section('content')
<!-- CONTENT START -->
<div class="page-content">
    <!-- SECTION CONTENT START -->
    <div class="section-full p-t80 p-b50">

        <div class="container">
            <div class="row">
                <!-- SIDE BAR START -->
                <div class="col-md-3">
                    <aside class="side-bar">
                        <!-- SEARCH BLOCK START -->
                        @include('layouts.searchBlock')
                        <!-- SEARCH BLOCK END -->

                        <!-- RECENT POST BLOCK START -->
                        @include('layouts.postBlock')
                        <!-- RECENT POST BLOCK START -->

                        <!-- TAGS BLOCK START -->
                        @include('layouts.tagsBlock')
                        <!-- TAGS BLOCK END -->

                    </aside>

                </div>
                <!-- SIDE BAR END -->
                <!-- RIGHT PART START -->
                <div class="col-md-9">
                    <div class="row">
                        <!-- BLOG GRID START -->
                        <div class="portfolio-wrap wt-blog-grid-3">
                            <!-- COLUMNS 1 -->
                            @include('layouts.columeGrid')

                        </div>
                        <!-- BLOG GRID END -->

                        <!-- PAGINATION START -->
                    @include('layouts.pagenation')
                    <!-- PAGINATION END -->

                    </div>
                </div>
                <!-- right PART END -->

            </div>
        </div>

    </div>
    <!-- SECTION CONTENT END -->

</div>
<!-- CONTENT END -->
@stop

@section('scriptArea_1')
    <!-- SHORTCODE FUCTIONS  -->
    <script type="text/javascript" src="/js/jquery.ellipsis.min.js"></script>
    <script>
        $(function() {
            $('.wt-post-text').ellipsis();
        });
    </script>
@stop

@section('scriptArea_2')
    <script>
        $(document).ready(function(){
            //console.log("ready1s");
        });

        var getLoginSession = function(token){
            //console.log("getLoginSession", token);
            $.post("http://api.pkfun.xyz/api/login/facebook",{
                    accesstoken: token
                },
                function(data, status){
                    console.log("login success", data);
                });
        };

        var changeFBStatus = function(response){

            if (response.authResponse) {
                FB.api('/me/?fields=picture,name', function(me) {
                    document.getElementById("nameBlock").innerHTML = me.name;

                    //console.log($('.fb_username').val());

                    //$('.fb_username').val(me.name);

                    //console.log('FB.me', me);
                    getLoginSession(response.authResponse.accessToken);
                });

                document.getElementById("loginButton").style.display = "none";
                document.getElementById("logoutButton").style.display = "inline";
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
                $.get("http://api.pkfun.xyz/api/logout",{
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

