<!doctype html>
<html lang="en">
  <head>
    <title>Danh sách Thực phẩm</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        img{
            width: 150px;
            height: 150px;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 0 auto;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
           
        }
        th {
            background-color: #f2f2f2;
        }
        .btn-outline-info{
            margin-top: 20px;
            margin-bottom: 30px;
        }
        /* css thanh search */
        .search-form {
            max-width: 1000px;
            margin: 30px auto;
        }

        .search-form .input-group {
            display: flex;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .search-form .form-control {
            border: none;
            border-radius: 0;
            flex: 1;
        }

        .search-form .input-group-append .btn {
            border-radius: 0;
        }

        .search-form .form-control:focus {
            box-shadow: none;
            outline: none;
        }

        .search-form .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .search-form .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
  </head>
  <body>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="container text-center">
        <h1>Danh sách Thực phẩm</h1>
        <div class="text-right">
            <a href="{{ route('foods.create') }}"><button type="button" class="btn btn-outline-info">Thêm thực phẩm mới</button></a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Ngày sản xuất</th>
                    <th>Loại thực phẩm</th>
                    <th>Mô tả</th>
                    <th>Ảnh</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listfoods as $index => $listfood)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $listfood->name }}</td>
                        <td>{{ number_format($listfood->price, 3) }}</td>
                        <td>{{ $listfood->produced_on }}</td>
                        <td>{{ $listfood->t_foods->Type }}</td>
                        <td>{{ $listfood->description }}</td>
                        <td><img src="{{ asset($listfood->image) }}" alt="{{ $listfood->name }}"></td>
                        <td>    
                            <a class="btn btn-success" href="{{ route('foods.edit', $listfood->id) }}">Sửa</a>
                            <form action="{{ route('foods.destroy', $listfood->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Optinal JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4Yf86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
