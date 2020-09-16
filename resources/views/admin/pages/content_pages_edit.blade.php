<div class="wrapper container-fluid">
    <form action="{{route('pagesEdit', ['page' => $page->id])}}" class="form-horizontal" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="hidden" name="id" value="{{$page->id}}">
            <label for="name" class="col-xs-2 control-label">Название</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" name="name" value="{{$page->name}}" placeholder="Введите название страницы">
            </div>
        </div>
        <div class="form-group">
            <label for="alias" class="col-xs-2 control-label">Псевдоним</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" name="alias" value="{{$page->alias}}" placeholder="Введите псевдоним страницы">
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-xs-2 control-label">Текст</label>
            <div class="col-xs-8">
                <textarea name="text" id="editor" class="form-control">{{$page->text}}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-xs-2 control-label">Изображение</label>
            <div class="col-xs-offset-2 col-xs-10">
                <img src="{{asset('assets/img/'.$page->images)}}" class="img-circle" alt="">
                <input type="hidden" name="old_images" value="{{$page->images}}">
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
