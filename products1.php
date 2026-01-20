<?php

session_start();


$products = [
    [
        'id' => 1,
        'name' => 'ลิปสติกเนื้อแมท',
        'price' => 450,
        'category' => 'lipstick',
        'image' => '💄',
        'description' => 'ลิปสติกเนื้อแมทติดทนนาน สีสวยสดใส'
    ],
    [
        'id' => 2,
        'name' => 'รองพื้นกันน้ำ',
        'price' => 890,
        'category' => 'foundation',
        'image' => '🧴',
        'description' => 'รองพื้นเนื้อบางเบา กันน้ำ กันเหงื่อ'
    ],
    [
        'id' => 3,
        'name' => 'อายแชโดว์พาเลท',
        'price' => 1200,
        'category' => 'eyeshadow',
        'image' => '🎨',
        'description' => 'พาเลทสีอายแชโดว์ 12 สี เนื้อละเอียด'
    ],
    [
        'id' => 4,
        'name' => 'มาสคาร่าเส้นยาว',
        'price' => 650,
        'category' => 'mascara',
        'image' => '✨',
        'description' => 'มาสคาร่าช่วยยืดเส้นขนตา ไม่เลอะ'
    ],
    [
        'id' => 5,
        'name' => 'บลัชออนเนื้อครีม',
        'price' => 550,
        'category' => 'blush',
        'image' => '🌸',
        'description' => 'บลัชออนเนื้อครีม ผสานได้ง่าย'
    ],
    [
        'id' => 6,
        'name' => 'ไฮไลท์เตอร์',
        'price' => 750,
        'category' => 'highlighter',
        'image' => '✨',
        'description' => 'ไฮไลท์เนื้อละเอียด ให้ประกายสวย'
    ]
];
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สินค้าทั้งหมด - BeautyShop</title>
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    
    <link rel="stylesheet" href="styles.css">
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

    
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">สินค้าทั้งหมด</h2>
            <div class="row" id="all-products">
                
                <?php foreach ($products as $product): ?>
                <div class="col-md-4">
                    <div class="card product-card">
                        <a href="product-detail.php?id=<?php echo $product['id']; ?>" class="text-decoration-none">
                            <div class="product-image">
                                <?php echo $product['image']; ?>
                            </div>
                        </a>
                        <div class="card-body">
                            <a href="product-detail.php?id=<?php echo $product['id']; ?>" class="text-decoration-none">
                                <h5 class="product-title"><?php echo $product['name']; ?></h5>
                            </a>
                            <p class="text-muted small"><?php echo $product['description']; ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price">฿<?php echo number_format($product['price']); ?></span>
                                <div class="btn-group" role="group">
                                    <a href="product-detail.php?id=<?php echo $product['id']; ?>" class="btn btn-outline-primary btn-sm">
                                        ดูรายละเอียด
                                    </a>
                                    <button class="btn btn-primary btn-sm" onclick="addToCart(<?php echo $product['id']; ?>)">
                                        <i class="bi bi-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
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
</body>
</html>