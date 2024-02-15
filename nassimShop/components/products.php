<div class="products" id="products">
    <div class="products_container">
        <div class="pub1"></div>
        <div class="grids">
                <?php
                    $select_products=$conn->prepare("SELECT * FROM `products`");
                    $select_products->execute();
                    if($select_products->rowCount()>0){
                        while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
                            $tva = 120;
                            $pid = $fetch_products["id"];
                ?>
                <a href="prod<?=$pid?>.php?pid=<?=$pid?>"><div class="grid">
                    <img src="imgs/<?=$fetch_products["image"] ?>" alt="">
                    <div class="details">
                        <h2><?=$fetch_products["name"] ?></h2>
                        <p class="tva">MAD <?php echo $fetch_products["price"]+$tva ?></p>
                        <p>MAD <?=$fetch_products["price"] ?></p>
                    </div>
                </div></a>
                <?php
                        }
                    }
                ?>
        </div>
    </div>
</div>