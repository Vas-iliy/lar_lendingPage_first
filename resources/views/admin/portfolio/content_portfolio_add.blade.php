<div class="wrapper container-fluid">
    <form action="{{route('portfolios.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="control-label">Название</label>
            <div>
                <input type="text" name="name" class="form-control" placeholder="Название" required value="{{old('name')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Категория</label>
            <div>
                <input type="text" name="filter" class="form-control" placeholder="Категория" required value="{{old('filter')}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Изображение</label>
            <div>
                <input type="file" name="images" class="filestyle" data-placeholder="Файла нет" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                <button class="btn btn-primary" type="submit">Сохранить</button>
            </div>
        </div>
    </form>
    <script>
        CKEDITOR.replace('editor')
    </script>
</div>
