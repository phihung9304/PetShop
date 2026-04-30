## 1. 📌 Tên và mô tả

# 🐾 Pet Management System

**Pet Management** là một ứng dụng web được phát triển Laravel (PHP Framework), nhằm hỗ trợ quản lý thông tin thú cưng và chủ nuôi một cách khoa học và hiệu quả.

Hệ thống cho phép người dùng thực hiện các thao tác quản lý cơ bản như thêm, sửa, xóa và tra cứu dữ liệu liên quan đến thú cưng. Mỗi thú cưng được liên kết với một chủ nuôi cụ thể, giúp việc theo dõi và quản lý trở nên dễ dàng hơn.

Ứng dụng được thiết kế với giao diện đơn giản, thân thiện với người dùng, phù hợp cho:
- 📚 Sinh viên thực hiện bài tập lớn hoặc đồ án môn học  
- 🏥 Phòng khám thú y cần quản lý thông tin khách hàng  
- 🐕 Cửa hàng thú cưng theo dõi thú và chủ sở hữu  

Ngoài ra, hệ thống còn có thể được mở rộng thêm nhiều chức năng nâng cao như quản lý lịch tiêm phòng, hồ sơ sức khỏe, hoặc tích hợp API trong tương lai.

### 🎯 Mục tiêu của dự án

- Xây dựng một hệ thống CRUD hoàn chỉnh Laravel  
- Áp dụng mô hình MVC trong phát triển web  
- Thực hành kết nối và thao tác với cơ sở dữ liệu MySQL  
- Tạo nền tảng để phát triển các tính năng nâng cao sau này  

### 💡 Ý nghĩa

Dự án không chỉ phục vụ mục đích học tập mà còn có tiềm năng ứng dụng thực tế trong việc quản lý thú cưng tại các cơ sở nhỏ, giúp tiết kiệm thời gian và nâng cao hiệu quả quản lý.

## 2. ✨ Tính năng chính

Hệ thống Pet Management System cung cấp đầy đủ các chức năng quản lý trong lĩnh vực chăm sóc và kinh doanh thú cưng, bao gồm:

### 👤 Quản lý khách hàng
- Thêm, sửa, xóa thông tin khách hàng  
- Lưu trữ thông tin liên hệ (tên, số điện thoại, địa chỉ, email)  
- Tra cứu danh sách khách hàng  
- Liên kết khách hàng với thú cưng  

---

### 🐾 Quản lý thú cưng
- Thêm, cập nhật và xóa thông tin thú cưng  
- Quản lý các thuộc tính: tên, loại, giống, tuổi, tình trạng  
- Gán thú cưng cho từng khách hàng  
- Xem danh sách và chi tiết từng thú cưng  

---

### 💳 Quản lý thanh toán
- Tạo và quản lý hóa đơn  
- Theo dõi lịch sử thanh toán của khách hàng  
- Hỗ trợ nhiều hình thức thanh toán (tiền mặt, chuyển khoản, v.v.)  
- Tính toán tổng chi phí dịch vụ và sản phẩm  

---

### 👨‍💼 Quản lý nhân viên
- Thêm, sửa, xóa thông tin nhân viên  
- Phân quyền (nếu có)  
- Quản lý thông tin cá nhân và vai trò  

---

### 🛠️ Quản lý dịch vụ
- Tạo và quản lý các dịch vụ (tắm, cắt tỉa, khám bệnh...)  
- Cập nhật giá dịch vụ  
- Liên kết dịch vụ với hóa đơn  

---

### 🛒 Quản lý sản phẩm
- Quản lý danh sách sản phẩm (thức ăn, phụ kiện...)  
- Thêm, sửa, xóa sản phẩm  
- Cập nhật giá và số lượng  

---

### 📦 Quản lý kho
- Theo dõi số lượng tồn kho  
- Cập nhật khi nhập / xuất sản phẩm  
- Cảnh báo khi sản phẩm sắp hết (nếu có)  

---

### 📚 Quản lý cách nuôi (hướng dẫn chăm sóc)
- Lưu trữ thông tin hướng dẫn chăm sóc thú cưng  
- Phân loại theo loại thú (chó, mèo, v.v.)  
- Giúp người dùng tra cứu dễ dàng  

---

### 📊 Quản lý doanh thu
- Thống kê doanh thu theo ngày / tháng / năm  
- Tổng hợp từ dịch vụ và sản phẩm  
- Hỗ trợ theo dõi hiệu quả kinh doanh  

---

### 🔍 Tìm kiếm và hệ thống
- Tìm kiếm nhanh theo tên, loại, khách hàng  
- Hiển thị dữ liệu rõ ràng, dễ sử dụng  
- Giao diện thân thiện với người dùng  

## 3. 📂 Cấu trúc thư mục

Dự án được tổ chức theo kiến trúc MVC của Laravel, với các thư mục chính như sau:

```bash
PET-MANAGEMENTS/
├── app/
│   ├── Http/
│   │   └── Controllers/             
│   │       ├── CareGuideController.php
│   │       ├── CustomerController.php
│   │       ├── DashboardController.php
│   │       ├── EmployeeController.php
│   │       ├── InventoryController.php
│   │       ├── PetController.php
│   │       ├── ProductController.php
│   │       └── ServiceController.php
│
│   ├── Models/                       
│   │       ├── CareGuide.php
│   │       ├── Customer.php
│   │       ├── Employee.php
│   │       ├── Inventory.php
│   │       ├── Payment.php
│   │       ├── Pet.php
│   │       ├── Product.php
│   │       ├── Service.php
│   │       └── User.php
│
├── database/
│   ├── factories/                  
│   ├── migrations/                  
│   │       ├── 0001_01_01_000000_create_users_table.php
│   │       ├── 0001_01_01_000001_create_cache_table.php
│   │       ├── 0001_01_01_000002_create_jobs_table.php
│   │
│   │       ├── 2026_04_09_090628_create_care_guides_table.php
│   │       ├── 2026_04_09_090632_create_products_table.php
│   │       ├── 2026_04_09_090635_create_services_table.php
│   │       ├── 2026_04_09_090638_create_customers_table.php
│   │       ├── 2026_04_09_090641_create_payments_table.php
│   │       ├── 2026_04_09_093252_create_pets_table.php
│   │       ├── 2026_04_14_093740_create_pet_service_table.php
│   │       ├── 2026_04_25_064008_create_employees_table.php
│   │       ├── 2026_04_25_081407_create_inventories_table.php
│   │       └── 2026_04_25_081749_remove_stock_from_products_table.php
│   ├── seeders/                    
│
├── resources/
│   ├── views/                      
│   │   ├── layouts/
│   │   │       └── app.blade.php   
│   │   │
│   │   ├── care-guides/                
│   │   │       ├── index.blade.php     
│   │   │       ├── create.blade.php    
│   │   │       └── edit.blade.php    
│   │   │
│   │   ├── customers/                  
│   │   │       ├── index.blade.php
│   │   │       ├── create.blade.php
│   │   │       └── edit.blade.php
│   │   │
│   │   ├── employees/                 
│   │   │       ├── index.blade.php
│   │   │       ├── create.blade.php
│   │   │       └── edit.blade.php
│   │   │
│   │   ├── pets/                     
│   │   │       ├── index.blade.php
│   │   │       ├── create.blade.php
│   │   │       └── edit.blade.php
│   │   │
│   │   ├── products/                  
│   │   │       ├── index.blade.php
│   │   │       ├── create.blade.php
│   │   │       └── edit.blade.php
│   │   │
│   │   ├── services/              
│   │   │       ├── index.blade.php
│   │   │       ├── create.blade.php
│   │   │       └── edit.blade.php
│   │   │
│   │   ├── dashboard.blade.php     
│   │   └── welcome.blade.php         
│
├── routes/
│   ├── web.php                   
│   └── console.php             
│
├── .env                          
└── artisan                  
```

## 4. 🛠️ Công nghệ và quy chuẩn

### 🔹 Công nghệ sử dụng

Hệ thống được xây dựng Laravel các công nghệ hiện đại trong phát triển web:

- **Backend:** PHP với Laravel Framework  
- **Frontend:** Blade Template, HTML5, CSS3, JavaScript  
- **Database:** MySQL  
- **Server:** Apache
- **Package Manager:** Composer, NPM  

---

### 🔹 Kiến trúc hệ thống

Dự án áp dụng mô hình **MVC (Model - View - Controller)**:

- **Model:** Xử lý dữ liệu và tương tác với database  
- **View:** Hiển thị giao diện người dùng باستخدام Blade  
- **Controller:** Xử lý logic và điều hướng request  

---

### 🔹 Quy chuẩn code

#### 📌 1. Naming Convention
- **Controller:** `PetController`, `CustomerController`  
- **Model:** `Pet`, `Customer`, `Product`  
- **Database table:** dạng số nhiều (`pets`, `customers`, `products`)  
- **Biến:** camelCase (`petName`, `customerList`)  

---

#### 📌 2. Quy chuẩn thư mục
- Mỗi module (pets, customers, products,...) có:
  - 1 Controller riêng  
  - 1 Model riêng  
  - 1 thư mục view riêng  

---

#### 📌 3. Quy chuẩn CRUD
Mỗi module đều tuân theo chuẩn CRUD:

- `index()` → Hiển thị danh sách  
- `create()` → Form thêm mới  
- `store()` → Lưu dữ liệu  
- `edit()` → Form chỉnh sửa  
- `update()` → Cập nhật  
- `destroy()` → Xóa  

---

#### 📌 4. Routing
- Sử dụng route trong `web.php`  
- Áp dụng RESTful Resource Controller:

```php
Route::resource('pets', PetController::class);