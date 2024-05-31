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
  <div class="container">
        <h1>Chỉnh sửa Thực phẩm</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('foods.update', $listfood->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Tên</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $listfood->name) }}">
            </div>
            <div class="form-group">
                <label for="price">Giá</label>
                <input type="number" name="price" class="form-control" value="{{ old('price', $listfood->price) }}">
            </div>
            <div class="form-group">
                <label for="produced_on">Ngày sản xuất</label>
                <input type="date" name="produced_on" class="form-control" value="{{ old('produced_on', $listfood->produced_on) }}">
            </div>
            <div class="form-group">
                <label for="Tfood_id">Loại thực phẩm</label>
                <select name="Tfood_id" class="form-control">
                    @foreach($t_foods as $t_food)
                        <option value="{{ $t_food->id }}" {{ $listfood->Tfood_id == $t_food->id ? 'selected' : '' }}>{{ $t_food->Type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $listfood->description) }}</textarea>
            </div>
            <div class="form-group">
                <label for="image_file">Ảnh</label>
                <input type="file" name="image_file" class="form-control-file">
                @if ($listfood->image)
                    <div class="mt-2">
                        <img src="{{ asset($listfood->image) }}" alt="{{ $listfood->name }}" width="150">
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>