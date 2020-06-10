<?php 
	// 1. Chuỗi kết nối đến CSDL
	$ket_noi = mysqli_connect("localhost", "root", "", "benh_vien_db");

	// 2. Lẫy dữ liệu để cập nhật 
	$id_bac_si = $_POST["txtID"];
    $ten_bac_si= $_POST["txtTenBacSi"];
	$khoa= $_POST["txtKhoa"];
	$sdt= $_POST["txtSĐT"];
	$ghi_chu= $_POST["txtGhiChu"];
	//lấy ra thông tin ảnh minh họa
	$anh_minh_hoa = "../img/".basename($_FILES["txtAnh"]["name"]);
	$file_anh_tam = $_FILES["txtAnh"]["tmp_name"];
	$thuc_hien_luu_anh = move_uploaded_file($file_anh_tam, $anh_minh_hoa);
	if(!$thuc_hien_luu_anh) {
		$anh_minh_hoa = NULL;
	}

	// 3. Viết câu lệnh SQL để cập nhật giáo viên có ID như trên
	if($anh_minh_hoa == NULL)
	{
		$sql = "
			UPDATE `tbl_bac_si` SET `ten_bac_si`='".$ten_bac_si."',`khoa`='".$khoa."',`sdt`='".$sdt."',`ghi_chu`='".$ghi_chu."' WHERE `id_bac_si` = '".$id_bac_si."' 
		";
	} else {
		$sql = "
			UPDATE `tbl_bac_si` SET `anh`='".$anh_minh_hoa."',`ten_bac_si`='".$ten_bac_si."',`khoa`='".$khoa."',`sdt`='".$sdt."',`ghi_chu`='".$ghi_chu."' WHERE `id_bac_si` = '".$id_bac_si."' 
		";
	}

	// 4. Thực hiện truy vấn để thêm mới dữ liệu
	mysqli_query($ket_noi, $sql);

	// 5. Thông báo việc thêm mới giáo viên thành công & quay trở lại trang quản lý giáo viên
		// Thông báo cho người dùng biết bài viết đã được thêm mới thành công
		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn đã cập nhật thông tin bác sĩ thành công.');
			</script>
		";

		// Chuyển người dùng vào trang quản trị giáo viên
		echo 
		"
			<script type='text/javascript'>
				window.location.href = './quan_tri_benh_vien.php'
			</script>
		";
;?>