<div class="wrapper container-fluid">
    <form action="{{route('pagesAdd')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name" class="col-xs-2 control-label">Название</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Введите название страницы">
            </div>
        </div>
        <div class="form-group">
            <label for="alias" class="col-xs-2 control-label">Псевдоним</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" name="alias" value="{{old('alias')}}" placeholder="Введите псевдоним страницы">
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-xs-2 control-label">Текст</label>
            <div class="col-xs-8">
                <textarea name="text" id="editor" class="form-control">{{old('text')}}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-xs-2 control-label">Изображение</label>
            <div class="col-xs-8">
                <input type="file" name="images" class="filestyle" data-placeholder="Файла нет">
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
