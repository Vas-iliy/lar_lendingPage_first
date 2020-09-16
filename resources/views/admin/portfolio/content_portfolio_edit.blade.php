<div class="wrapper container-fluid">
    <form action="{{route('portfolios.update', ['portfolio' => $portfolio->id])}}" class="form-horizontal" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group">
            <input type="hidden" name="id" value="{{$portfolio->id}}">
            <label for="name" class="col-xs-2 control-label">Название</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" name="name" value="{{$portfolio->name}}" placeholder="Введите название">
            </div>
        </div>
        <div class="form-group">
            <label for="alias" class="col-xs-2 control-label">Категория</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" name="filter" value="{{$portfolio->filter}}" placeholder="Введите Категорию">
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-xs-2 control-label">Изображение</label>
            <div class="col-xs-offset-2 col-xs-10">
                <img src="{{asset('assets/img/'.$portfolio->images)}}" class="img-circle" alt="">
                <input type="hidden" name="old_images" value="{{$portfolio->images}}">
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
