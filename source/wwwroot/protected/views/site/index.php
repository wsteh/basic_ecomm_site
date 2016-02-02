<div>
    <div class="flexslider" ng-controller="bannerController">
        <ul class="slides">
            <li ng-repeat="banner in banners" repeat-complete="doSomething( $index )">
                <img ng-src="{{banner.image| checkurl}}" />
            </li>
        </ul>
    </div>
</div>

<h3>Simple Shopping App - Step 1</h3>

<div class="container" ng-controller="productController">
    <div class="listing row">
        <div class="col-md-6 col-lg-4" ng-repeat="product in products">
            <form action="<?php echo Yii::app()->createUrl('site/shoppingcart'); ?>" method="POST">
                <input type="hidden" name="id" value="{{product.id}}">
                <div data-id="{{product.id}}">
                    <div class="img"><img ng-src="{{product.images| checkurl}}" /></div>
                    <div class="name"><span>{{product.name}}</span></div>
                    <div class="price"><span>{{product.symbol.product.selling_price}}</span></div>
                    <div class="btm">
                        <div class="qty"><input type="number" name="qty" style="width: 60px"></div>
                        <div class="buy"><input type="submit" name="buy" value="Buy Now"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>