<!DOCTYPE html>
<html>
<head>
	<title>Sửa bác sĩ</title>
</head>
<body>
	<h1 style="text-align: center; font-weight: bold; color: red; padding-bottom: 20px;">SỬA BÁC SĨ</h1>
	<?php 
		// 1. Chuỗi kết nối đến CSDL
		$ket_noi = mysqli_connect("localhost", "root", "", "benh_vien_db");

		// 2. Lẫy ra được ID muốn xóa
		$id_bac_si = $_GET["id"];

		// 3. Viết câu lệnh SQL để lấy giáo viên có ID như trên
		$sql = "
			SELECT * FROM `tbl_bac_si` WHERE id_bac_si='".$id_bac_si."'
		";

		// 4. Thực hiện truy vấn để lấy dữ liệu
		$bac_si = mysqli_query($ket_noi, $sql);

		// 5. Hiển thị dữ liệu lên Website
		$row = mysqli_fetch_array($bac_si);
	;?>
	<form action="./quan_tri_benh_vien_sua_thuc_hien.php" method="POST" enctype="multipart/form-data">
		<p>
			Tên bác sĩ <br>
			<input type="text" name="txtTenBacSi" value="<?php echo $row['ten_bac_si'];?>" style="width: 100%;">
		</p>
		<p>
			Ảnh minh họa <br>
			<input type="file" name="txtAnh" style="width: 100%;">
		</p>
		<p>
			<img src="../img/<?php 
					if ($row["anh"]<>"") {
						echo $row["anh"];
					} else {
						echo "no_image.png";
					}
				;?>" width="180px" height="auto">
		</p>
		<p>
			Khoa <br>
			<input type="text" name="txtKhoa" style="width: 100% " value="<?php echo $row['khoa'];?>">
		</p>
		<p>
			SĐT <br>
			<input type="text" name="txtSĐT" value="<?php echo $row['sdt'];?>" style="width: 100%;">
		</p>
		
		<p>
			Ghi chú <br>
			<input type="text" name="txtGhiChu" value="<?php echo $row['ghi_chu'];?>" style="width: 100%;">
		</p>
		
		
		<button type="submit">Cập nhật</button>
		<input type="hidden" name="txtID" value="<?php echo $row['id_bac_si'];?>">
	</form>
</body>
</html>