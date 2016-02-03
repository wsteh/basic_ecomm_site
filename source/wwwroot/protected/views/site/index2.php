<div class="container">
    <h3>Simple Shopping App - Step 2</h3>

    <div class="step2 row">
        <div class="col-md-6 col-lg-6" style="border: 1px solid;">
            <div style="float:left">
                <div class="img"><img src="<?php echo $model->data['images']; ?>" style="width: 250px" /></div>
            </div>
            <div style="float:right">
                <div class="name"><span><?php echo $model->data['name']; ?></span></div>
                <div class="btm">
                    <div class="left"></div>
                    <div class="right price"><span><?php echo $model->data['symbol'] . $model->data['selling_price'] . ' x ' . $model->qty; ?></span></div>
                </div>
                <div><hr></div>
                <div class="btm">
                    <div class="left"><b>Total Price</b></div>
                    <div class="right"><?php echo $model->data['symbol'] . $model->getTotal(); ?></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <form action="<?php echo Yii::app()->createUrl('site/step3'); ?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $model->data['id']; ?>">
                <input type="hidden" name="qty" value="<?php echo $model->qty; ?>">
                <div class="area">
                    <div class="lbl">Ship to Area</div>
                    <div class="ent" style="display: inline-block"><select name="area">
                            <option value="Malaysia" selected>Malaysia</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Brunei">Brunei</option>
                        </select>
                    </div>
                </div>
                <div class="code">
                    <div class="lbl" style="display: inline-block">Promotion Code</div>
                    <div class="ent"><input type="text" name="code" style="width: 150px"></div>
                </div>
                <div><hr></div>
                <div class="btm">
                    <div class="buy"><input type="submit" name="buy" value="Confirm Checkout"></div>
                </div>
            </form>
        </div>
    </div>
</div>