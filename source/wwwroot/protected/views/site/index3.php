<div class="container">
    <h3>Simple Shopping App - Step 3</h3>

    <div class="step3 row">
        <div class="col-md-6 col-lg-6" style="border: 1px solid;">
            <div style="float:left">
                <div class="img"><img src="<?php echo $model->data['images']; ?>" style="width: 250px" /></div>
            </div>
            <div style="float:right">
                <div class="name"><span><?php echo $model->data['name']; ?></span></div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="btm price">
                <div class="left">Unit Price</div>
                <div class="right"><span><?php echo $model->data['symbol'] . ' ' . $model->data['selling_price']; ?></span></div>
            </div>
            <div class="btm qty">
                <div class="left">Quantity</div>
                <div class="right"><span><?php echo $model->qty; ?></span></div>
            </div>
            <div><hr></div>
            <div class="btm total">
                <div class="left">Total Price</div>
                <div class="right"><span><?php echo $model->data['symbol'] . ' ' . $model->getTotal(); ?></span></div>
            </div>
            <div class="btm code">
                <div class="left">Promotion Code</div>
                <div class="right"><span><?php echo $model->code; ?></span></div>
            </div>
            <div class="btm discount">
                <div class="left">Discount</div>
                <div class="right"><span><?php echo '-' . $model->data['symbol'] . ' ' . $model->getDiscount(); ?></span></div>
            </div>
            <div class="btm deliver">
                <div class="left">Delivery To</div>
                <div class="right"><span><?php echo $model->area; ?></span></div>
            </div>
            <div class="btm shipping">
                <div class="left">Shipping Fee</div>
                <div class="right"><span><?php echo $model->data['symbol'] . ' ' . $model->getShipping(); ?></span></div>
            </div>
            <div><hr></div>
            <div class="btm payment">
                <div class="left">Payment Required</div>
                <div class="right"><span><?php echo $model->data['symbol'] . ' ' . $model->getPaymentTotal(); ?></span></div>
            </div>
        </div>
    </div>
</div>