<h3>Simple Shopping App - Step 2</h3>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <div>
                <div class="img"><img ng-src="{{product.images| checkurl}}" /></div>
                <div class="name"><span>{{product.name}}</span></div>
                <div class="price"><span>{{product.symbol.product.selling_price}}</span></div>
                <div class="btm">
                    <div class="qty"><input type="number" name="qty" style="width: 60px"></div>
                    <div class="buy"><input type="submit" name="buy" value="Buy Now"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
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