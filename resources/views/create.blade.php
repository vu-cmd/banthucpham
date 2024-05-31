<!doctype html>
<html lang="en">
  <head>
    <title>Thêm Mới Thực Phẩm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h1 style="color:red">Thêm Mới Thực Phẩm</h1>
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <form action="{{ route('foods.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="name">Tên</label>
          <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="form-group">
          <label for="price">Giá</label>
          <input type="text" name="price" class="form-control" value="{{ old('price') }}">
        </div>
        <div class="form-group">
          <label for="produced_on">Ngày sản xuất</label>
          <input type="date" name="produced_on" class="form-control" value="{{ old('produced_on') }}">
        </div>
        <div class="form-group">
          <label for="Tfood_id">Loại thực phẩm</label>
          <select class="form-control" name="Tfood_id">
            @foreach($t_foods as $tfood)
              <option value="{{ $tfood->id }}">{{ $tfood->Type }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="description">Mô tả</label>
          <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
          <label for="image_file">Hình ảnh</label>
          <input type="file" class="form-control-file" name="image_file">
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
      </form>
    </div>
    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
