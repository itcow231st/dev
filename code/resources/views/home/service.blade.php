<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Album Dịch Vụ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .service-card img {
            height: 220px;
            width: 100%;
            object-fit: cover;
            border-radius: 10px;
        }
        .gallery img {
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
            transition: .3s;
        }
        .gallery img:hover {
            transform: scale(1.05);
        }
        .album-title {
            font-size: 26px;
            font-weight: 700;
            padding-left: 10px;
            border-left: 5px solid #0d6efd;
        }
    </style>
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="text-center mb-4">Dịch Vụ - Album Sản Phẩm</h1>

    <!-- Grid sản phẩm dịch vụ -->
    <div class="row g-4" id="serviceGrid">
        <!-- Cards sẽ được render tự động bằng JS -->
    </div>
</div>

<script>
    const services = [
        { id: 1, title: "Thi Công Nội Thất", img: "https://picsum.photos/400/260?random=1", type: "noithat" },
        { id: 2, title: "Thiết Kế 3D", img: "https://picsum.photos/400/260?random=2", type: "thietke" },
        { id: 3, title: "Sửa Chữa - Cải Tạo", img: "https://picsum.photos/400/260?random=3", type: "caitao" },
        { id: 4, title: "Trang Trí Nội Thất", img: "https://picsum.photos/400/260?random=4", type: "trangtri" },
        { id: 5, title: "Làm Tủ Gỗ", img: "https://picsum.photos/400/260?random=5", type: "tugo" },
        { id: 6, title: "Lắp Đặt Thiết Bị", img: "https://picsum.photos/400/260?random=6", type: "lapdat" }
    ];

    function renderGrid() {
        let html = "";
        services.forEach(s => {
            html += `
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="p-3 bg-white shadow rounded product-card h-100">
                        <img src="${s.img}" class="w-100 rounded" style="height:230px; object-fit:cover;">
                        <h5 class="mt-3">${s.title}</h5>
                        <button class="btn btn-outline-primary w-100 mt-2" onclick="openAlbum('${s.type}')">Xem chi tiết</button>
                    </div>
                </div>
            `;
        });
        document.getElementById("serviceGrid").innerHTML = html;
    }

    renderGrid();
</script>

</body>
</html>
