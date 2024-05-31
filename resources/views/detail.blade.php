<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100vw;
            overflow: hidden;
        }
        .product-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            box-sizing: border-box;
            overflow: auto;
        }
        .product-image {
            flex: 1;
            text-align: center;
        }
        .product-image img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .product-details {
            flex: 2;
            padding-left: 40px;
        }
        .product-details h1 {
            font-size: 28px;
            margin-bottom: 10px;
            color: #333;
        }
        .product-details .price {
            font-size: 24px;
            color: #27ae60;
            margin-bottom: 10px;
        }
        .product-details .price del {
            color: #999;
            margin-left: 10px;
        }
        .product-details p {
            line-height: 1.6;
            color: #666;
        }
        .product-details .contact {
            margin-top: 20px;
        }
        .product-details .contact span {
            font-weight: bold;
        }
        .product-details .contact a {
            color: #3498db;
            text-decoration: none;
        }
        .product-details .contact a:hover {
            text-decoration: underline;
        }
        .product-details .meta {
            margin-top: 20px;
        }
        .product-details .meta span {
            display: inline-block;
            margin-right: 10px;
            background-color: #e1f5fe;
            color: #039be5;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="product-container">
    @isset($listfood)
        <div class="product-image">
            <img src="{{ asset($listfood->image) }}" alt="Nho Xanh">
        </div>
        <div class="product-details">
            <h1>{{ $listfood->name }}</h1>
            <div class="price">
            {{ number_format($listfood->price, 0, ',', '.') }}đ
            </div>
            <p>{{ $listfood->description }}</p>
            <div class="contact">
                <span>Hotline hỗ trợ 24/7:</span> <a href="#">0123.456.789</a>
            </div>
            <div class="meta">
                <span>Mã: MSP-08</span>
                <span>Danh mục: {{ $listfood->t_foods->Type }}</span>
            </div>
        </div>
        @endisset
    </div>
</body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>