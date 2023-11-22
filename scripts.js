$(document).ready(function() {
    // Xử lý khi Form được submit
    $("#toyForm").submit(function(e) {
        e.preventDefault(); // Ngăn chặn việc submit Form một cách thông thường

        // Thu thập dữ liệu từ Form
        var toyData = {
            toyName: $("#toyName").val(),
            description: $("#description").val(),
            price: $("#price").val()
        };

        // Sử dụng AJAX để gửi dữ liệu lên server
        $.ajax({
            type: "POST",
            url: "save_toy.php",
            data: toyData,
            success: function(response) {
                // Xử lý kết quả từ server (nếu cần)
                console.log(response);

                // Hiển thị danh sách đồ chơi mới
                loadToyList();
            }
        });
    });

    // Hàm để tải danh sách đồ chơi từ server và hiển thị lên trang
    function loadToyList() {
        $.ajax({
            type: "GET",
            url: "get_toys.php",
            success: function(response) {
                // Hiển thị danh sách đồ chơi lên trang
                $("#toyList").html(response);
            }
        });
    }

    // Tải danh sách đồ chơi khi trang được tải lần đầu
    loadToyList();
});
