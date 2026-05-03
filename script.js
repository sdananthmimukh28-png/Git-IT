
const products = [
    {
        id: 1,
        name: "Velvet Matte Lipstick",
        price: 890,
        image: "images/lipstick.png",
        description: "ลิปสติกเนื้อแมทกำมะหยี่ มอบสัมผัสนุ่มลื่น สีสดชัดติดทนนานตลอดวัน พร้อมบำรุงริมฝีปากไม่ให้แห้งกร้าน"
    },
    {
        id: 2,
        name: "Luminous Liquid Foundation",
        price: 1290,
        image: "images/foundation.png",
        description: "รองพื้นเนื้อลิควิดบางเบา แต่ปกปิดขั้นสุด ให้ผิวดูฉ่ำโกลว์เป็นธรรมชาติ ควบคุมความมันยาวนาน 24 ชั่วโมง"
    },
    {
        id: 3,
        name: "Revive Face Serum",
        price: 1590,
        image: "images/serum.png",
        description: "เซรั่มบำรุงผิวหน้าเข้มข้น ช่วยฟื้นฟูผิวที่หมองคล้ำให้กลับมากระจ่างใส ลดเลือนริ้วรอย และเติมความชุ่มชื้นอย่างล้ำลึก"
    },
    {
        id: 4,
        name: "Rose Gold Eyeshadow Palette",
        price: 1890,
        image: "images/eyeshadow.png",
        description: "พาเลทอายแชโดว์ 12 เฉดสีในโทนโรสโกลด์และนู้ด มีทั้งเนื้อแมทและชิมเมอร์ เม็ดสีแน่น เกลี่ยง่าย สร้างดวงตาให้ดูมีมิติ"
    },
    {
        id: 5,
        name: "Volumizing Mascara",
        price: 790,
        image: "images/mascara.png",
        description: "มาสคาร่าสูตรกันน้ำ เพิ่มความหนาและยาวให้ขนตาเรียงเส้นสวยตลอดวัน ไม่จับตัวเป็นก้อน"
    },
    {
        id: 6,
        name: "Soft Powder Blush",
        price: 850,
        image: "images/blush.png",
        description: "บลัชออนเนื้อฝุ่นเนียนนุ่ม มอบพวงแก้มสีระเรื่อดูสุขภาพดี เกลี่ยง่ายและติดทนนาน"
    },
    {
        id: 7,
        name: "Full Coverage Concealer",
        price: 690,
        image: "images/foundation.png",
        description: "คอนซีลเลอร์เนื้อครีม ปกปิดรอยคล้ำใต้ตาและจุดด่างดำได้อย่างเนียนสนิท ให้ผิวดูเรียบเนียนเป็นธรรมชาติ"
    },
    {
        id: 8,
        name: "Gentle Foam Cleanser",
        price: 590,
        image: "images/foundation.png",
        description: "โฟมล้างหน้าสูตรอ่อนโยน ทำความสะอาดผิวได้อย่างล้ำลึกโดยไม่ทำให้ผิวแห้งตึง"
    },
    {
        id: 9,
        name: "Hydrating Toner",
        price: 890,
        image: "images/serum.png",
        description: "โทนเนอร์ปรับสภาพผิว ช่วยเติมความชุ่มชื้นและกระชับรูขุมขน เตรียมผิวให้พร้อมสำหรับการบำรุงในขั้นตอนต่อไป"
    },
    {
        id: 10,
        name: "Night Repair Cream",
        price: 1490,
        image: "images/serum.png",
        description: "ครีมบำรุงกลางคืน ฟื้นฟูผิวขณะหลับ ให้ตื่นมาพร้อมกับผิวที่ดูอิ่มน้ำและกระจ่างใส"
    },
    {
        id: 11,
        name: "Setting Spray",
        price: 950,
        image: "images/serum.png",
        description: "สเปรย์ล็อคเมคอัพ ช่วยให้เครื่องสำอางติดทนนานตลอดวัน พร้อมมอบความสดชื่นให้ผิว"
    },
    {
        id: 12,
        name: "Shimmer Lip Gloss",
        price: 550,
        image: "images/lipstick.png",
        description: "ลิปกลอสเนื้อแวววาว มอบความชุ่มชื้นให้ริมฝีปากดูอวบอิ่ม เป็นประกายระยิบระยับ"
    },
    {
        id: 13,
        name: "Precision Eyebrow Pencil",
        price: 450,
        image: "images/mascara.png",
        description: "ดินสอเขียนคิ้วหัวเล็ก เขียนง่าย วาดเส้นขนคิ้วได้สวยคมชัดและเป็นธรรมชาติ"
    },
    {
        id: 14,
        name: "Daily UV Protection Sunscreen",
        price: 1190,
        image: "images/foundation.png",
        description: "ครีมกันแดดเนื้อบางเบา ปกป้องผิวจากรังสี UVA และ UVB อย่างมีประสิทธิภาพ ไม่เหนียวเหนอะหนะ"
    }
];


let cart = JSON.parse(localStorage.getItem('cosmetic_cart')) || [];


function saveCart() {
    localStorage.setItem('cosmetic_cart', JSON.stringify(cart));
    updateCartIcon();
}


function addToCart(productId) {
    const product = products.find(p => p.id === productId);
    if (!product) return;

    const existingItem = cart.find(item => item.id === productId);
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({
            id: product.id,
            name: product.name,
            price: product.price,
            image: product.image,
            quantity: 1
        });
    }

    saveCart();
    alert(`เพิ่ม "${product.name}" ลงในตะกร้าแล้ว`);
}


function updateCartIcon() {
    const cartCount = document.querySelector('.cart-count');
    if (cartCount) {
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        cartCount.textContent = totalItems;
    }
}


function renderProducts(containerId, limit = null) {
    const container = document.getElementById(containerId);
    if (!container) return;

    let displayProducts = products;
    if (limit) {
        displayProducts = products.slice(0, limit);
    }

    container.innerHTML = displayProducts.map(product => `
        <div class="product-card">
            <a href="product.html?id=${product.id}">
                <img src="${product.image}" alt="${product.name}" class="product-image">
            </a>
            <div class="product-info">
                <h3>${product.name}</h3>
                <span class="product-price">฿${product.price.toLocaleString()}</span>
                <button class="btn-add-to-cart" onclick="addToCart(${product.id})">หยิบใส่ตะกร้า</button>
            </div>
        </div>
    `).join('');
}


function renderCartPage() {
    const cartTableBody = document.querySelector('.cart-table tbody');
    const cartTotalDisplay = document.querySelector('.cart-summary .total');

    if (!cartTableBody) return;

    if (cart.length === 0) {
        cartTableBody.innerHTML = '<tr><td colspan="5" style="text-align:center; padding:30px;">ตะกร้าว่างเปล่า</td></tr>';
        if (cartTotalDisplay) cartTotalDisplay.textContent = '฿0';
        return;
    }

    let total = 0;

    cartTableBody.innerHTML = cart.map(item => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;
        return `
            <tr>
                <td>
                    <div class="cart-item-info">
                        <img src="${item.image}" alt="${item.name}" class="cart-item-img">
                        <span>${item.name}</span>
                    </div>
                </td>
                <td>฿${item.price.toLocaleString()}</td>
                <td>
                    <input type="number" value="${item.quantity}" min="1" class="qty-input" onchange="updateQuantity(${item.id}, this.value)">
                </td>
                <td>฿${itemTotal.toLocaleString()}</td>
                <td>
                    <button onclick="removeFromCart(${item.id})" style="color:red; background:none; border:none; cursor:pointer;">&times;</button>
                </td>
            </tr>
        `;
    }).join('');

    if (cartTotalDisplay) {
        cartTotalDisplay.textContent = '฿' + total.toLocaleString();
    }
}


window.updateQuantity = function (id, newQty) {
    const item = cart.find(i => i.id === id);
    if (item) {
        item.quantity = parseInt(newQty);
        if (item.quantity < 1) item.quantity = 1;
        saveCart();
        renderCartPage();
    }
}


window.removeFromCart = function (id) {
    cart = cart.filter(item => item.id !== id);
    saveCart();
    renderCartPage();
}


function setupProductDetail() {
    const params = new URLSearchParams(window.location.search);
    const id = parseInt(params.get('id'));
    const product = products.find(p => p.id === id);

    if (product) {
        document.getElementById('detail-img').src = product.image;
        document.getElementById('detail-name').textContent = product.name;
        document.getElementById('detail-price').textContent = '฿' + product.price.toLocaleString();
        document.getElementById('detail-desc').textContent = product.description;


        const btn = document.getElementById('add-curr-prod');
        btn.onclick = () => addToCart(product.id);
    } else {
        document.querySelector('.container').innerHTML = '<h2>ไม่พบสินค้า</h2>';
    }
}


function setupCheckout() {
    const orderItemsContainer = document.getElementById('order-items');
    const orderTotalDisplay = document.getElementById('order-total');

    if (!orderItemsContainer) return;

    let total = 0;
    orderItemsContainer.innerHTML = cart.map(item => {
        total += item.price * item.quantity;
        return `
            <div style="display:flex; justify-content:space-between; margin-bottom:10px;">
                <span>${item.name} x ${item.quantity}</span>
                <span>฿${(item.price * item.quantity).toLocaleString()}</span>
            </div>
        `;
    }).join('');

    orderTotalDisplay.textContent = '฿' + total.toLocaleString();

    document.getElementById('checkout-form').addEventListener('submit', (e) => {
        e.preventDefault();
        alert('ขอบคุณสำหรับการสั่งซื้อ! คำสั่งซื้อของคุณได้รับการยืนยันเรียบร้อยแล้ว');
        cart = [];
        saveCart();
        window.location.href = 'index.html';
    });
}


document.addEventListener('DOMContentLoaded', () => {
    updateCartIcon();

    const path = window.location.pathname;

    if (path.includes('index.html') || path === '/' || path.endsWith('/')) {
        renderProducts('bestsellers-grid', 4);
    } else if (path.includes('shop.html')) {
        renderProducts('shop-grid');
    } else if (path.includes('cart.html')) {
        renderCartPage();
    } else if (path.includes('product.html')) {
        setupProductDetail();
    } else if (path.includes('checkout.html')) {
        setupCheckout();
    }

    // Contact Form Handler
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            alert('ขอบคุณสำหรับข้อความ! ทางเราจะรีบติดต่อกลับให้เร็วที่สุดครับ');
            contactForm.reset();
        });
    }
});
