<?php
    include "connection.php";
    session_start();
    if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    } else {
    $user_id = '';
    }

    if(isset($_GET["pid"])){
        $pid=$_GET["pid"];
        $select_products=$conn->prepare("SELECT * FROM `products` WHERE id='$pid'");
        $select_products->execute();
        $fetch_products = $select_products->fetch(PDO::FETCH_ASSOC);
    }

    if (isset($_POST["submit"])) {
        $id=uniq_id();

        $name= $_POST['name'];
        $name = filter_var($name,FILTER_SANITIZE_STRING);

        $phone= $_POST['phone'];
        $phone = filter_var($phone,FILTER_SANITIZE_STRING);

        $adresse= $_POST['adresse'];
        $adresse = filter_var($adresse,FILTER_SANITIZE_STRING);

        $product_id= $fetch_products["id"];
        $product_id = filter_var($product_id,FILTER_SANITIZE_STRING);

        $product_price= $fetch_products["price"];
        $product_price = filter_var($product_price,FILTER_SANITIZE_STRING);

        $insert_user = $conn -> prepare("INSERT INTO `commands` (id,name,phone,adresse,product_id,product_price) Values (?,?,?,?,?,?)");
        $insert_user->execute([$id,$name,$phone,$adresse,$product_id,$product_price]);

        $success_msg[]="تم إرسال الطلبية بنجاح , ستتم مراستك بأقرب وقت";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nassim_shop</title>
    <link rel="icon" href="imgs/nassim_logo.png" type="image/x-icon">
    <style>
        <?php include "style.css"?>
        <?php include "prods.css"?>
    </style>
</head>
<body>
    <?php include "components/header.php"?>
    <div class="landing">
        <div class="landing_container">
            <div class="l_header">
                <img src="imgs/prod3_pub1.jpg" alt="">
                <h2><?=$fetch_products["name"]?></h2>
                <div class="prix">
                        <?php $tva = 120; ?>
                        <h2 class="tva">MAD <?php echo $fetch_products["price"]+$tva?></h2>
                        <h2>MAD <?=$fetch_products["price"]?></h2>
                    </div>
            </div>
            <form action="" method="post">
                <h2>املأ الاستمارة لإرسال الطلب :</h2>
                <input type="text" placeholder="الاسم الكامل" name="name" required>
                <input type="text" placeholder="رقم الهاتف" name="phone" required>
                <textarea placeholder="العنوان" name="adresse" required></textarea>
                <button type="submit" name="submit">اطلب الآن</button>
            </form>
            <div class="l_content">
                <div class="imgs">
                    <h1>قطاعة الخضار و اللحوم الكهربائية الأكثر طلبا فالمغرب متوفرة حاليا بكميات جد محدودة سارع بالطلب الآن</h1>
                    <div class="details_img">
                        <img src="imgs/<?=$fetch_products["image"]?>" alt="">
                        <div class="details">
                            <h2>مميزات المنتوج</h2>
                            <p>
أعتقد أنك لم تعد بحاجة إلى رائحة البصل والفلفل والثوم في يدك، الآن يمكنك ببساطة تقشير جميع المكونات وتقطيعها وسحقها مرة واحدة وبضغطة زر واحدة فقط.

جربه الآن، واحصل على أفضل مساعد مطبخ في حياتك ووفر وقتك الثمين، واستمتع بأقصى قدر من النكهة...</p>

                            <p>هذا المنتج خالي من البطاريات ويعمل بنسبة 100% على بطارية قابلة لإعادة الشحن تدوم طويلاً! <br>

نصيحة: كما أنه سهل الغسل ويحتوي على فرشاة دوارة تساعد في تنظيف جميع المواد. <br>

نصيحة 2:
تذكر أن تقوم بشحن الجهاز بالكامل لضمان أقصى قدر من الطاقة! <br>

متعدد الوظائف:
- مناسبة لتحريك البيض والكريم والثوم والبصل والخضروات والفواكه والفلفل والزبدة وأغذية الأطفال وغيرها.</p>
                            <p>تعليمات الاستخدام: <br>
1 - لا تحتاجين إلى فتح الغطاء بشكل متكرر، لأنه يحتوي على فتحة تسمح لك بإضافة المزيد دون الحاجة إلى إيقاف التشغيل. <br>
2- يمكن إدخال الخضار الطويلة مباشرة. <br>
3 - مقبض مريح ومريح ومستقر <br>
4- يمكن غسل الماكينة بالماء، اضغط على الزر للمساعدة في تنظيف الكوب والشفرات. <br></p>
<div class="evaluations">
    <p>4.6/5 (143 التقييمات)</p>
    <img src="imgs/5stars.png" alt="">
</div>
                        </div>
                    </div>
                    <img src="imgs/prod3_pub2.jpg" alt="">
                </div>
            </div>
            <div class="l_footer">
                <h1>إستفد من الشحن المجاني الأن و أحصل على المنتج الذي ترغب فيه</h1>
                <div class="album">
                    <img src="imgs/prod3_album_1.jpg" alt="">
                    <img src="imgs/prod3_album_2.jpg" alt="">
                    <img src="imgs/prod3_album_3.jpg" alt="">
                </div>
                <img src="imgs/propre.jpg" alt="">
            </div>
        </div>
    </div>
    <?php include "components/footer.php"?>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php include "alert.php" ?>
</body>
</html>