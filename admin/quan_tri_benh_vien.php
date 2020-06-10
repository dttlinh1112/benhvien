<!DOCTYPE html>
<html>
<head>
	<title>Quản trị bệnh viện</title>
</head>
<body>
	<h1 style="text-align: center; font-weight: bold; color: red; padding-bottom: 30px;">QUẢN TRỊ BỆNH VIỆN</h1>
	<p style="text-align: right; font-weight: bold;"><a href="quan_tri_benh_vien_them.php">Thêm mới</a></p>
	<table>
		<tr>
			<td style="font-weight: bold; text-align: center;">STT</td>
			<td style="font-weight: bold; text-align: center;">Ảnh minh họa</td>
			<td style="font-weight: bold; text-align: center;">Tên bác sĩ</td>
			<td style="font-weight: bold; text-align: center;">Khoa</td>
			<td style="font-weight: bold; text-align: center;">SĐT</td>
			<td style="font-weight: bold; text-align: center;">Ghi chú</td>
			<td style="font-weight: bold; text-align: center;" colspan="2">Hiệu chỉnh</td>
		</tr>
		<?php 
			// 1. Chuỗi kết nối đến CSDL
			$ket_noi = mysqli_connect("localhost", "root", "", "benh_vien_db");

			// 2. Viết câu lệnh SQL để lấy ra dữ liệu mong muốn
			$sql = "
				SELECT *
				FROM tbl_bac_si
				ORDER BY id_bac_si DESC
			";

			// 3. Thực hiện truy vấn để lấy ra các dữ liệu mong muốn
			$noi_dung_bac_si = mysqli_query($ket_noi, $sql);

			// 4. Hiển thị dữ liệu mong muốn
			$i=0;
			while ($row = mysqli_fetch_array($noi_dung_bac_si)) {
				$i++;
		;?>
		<tr>
			<td><?php echo $i;?></td>
			<td>
				<img src="../img/<?php 
						if ($row["anh"]<>"") {
							echo $row["anh"];
						} else {
							echo "no_image.png";
						}
					;?>" width="180px" height="auto">
			</td>
			<td>
				<a href="../bac_si_chi_tiet.php?id=<?php echo $row["id_bac_si"];?>"s><?php echo $row["ten_bac_si"];?></a>
			</td>
			<td>
				<a href="../bac_si_chi_tiet.php?id=<?php echo $row["id_bac_si"];?>"s><?php echo $row["khoa"];?></a>
			</td>
			<td>
				<a href="../bac_si_chi_tiet.php?id=<?php echo $row["id_bac_si"];?>"s><?php echo $row["sdt"];?></a>
			</td>
			<td>
				<a href="../bac_si_chi_tiet.php?id=<?php echo $row["id_bac_si"];?>"s><?php echo $row["ghi_chu"];?></a>
			</td>
			<td>
				<a href="quan_tri_benh_vien_sua.php?id=<?php echo $row["id_bac_si"];?>">Sửa</a>
			</td>
			<td>
				<a href="quan_tri_benh_vien_xoa.php?id=<?php echo $row["id_bac_si"];?>">Xóa</a>
			</td>
		</tr>
		<?php
			}
		;?>
	</table>
</body>
</html>