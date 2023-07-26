# Dự án CAKE
<-- FONT END -->
## Dành cho người dùng 
- Hiển thị danh sách loại bánh 
- Hiển thị thông tin chi tiết bánh 
- Đăng kí/ đăng nhập
- Trang tài khoản: thông tin cá nhân, đơn hàng của mình,...
<!-- - Thay đổi thông cá nhân -->
- Mua hàng
- Giỏ hàng
<-- BACK END -->

1. hagtags => từ khóa liên quan
- id => int
- name_hagtag => text
ex : #90th, #batluakhac, # 12congiap

2. categories => danh mục sản phẩm
- id ( mã số ) => int
- image => text
- name => text

3. products => sản phẩm
- id => int
- image => text
- name => text 
- description => text
- category_id => text
- quantity => bigInteger
- price => float
- discount => float 
- selled => int 
- status => tinyint
- created_at => timestamp -> rename : Ngay san xuat 
- updated_at => timestamp -> rename : Ngay het han
- deleted_at => timestamp

4. customers => khách hàng
- id => bigint unsigned
- name => varchar(255)
- image  => varchar(255)
- day_of_birth  => date
- address => varchar(255)
- email => varchar(255)
- password => varchar(255)
- phone => varchar(255)
- created_at => timestamp
- updated_at => timestamp

5. orders => hóa đơn
- id => bigint unsigned
- customer_id => bigint unsigned
- total => bigint 
- note => text 
- created_at => timestamp -> rename : Ngay tao don
- date_ship => date
- updated_id => timestamp

6. ordersdetail => chi tiết đơn hàng 
- id => bigint unsigned
- order_id => bigint unsigned
- product_id => bigint unsigned
- quantity => int -> dat bao nhieu?
- total => bigint -> tong tien tung san pham?
- created_at => timestamp
- updated_at => timestamp

7. users => nhân viên
- id => bigint unsigned
- name => varchar(255)
- address => varchar(255) -> khoa cung
- phone => varchar(255) -> khoa cung 
- email => varchar(255) -> khoa cung
- gender => tinyInt
- day_of_birth => date
- group_id => bigint unsigned
- password => varchar(255) -> cap lai mat khau -> mail
- created_at => timestamp

8. groups => chức vụ 
- id => bigint unsigned
- name => varchar(255)
- created_at =>timestamp
- updated_at => timestamp

9.roles => quyền hạn 
- id => biging unsigned
- name => varchar(255)
- group_name => varchar(255)
- created_at => timestamp
- updated_at => timestamp

10. group_roles => quyền hạn chức vụ
- id => bigint unsigned
- group_id => bigint unsigned
- role_id => bigint unsigned

