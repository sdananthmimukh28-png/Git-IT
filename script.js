
const products = [
    {
        id: 1,
        name: 'ลิปสติกเนื้อแมท',
        price: 450,
        category: 'lipstick',
        image: '💄',
        description: 'ลิปสติกเนื้อแมทติดทนนาน สีสวยสดใส'
    },
    {
        id: 2,
        name: 'รองพื้นกันน้ำ',
        price: 890,
        category: 'foundation',
        image: '🧴',
        description: 'รองพื้นเนื้อบางเบา กันน้ำ กันเหงื่อ'
    },
    {
        id: 3,
        name: 'อายแชโดว์พาเลท',
        price: 1200,
        category: 'eyeshadow',
        image: '🎨',
        description: 'พาเลทสีอายแชโดว์ 12 สี เนื้อละเอียด'
    },
    {
        id: 4,
        name: 'มาสคาร่าเส้นยาว',
        price: 650,
        category: 'mascara',
        image: '✨',
        description: 'มาสคาร่าช่วยยืดเส้นขนตา ไม่เลอะ'
    },
    {
        id: 5,
        name: 'บลัชออนเนื้อครีม',
        price: 550,
        category: 'blush',
        image: '🌸',
        description: 'บลัชออนเนื้อครีม ผสานได้ง่าย'
    },
    {
        id: 6,
        name: 'ไฮไลท์เตอร์',
        price: 750,
        category: 'highlighter',
        image: '✨',
        description: 'ไฮไลท์เนื้อละเอียด ให้ประกายสวย'
    }
];


let cart = JSON.parse(localStorage.getItem('cart')) || [];


function updateCartCount() {
    const cartCount = document.querySelector('.cart-count');
    if (cartCount) {
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        cartCount.textContent = totalItems;
    }
}


function addToCart(productId) {
    const product = products.find(p => p.id === productId);
    if (!product) return;

    const existingItem = cart.find(item => item.id === productId);
   
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({
            ...product,
            quantity: 1
        });
    }
   
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
    showNotification('เพิ่มสินค้าในตะกร้าเรียบร้อย');
}


function removeFromCart(productId) {
    cart = cart.filter(item => item.id !== productId);
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
   
    
    if (window.location.pathname.includes('cart.php')) {
        loadCart();
    }
}


function updateQuantity(productId, change) {
    const item = cart.find(item => item.id === productId);
    if (item) {
        item.quantity += change;
        if (item.quantity <= 0) {
            removeFromCart(productId);
        } else {
            localStorage.setItem('cart', JSON.stringify(cart));
            loadCart();
        }
    }
}


function showNotification(message) {
    const alertDiv = document.createElement('div');
    alertDiv.className = 'alert alert-success position-fixed top-0 start-50 translate-middle-x mt-3';
    alertDiv.style.zIndex = '9999';
    alertDiv.textContent = message;
   
    document.body.appendChild(alertDiv);
   
    setTimeout(() => {
        alertDiv.remove();
    }, 2000);
}


function loadFeaturedProducts() {
    const container = document.getElementById('featured-products');
    if (!container) return;
   
    const featuredProducts = products.slice(0, 3);
   
    container.innerHTML = featuredProducts.map(product => `
        <div class="col-md-4">
            <div class="card product-card">
                <div class="product-image">
                    ${product.image}
                </div>
                <div class="card-body">
                    <h5 class="product-title">${product.name}</h5>
                    <p class="text-muted small">${product.description}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="product-price">฿${product.price.toLocaleString()}</span>
                        <button class="btn btn-primary btn-sm" onclick="addToCart(${product.id})">
                            เพิ่มในตะกร้า
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `).join('');
}


function loadAllProducts() {
    const container = document.getElementById('all-products');
    if (!container) return;
   
    container.innerHTML = products.map(product => `
        <div class="col-md-4">
            <div class="card product-card">
                <div class="product-image">
                    ${product.image}
                </div>
                <div class="card-body">
                    <h5 class="product-title">${product.name}</h5>
                    <p class="text-muted small">${product.description}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="product-price">฿${product.price.toLocaleString()}</span>
                        <button class="btn btn-primary btn-sm" onclick="addToCart(${product.id})">
                            เพิ่มในตะกร้า
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `).join('');
}


function loadCart() {
    const cartItems = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
   
    if (!cartItems) return;
   
    if (cart.length === 0) {
        cartItems.innerHTML = `
            <tr>
                <td colspan="5" class="text-center py-5">
                    <h5 class="text-muted">ตะกร้าสินค้าว่างเปล่า</h5>
                    <a href="products.php" class="btn btn-primary mt-3">เลือกซื้อสินค้า</a>
                </td>
            </tr>
        `;
        cartTotal.textContent = '฿0';
        return;
    }
   
    cartItems.innerHTML = cart.map(item => `
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <div class="me-3" style="font-size: 2rem;">${item.image}</div>
                    <div>
                        <strong>${item.name}</strong>
                        <br>
                        <small class="text-muted">${item.description}</small>
                    </div>
                </div>
            </td>
            <td class="align-middle">฿${item.price.toLocaleString()}</td>
            <td class="align-middle">
                <div class="btn-group" role="group">
                    <button class="btn btn-sm btn-outline-secondary" onclick="updateQuantity(${item.id}, -1)">-</button>
                    <button class="btn btn-sm btn-outline-secondary" disabled>${item.quantity}</button>
                    <button class="btn btn-sm btn-outline-secondary" onclick="updateQuantity(${item.id}, 1)">+</button>
                </div>
            </td>
            <td class="align-middle">฿${(item.price * item.quantity).toLocaleString()}</td>
            <td class="align-middle">
                <button class="btn btn-sm btn-danger" onclick="removeFromCart(${item.id})">ลบ</button>
            </td>
        </tr>
    `).join('');
   
    const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    cartTotal.textContent = `฿${total.toLocaleString()}`;
}


document.addEventListener('DOMContentLoaded', function() {
    updateCartCount();
    loadFeaturedProducts();
    loadAllProducts();
    loadCart();
});


window.cartFunctions = {
    addToCart,
    removeFromCart,
    updateQuantity,
    getCart: () => cart,
    getProducts: () => products
};