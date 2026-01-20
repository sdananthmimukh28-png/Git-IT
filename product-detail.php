<?php

session_start();

$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;


$products = [
    1 => [
        'id' => 1,
        'name' => 'ลิปสติกเนื้อแมท สี Rose Pink',
        'price' => 450,
        'category' => 'ลิปสติก',
        'image' => '💄',
        'description' => 'ลิปสติกเนื้อแมทติดทนนาน สีชมพูกุหลาบ เนื้อละเอียด ไม่แห้งตึง',
        'full_description' => 'ลิปสติกเนื้อแมทสุดพรีเมียม ที่ให้สีสวยสดใส ติดทนนานตลอดวัน ด้วยเทคโนโลยีใหม่ล่าสุด ช่วยให้ริมฝีปากนุ่มชุ่มชื้น ไม่แห้งตึงแม้ทาทั้งวัน เนื้อสัมผัสเบาบาง เกลี่ยง่าย ให้ผลลัพธ์ที่สมบูรณ์แบบ',
        'stock' => 50,
        'rating' => 4.8,
        'reviews' => 156,
        'features' => [
            'เนื้อแมทติดทน 8-12 ชั่วโมง',
            'สูตรบำรุงริมฝีปาก',
            'ไม่ทำให้ริมฝีปากแห้งหรือลอก',
            'กันน้ำ กันเหงื่อ',
            'ผลิตจากส่วนผสมธรรมชาติ'
        ]
    ],
    2 => [
        'id' => 2,
        'name' => 'รองพื้นกันน้ำ SPF50+',
        'price' => 890,
        'category' => 'รองพื้น',
        'image' => '🧴',
        'description' => 'รองพื้นเนื้อบางเบา กันน้ำ กันเหงื่อ กันแดด SPF50+ PA+++',
        'full_description' => 'รองพื้นสูตรพิเศษ ด้วยเทคโนโลยี Long-lasting Formula ให้ผิวเรียบเนียน กระจ่างใส ไม่เป็นคราบ ไม่อุดตัน พร้อมปกป้องผิวจากแสงแดดด้วย SPF50+ PA+++ เหมาะสำหรับทุกสภาพผิว',
        'stock' => 30,
        'rating' => 4.9,
        'reviews' => 203,
        'features' => [
            'กันแดด SPF50+ PA+++',
            'กันน้ำและกันเหงื่อ',
            'เนื้อบางเบา ไม่อุดตัน',
            'ปกปิดดีเยี่ยม',
            'ให้ผิวเนียนเรียบตลอดวัน'
        ]
    ],
    3 => [
        'id' => 3,
        'name' => 'อายแชโดว์พาเลท 12 สี Nude Collection',
        'price' => 1200,
        'category' => 'อายแชโดว์',
        'image' => '🎨',
        'description' => 'พาเลทสีอายแชโดว์ 12 สี โทนนู้ด เนื้อละเอียด เกลี่ยง่าย',
        'full_description' => 'พาเลทอายแชโดว์สุดพิเศษ 12 เฉดสี โทนนู้ดที่ใช้งานได้หลากหลาย ตั้งแต่ลุคธรรมชาติไปจนถึงลุคสุดเซ็กซี่ เนื้อสัมผัสนุ่มละเอียด เกลี่ยง่าย ติดทนนาน ไม่หลุดร่วง',
        'stock' => 20,
        'rating' => 5.0,
        'reviews' => 89,
        'features' => [
            '12 เฉดสีในพาเลทเดียว',
            'เนื้อ Matte และ Shimmer',
            'Highly Pigmented',
            'Blendable ง่าย',
            'กันน้ำ ไม่หลุดร่วง'
        ]
    ],
    4 => [
        'id' => 4,
        'name' => 'มาสคาร่าเส้นยาว Waterproof',
        'price' => 650,
        'category' => 'มาสคาร่า',
        'image' => '✨',
        'description' => 'มาสคาร่าช่วยยืดเส้นขนตา กันน้ำ กันเหงื่อ ไม่เลอะ',
        'full_description' => 'มาสคาร่าสูตรกันน้ำ ช่วยยืดขนตาให้ยาวสวยงาม ดูเป็นธรรมชาติ ไม่จับเป็นก้อน ไม่เลอะง่าย พร้อมหัวแปรงที่ออกแบบมาเป็นพิเศษ เข้าถึงทุกมุมขนตา',
        'stock' => 40,
        'rating' => 4.7,
        'reviews' => 124,
        'features' => [
            'สูตรกันน้ำ Waterproof',
            'ยืดขนตาให้ยาวสวย',
            'ไม่จับเป็นก้อน',
            'หัวแปรงพิเศษ',
            'ติดทนนานตลอดวัน'
        ]
    ],
    5 => [
        'id' => 5,
        'name' => 'บลัชออนเนื้อครีม สี Peach',
        'price' => 550,
        'category' => 'บลัชออน',
        'image' => '🌸',
        'description' => 'บลัชออนเนื้อครีม สีพีช ผสานได้ง่าย เนื้อสัมผัสนุ่มลื่น',
        'full_description' => 'บลัชออนเนื้อครีมเนียนนุ่ม เกลี่ยง่าย ให้สีสวยสดใสตามธรรมชาติ เหมาะกับทุกสีผิว ติดทนนาน ไม่เป็นคราบ ให้แก้มฉ่ำวาว สดใสตลอดวัน',
        'stock' => 35,
        'rating' => 4.6,
        'reviews' => 98,
        'features' => [
            'เนื้อครีมนุ่มลื่น',
            'เกลี่ยง่าย ไม่เป็นคราบ',
            'สีสวยสดใสธรรมชาติ',
            'ให้ผิวฉ่ำวาว',
            'ติดทนนานตลอดวัน'
        ]
    ],
    6 => [
        'id' => 6,
        'name' => 'ไฮไลท์เตอร์ Champagne Glow',
        'price' => 750,
        'category' => 'ไฮไลท์',
        'image' => '✨',
        'description' => 'ไฮไลท์เนื้อละเอียด ให้ประกายสวยแบบ Champagne Glow',
        'full_description' => 'ไฮไลท์เตอร์เนื้อนุ่มละเอียด ให้ประกายสวยงามแบบ Champagne ช่วยเพิ่มมิติให้ใบหน้า สร้างลุคสาวออฟฟิศหรือลุคปาร์ตี้สุดปัง เกลี่ยง่าย ไม่เป็นคราบ',
        'stock' => 25,
        'rating' => 4.9,
        'reviews' => 142,
        'features' => [
            'ประกายสวยแบบ Champagne',
            'เนื้อนุ่มละเอียด',
            'เพิ่มมิติให้ใบหน้า',
            'ใช้ได้ทั้งหน้าและตัว',
            'ติดทนนาน'
        ]
    ]
];


if (!isset($products[$product_id])) {
    header('Location: products.php');
    exit;
}

$product = $products[$product_id];
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?> - BeautyShop</title>
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    
    <link rel="stylesheet" href="styles.css">
    
    <style>
        .product-detail-image {
            width: 100%;
            height: 450px;
            background: linear-gradient(135deg, #ffeef8 0%, #f3e7ff 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .rating-stars {
            color: #ffc107;
            font-size: 1.2rem;
        }
        
        .quantity-control {
            display: inline-flex;
            align-items: center;
            gap: 1rem;
        }
        
        .quantity-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .quantity-display {
            font-size: 1.5rem;
            font-weight: bold;
            min-width: 50px;
            text-align: center;
        }
        
        .feature-list {
            list-style: none;
            padding: 0;
        }
        
        .feature-list li {
            padding: 0.5rem 0;
            border-bottom: 1px solid #eee;
        }
        
        .feature-list li:last-child {
            border-bottom: none;
        }
        
        .feature-list i {
            color: var(--primary-color);
            margin-right: 0.5rem;
        }
        
        .stock-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: #e8f5e9;
            color: #2e7d32;
            border-radius: 20px;
            font-weight: 500;
        }
        
        .related-product-card {
            transition: transform 0.3s ease;
            cursor: pointer;
        }
        
        .related-product-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="index.html">
                <span class="logo">BeautyShop</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">หน้าแรก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="products.php">สินค้า</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">ตรวจสอบรายการ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="cart.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            <span class="cart-count badge bg-danger">0</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    
    <div class="container mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="products.php">สินค้า</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $product['name']; ?></li>
            </ol>
        </nav>
    </div>

    
    <section class="py-5">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-5 mb-4">
                    <div class="product-detail-image">
                        <?php echo $product['image']; ?>
                    </div>
                </div>

               
                <div class="col-lg-7">
                    <div class="mb-2">
                        <span class="badge bg-primary"><?php echo $product['category']; ?></span>
                    </div>
                    
                    <h1 class="mb-3"><?php echo $product['name']; ?></h1>
                    
                    
                    <div class="mb-3">
                        <span class="rating-stars">
                            <?php 
                            $rating = $product['rating'];
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= floor($rating)) {
                                    echo '<i class="bi bi-star-fill"></i>';
                                } elseif ($i - $rating < 1) {
                                    echo '<i class="bi bi-star-half"></i>';
                                } else {
                                    echo '<i class="bi bi-star"></i>';
                                }
                            }
                            ?>
                        </span>
                        <span class="text-muted ms-2"><?php echo $product['rating']; ?> (<?php echo $product['reviews']; ?> รีวิว)</span>
                    </div>

                    
                    <div class="mb-4">
                        <h2 class="text-primary mb-0">฿<?php echo number_format($product['price']); ?></h2>
                    </div>

                    
                    <div class="mb-4">
                        <h5>รายละเอียดสินค้า</h5>
                        <p class="text-muted"><?php echo $product['full_description']; ?></p>
                    </div>

                    
                    <div class="mb-4">
                        <span class="stock-badge">
                            <i class="bi bi-check-circle"></i> มีสินค้าในสต็อก (<?php echo $product['stock']; ?> ชิ้น)
                        </span>
                    </div>

                   
                    <div class="mb-4">
                        <label class="form-label fw-bold">จำนวน:</label>
                        <div class="quantity-control mb-3">
                            <button class="btn btn-outline-secondary quantity-btn" onclick="decreaseQuantity()">
                                <i class="bi bi-dash"></i>
                            </button>
                            <span class="quantity-display" id="quantity">1</span>
                            <button class="btn btn-outline-secondary quantity-btn" onclick="increaseQuantity()">
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>
                        <button class="btn btn-primary btn-lg w-100 mb-2" onclick="addToCartWithQuantity()">
                            <i class="bi bi-cart-plus me-2"></i> เพิ่มลงตะกร้า
                        </button>
                        <button class="btn btn-outline-primary btn-lg w-100">
                            <i class="bi bi-heart me-2"></i> เพิ่มในรายการโปรด
                        </button>
                    </div>

                    
                    <div class="mb-4">
                        <h5>คุณสมบัติเด่น</h5>
                        <ul class="feature-list">
                            <?php foreach ($product['features'] as $feature): ?>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                <?php echo $feature; ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            
            <div class="row mt-5">
                <div class="col-12">
                    <h3 class="mb-4">สินค้าที่เกี่ยวข้อง</h3>
                </div>
                
                <?php 
                
                $related_count = 0;
                foreach ($products as $related_product) {
                    if ($related_product['id'] != $product_id && $related_count < 3) {
                        $related_count++;
                ?>
                <div class="col-md-4">
                    <a href="product-detail.php?id=<?php echo $related_product['id']; ?>" class="text-decoration-none">
                        <div class="card related-product-card">
                            <div class="product-image">
                                <?php echo $related_product['image']; ?>
                            </div>
                            <div class="card-body">
                                <h5 class="product-title"><?php echo $related_product['name']; ?></h5>
                                <p class="text-muted small"><?php echo $related_product['description']; ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="product-price">฿<?php echo number_format($related_product['price']); ?></span>
                                    <button class="btn btn-primary btn-sm" onclick="event.preventDefault(); addToCart(<?php echo $related_product['id']; ?>)">
                                        เพิ่มในตะกร้า
                                    </button>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php 
                    }
                }
                ?>
            </div>
        </div>
    </section>

    
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p class="mb-0">&copy; 2026 BeautyShop. All rights reserved.</p>
        </div>
    </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
   
    <script src="script.js"></script>
    
    <script>
        let quantity = 1;
        const maxStock = <?php echo $product['stock']; ?>;
        
        function increaseQuantity() {
            if (quantity < maxStock) {
                quantity++;
                document.getElementById('quantity').textContent = quantity;
            }
        }
        
        function decreaseQuantity() {
            if (quantity > 1) {
                quantity--;
                document.getElementById('quantity').textContent = quantity;
            }
        }
        
        function addToCartWithQuantity() {
            const productData = {
                id: <?php echo $product['id']; ?>,
                name: '<?php echo addslashes($product['name']); ?>',
                price: <?php echo $product['price']; ?>,
                image: '<?php echo $product['image']; ?>',
                description: '<?php echo addslashes($product['description']); ?>'
            };
            
            
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            
            
            const existingItem = cart.find(item => item.id === productData.id);
            
            if (existingItem) {
                existingItem.quantity += quantity;
            } else {
                cart.push({
                    ...productData,
                    quantity: quantity
                });
            }
            
            
            localStorage.setItem('cart', JSON.stringify(cart));
            
            
            updateCartCount();
            
            
            showNotification(`เพิ่ม ${productData.name} จำนวน ${quantity} ชิ้น ลงตะกร้าเรียบร้อย`);
            
           
            quantity = 1;
            document.getElementById('quantity').textContent = quantity;
        }
    </script>
</body>
</html>