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