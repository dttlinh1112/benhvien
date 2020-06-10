
<!DOCTYPE html>
<html>
<head>
	<title>Thêm mới bác sĩ</title>
</head>
<body>
	<h1 style="text-align: center; font-weight: bold; color: red; padding-bottom: 20px;">THÊM MỚI BÁC SĨ</h1>

	<form action="./quan_tri_benh_vien_them_thuc_hien.php" method="POST" enctype="multipart/form-data">
		<p>
			Tên bác sĩ<br>
			<input type="text" name="txtTenBacSi" style="width: 100%;">
		</p>
		<p>
			Ảnh minh họa <br>
			<input type="file" name="txtAnh" style="width: 100%;">
		</p>
		<p>
			Khoa <br>
			<input type="text" name="txtKhoa" style="width: 100%;">
		</p>
		    SĐT <br>
			<input type="text" name="txtSĐT" style="width: 100%;">
		</p>
		</p>
		    Ghi chú <br>
			<input type="text" name="txtGhiChu" style="width: 100%;">
		</p>
		<button type="submit">Thêm mới</button>
	</form>
</body>
</html>