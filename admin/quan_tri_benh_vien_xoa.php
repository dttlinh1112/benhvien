<?php 
	// 1. Chuỗi kết nối đến CSDL
	$ket_noi = mysqli_connect("localhost", "root", "", "benh_vien_db");

	// 2. Lẫy ra được ID muốn xóa
	$id_bac_si= $_GET["id"];
	// secho $id_tin_tuc; exit();

	// 3. Viết câu lệnh SQL để xóa giáo viên có ID như trên
	$sql = "
		DELETE
		FROM tbl_bac_si
		WHERE id_bac_si='".$id_bac_si."'
	";

	// 4. Thực hiện truy vấn để xóa dữ liệu
	mysqli_query($ket_noi, $sql);

	// 5. Thông báo việc xóa giáo viên thành công & quay trở lại trang quản lý giáo viên
		// Thông báo cho người dùng biết bài viết đã được xóa thành công
		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn đã xóa thông tin bác sĩ thành công.');
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