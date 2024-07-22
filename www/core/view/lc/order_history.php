<div class="background personal-bg">
    <div class="container busket-container-m">     
        <div class="history">


            <? $orders = mqs("SELECT * FROM orders WHERE user_id='".$_SESSION["user"]."' ORDER BY date_order DESC, time_order DESC");
            
            foreach($orders as $ord_info) {?>
                
                
                
                <div class="order">

                    <div class="order-header-wrapper">
                        <div>
                        <? $orders_type = mqo("SELECT * FROM orders_type WHERE id='".$ord_info["type_id"]."'"); ?>
                            <p class="order-type"><?=$orders_type["name"]?></p>
                            
                                <p class="order-address content-hidden">
                                    <?=$ord_info["adress"]?>
                                </p>
                           
                         <? $orders_status = mqo("SELECT * FROM orders_status WHERE id='".$ord_info["status_id"]."'"); ?>
                            <div class="order-status"><?=$orders_status["name"]?></div>
                        </div>
                        <div class="order-number-wrapper">
                            <p class="order-number">Заказ №<?=$ord_info["id"]?></p>
                            <p class="order-price"><?=$ord_info["summ"]?></p>
                        </div>
                        <div class="order-buttons">
                            <!-- <div class="reorder">                                                       ПОВТОРИТЬ ЗАКАЗ КНОПКА
                                <img src="/public/img/svg/reorder.svg" class="reorder-svg" alt="" />
                                <span class="reorder-title">Повторить заказ</span>
                            </div> -->
                            <button class="dropdown"></button>
                        </div>
                    </div>

                    <div class="order-content-wrapper content-hidden">
                        <div class="order-content-flex">
                                <?=$ord_info["details"]?>
                            
                        
                            <div class=" lc-order-info">
                                <p class="weight">
                                    Общий вес: <span class="text-decorated"><?=$ord_info["ves"]?> кг</span>
                                </p>
                                <p class="delivery-price">
                                    Доставка: <span class="text-decorated">0 руб</span>
                                </p>
                                <p class="order-cost">
                                    Стоимость заказа:
                                    <span class="text-decorated"><?=$ord_info["summ"]?></span>
                                </p>
                                <div class="total">
                                    <span class="total-title">Итого:</span>
                                    <span class="total-amount"><?=$ord_info["summ"]?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>

            <?}?>
            
        </div>
    </div>
</div>