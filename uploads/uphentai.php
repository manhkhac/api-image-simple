<!DOCTYPE html>
<html>
  <head>
    <title>API - Nguyễn Quốc Vinh</title>
	<link href="https://i.imgur.com/J5hXwiA.png" rel="icon" type="image/x-icon" /><meta content='Web API By JustGon' property='og:description'/><meta content='https://i.imgur.com/J5hXwiA.png' property='og:image'/>
  <style>
     body {
      margin: 0;
      padding: 0;
      width: 100vw;
      height: 50vw;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }
  </style>
  </head>
<?php
echo "UP hentai\n";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //Bước 1: Tạo thư mục lưu file
    $error = array();
    $target_dir = "hentai/";
    $target_file = $target_dir . basename($_FILES['fileUpload']['name']);
    // Kiểm tra kiểu file hợp lệ
    $type_file = pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION);
    $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
    if (!in_array(strtolower($type_file), $type_fileAllow)) {
        $error['fileUpload'] = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
    }
    //Kiểm tra kích thước file
    $size_file = $_FILES['fileUpload']['size'];
    if ($size_file > 5242880) {
        $error['fileUpload'] = "File bạn chọn không được quá 5MB";
    }
// Kiểm tra file đã tồn tại trê hệ thống
    if (file_exists($target_file)) {
        $error['fileUpload'] = "File bạn chọn đã tồn tại trên hệ thống";
    }
//
    if (empty($error)) {
        if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
            echo "Bạn đã upload file thành công";
            $flag = true;
        } else {
            echo "File bạn vừa upload gặp sự cố";
        }
    }
}
?>
<div id="content">
    <form id="form_upload" method="POST" enctype="multipart/form-data">
        <input type="file" name="fileUpload"  id="fileUpload" >
        <input type="submit" name="submit" ><br/>
    </form>
    <?php
    if (isset($flag) && $flag == true) {
        ?>
        <img src="<?php echo $target_file; ?>">
        <?php
    }
    ?>
</div>
</html>