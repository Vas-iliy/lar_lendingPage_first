<div style="margin: 0 50px;">
    <form action="{{route('services.update', ['service' => $services->id])}}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="">Название</label>
            <div>
                <input type="text" class="form-control" name="name" value="{{$services->name}}">
            </div>
        </div>
        <div class="form-group">
            <label for="">Текст</label>
            <div>
                <textarea name="text" class="form-control" cols="30" rows="10">{{$services->text}}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="">Иконка</label>
            <div>
                <input type="text" class="form-control" name="icon" value="{{$services->icon}}">
            </div>
        </div>
        <div class="form-group">
            <div>
                <button class="btn btn-primary" type="submit">Сохранить</button>
            </div>
        </div>
    </form>
    <script>
        CKEDITOR.replace('editor')
    </script>
</div>
