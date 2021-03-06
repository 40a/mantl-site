<!doctype html>

<html class="no-js" lang="">

    <head>

        <meta charset="utf-8">

        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>@yield('title') | Mantl.io</title>

        <meta name="description" content="">

        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">

        <link rel="stylesheet" href="static/css/style.min.css">

		<script src="static/vendor/modernizr-2.8.3.min.js"></script>
		
    </head>

    <body class="{{ isset($pageClass) ? $pageClass.'-page' : 'default-page' }}">
        
        @include('components.header', ["pageID" => $pageID])

        <div id="main">

            @if($pageID != 0 && $pageID != 5)

                <div class="page-header"> 

                    <div class="row">
                        
                        <div class="columns small-12">
                            
                            @yield('page-header')

                        </div>

                    </div>

                </div>

            @endif
            
            @yield('content')

            @include('components.cta', ["pageID" => $pageID])
            
        </div>	

        @include('components.footer')	

		<script src="static/js/bundle.min.js"></script>

        @yield('scripts')

        <script type="text/javascript">
            
            $.ajax({
                url : "{{ url('feed/mantl') }}",
                success : function (data) {
                    $(data).each(function(index, item) {
                        var html = "<li><a target='_blank' href='" + item.url + "'><span>" + item.title + "</span> " + item.date + "</a></li>";
                        $(".blog-feed.mantl ul").append(html);
                    });
                }
            });
            
        </script>

		<script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>

    </body>

</html>