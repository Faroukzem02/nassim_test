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

        $success_msg[]='تم إرسال الطلبية بنجاح , ستتم مراستك بأقرب وقت';
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
                <img src="imgs/prod1_pub1.jpg" alt="">
                <h2><?=$fetch_products["name"]?></h2>
                <div class="prix" id="form">
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
                    <h1>القلاية الهوائية الأكثر طلبا فالمغرب متوفرة حاليا بكميات جد محدودة سارع بالطلب الآن</h1>
                    <div class="details_img">
                        <img src="imgs/<?=$fetch_products["image"]?>" alt="">
                        <div class="details">
                            <h2>مميزات المنتوج</h2>
                            <p>القلاية الهوائية Home Gadgets بسعة 6  لترات، هي إضافة لا غنى عنها في مطبخك لتلبية رغباتك في القلي بكل سهولة وكفاءة. تتمتع هذه الفراية بقوة مذهلة تبلغ 2400 واط، مما يضمن نتائج سريعة ومقرمشة في كل استخدام</p>
                            <p>سعة كبيرة تصل إلى 6 لترات: تمكِّنك هذه القلاية الهوائية الواسعة من إعداد كميات كبيرة من البطاطس المقلية والدونات والدجاج المقرمش وغيرها من اللذائذ المقلية لكل أفراد العائلة. مثالية للوجبات اليومية والمناسبات الخاصة.

قوة 2400 واط: بفضل طاقتها العالية، تصل هذه القلاية الهوائية بسرعة إلى درجة الحرارة المثلى لضمان طهي سريع ومتساوي. مما يحفظ النكهات ويخلق نسيجًا مقرمشًا لذيذًا.

تحكم في درجة الحرارة قابل للتعديل: توفر لك هذه القلاية الهوائية تحكمًا كاملاً في درجة حرارة الطهي، مما يتيح لك تجربة مجموعة متنوعة من الوصفات.</p>
                            <p>وظيفة السلامة: تتميز القلاية الهوائية بميزات أمان متقدمة، وحماية ضد الحرارة الزائدة، ومقبض بارد للمساعدة في التحكم بشكل آمن.

سهولة التنظيف: يسهل تنظيف السلة القابلة للفصل والطلاء المانع للالتصاق التنظيف بعد كل استخدام. بالإضافة إلى ذلك، يضمن الغلاف الفولاذي المقاوم للصدأ مقاومًا للبقع دوامًا ومظهرًا أنيقًا في مطبخك</p>
<div class="evaluations">
    <p>4.9/5 (265 التقييمات)</p>
    <img src="imgs/5stars.png" alt="">
</div>
                        </div>
                    </div>
                    <img src="imgs/prod1_pub2.jpg" alt="">
                </div>
            </div>
            <div class="l_footer">
                <h1>إستفد من الشحن المجاني الأن و أحصل على المنتج الذي ترغب فيه</h1>
                <div class="album">
                    <img src="imgs/album_1.jpg" alt="">
                    <img src="imgs/album_2.jpg" alt="">
                    <img src="imgs/album_3.jpg" alt="">
                </div>
                <img src="imgs/propre.jpg" alt="">
            </div>

            <div class="divtoform">
            <a href="#form" class="toform">اطلب الآن</a>
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