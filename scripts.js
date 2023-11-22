$(document).ready(function() {
  $('#productForm').submit(function(e) {
    e.preventDefault();
    var productName = $('#productName').val();
    var productDescription = $('#productDescription').val();
    var productPrice = $('#productPrice').val();

    // Gửi dữ liệu form lên server qua AJAX để lưu vào cơ sở dữ liệu
    $.ajax({
      type: 'POST',
      url: 'save_product.php',
      data: {
        productName: productName,
        productDescription: productDescription,
        productPrice: productPrice
      },
      success: function(response) {
        // Sau khi lưu thành công, hiển thị sản phẩm mới trên trang
        $('#productList').append('<div class="product"><h3>' + productName + '</h3><p>' + productDescription + '</p><p>Giá: ' + productPrice + '</p></div>');
        // Xóa nội dung của form sau khi thêm sản phẩm
        $('#productName').val('');
        $('#productDescription').val('');
        $('#productPrice').val('');
      }
    });
  });
});
