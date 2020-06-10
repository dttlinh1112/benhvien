<?php 
				//1. tạo chuỗi kết nối đến csdl
				$ket_noi= mysqli_connect("localhost","root","","benh_vien_db");
				mysqli_set_charset($ket_noi, 'UTF8'); 
				// 2.lấy ra dữ liệu để insert
				$ten_bac_si= $_POST["txtTenBacSi"];
				$khoa= $_POST["txtKhoa"];
				$sdt= $_POST["txtSĐT"];
				$ghi_chu= $_POST["txtGhiChu"];
				//lấy ra thông tin ảnh minh họa
				$anh_minh_hoa = "../img/".basename($_FILES["txtAnh"]["name"]);
				$file_anh_tam = $_FILES["txtAnh"]["tmp_name"];
				$thuc_hien_luu_anh = move_uploaded_file($file_anh_tam, $anh_minh_hoa);
				if (!$thuc_hien_luu_anh) {
					$anh_minh_hoa = NULL;
				}
				// echo $tieu_de; exit();
				//3. Viết câu lệnh SQL để xóa được ID m=như trên lấy ra a dữ liệu mong muốn
				$sql="INSERT INTO `tbl_bac_si`(`id_bac_si` ,`ten_bac_si`,`anh`, `khoa`, `sdt`, `ghi_chu`) VALUES (NULL,'".$ten_bac_si."','".$anh_minh_hoa."','".$khoa."','".$sdt."',NULL)
				";	
				//4 thực hiện truy vấn đẻ lấy ra dữ liệu mong muốn
				mysqli_query($ket_noi, $sql);
				// //5. thông báo việc xóa được thành công và quay trở lại trang quản trị
				echo 
					"<script type='text/javascript'>
					window.alert('Bạn đã thêm mới thông tin bác sĩ thành công.');
					</script>";
		// Chuyển người dùng vào trang quản trị tin tức
				echo 
					"<script type='text/javascript'>
					window.location.href = './quan_tri_benh_vien.php'
					</script>";	
;?>