<!DOCTYPE html>
<html ng-app="myApp">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <title><?php echo $this->pageTitle; ?></title>
        <link href="/static/flexSlider/flexslider.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <script src="/static/jquery-2.2.0.min"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0-rc.2/angular.min.js"></script>
        <script src="/static/flexSlider/jquery.flexslider-min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <style>
            .listing div.img {margin: 0 auto;}
            .listing div.img > img {display: block;width: 360px; height: 280px;}
            .listing div.name {max-height: 20px;overflow: hidden;}
            .listing > div > div {border: 0px solid;width: 360px;margin:0 auto;}
            .listing div.btm > .qty,
            .listing div.btm > .buy {display: inline-block;}
        </style>
    </head>

    <body style="margin: 0;">
        <div>
            <div class="flexslider" ng-controller="bannerController">
                <ul class="slides">
                    <li ng-repeat="banner in banners" repeat-complete="doSomething( $index )">
                        <img ng-src="{{banner.image| checkurl}}" />
                    </li>
                </ul>
            </div>
        </div>
        <form action="/site/shoppingcart" method="POST">
            <div class="container" ng-controller="productController">
                <div class="listing row">
                    <div class="col-md-6 col-lg-4" ng-repeat="product in products">
                        <div data-id="{{product.id}}">
                            <div class="img"><img ng-src="{{product.images| checkurl}}" /></div>
                            <div class="name"><span>{{product.name}}</span></div>
                            <div class="price"><span>{{product.symbol . product.selling_price}}</span></div>
                            <div class="btm">
                                <div class="qty"><input type="text" size="2"></div>
                                <div class="buy"><input type="button" name="buy" value="Buy Now"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <script src="/static/main.js"></script>
    </body>

</html>