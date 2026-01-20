<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'checkout':
                $_SESSION['order_success'] = true;
                header('Location: success.php');
                exit;
                break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตะกร้าสินค้า - BeautyShop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   
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
                        <a class="nav-link" href="products.php">สินค้า</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="cart.php">ตรวจสอบรายการ</a>
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
            <h2 class="mb-4">ตะกร้าสินค้า</h2>
           
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-table">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>สินค้า</th>
                                    <th>ราคา</th>
                                    <th>จำนวน</th>
                                    <th>รวม</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="cart-items">
                               
                            </tbody>
                        </table>
                    </div>
                </div>
               
                <div class="col-lg-4">
                    <div class="cart-total">
                        <h4 class="mb-4">สรุปคำสั่งซื้อ</h4>
                        <div class="d-flex justify-content-between mb-3">
                            <span>ยอดรวม:</span>
                            <strong id="cart-total" class="text-primary" style="font-size: 1.5rem;">฿0</strong>
                        </div>
                        <hr>
                        <form method="POST" id="checkout-form">
                            <input type="hidden" name="action" value="checkout">
                            <button type="button" onclick="handleCheckout()" class="btn btn-primary w-100 btn-lg">
                                ดำเนินการสั่งซื้อ
                            </button>
                        </form>
                        <a href="products.php" class="btn btn-outline-secondary w-100 mt-2">
                            ซื้อสินค้าต่อ
                        </a>
                    </div>
                </div>
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
        function handleCheckout() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
           
            if (cart.length === 0) {
                alert('กรุณาเลือกสินค้าก่อนทำการสั่งซื้อ');
                return;
            }
            if (confirm('ยืนยันการสั่งซื้อสินค้า?')) {

                localStorage.removeItem('cart');
                alert('สั่งซื้อสินค้าเรียบร้อยแล้ว! ขอบคุณที่ใช้บริการ');
                window.location.href = 'index.html';
            }
        }
    </script>
</body>
</html>

git config --global user.email "khemjira2551k@gmail.com"
  git config --global user.name "khemjira2551"
