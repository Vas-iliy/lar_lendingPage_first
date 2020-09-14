<div style="margin: 0 50px;">
    @if($pages)
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <td>№ п/п</td>
                <td>Имя</td>
                <td>Псевдоним</td>
                <td>Текст</td>
                <td>Дата создания</td>
                <td>Удалить</td>
            </tr>
        </thead>
        <tbody>
        @foreach($pages as $k => $page)
            <tr>
                <td>{{$page->id}}</td>
                <td><a href="{{route('pagesEdit', ['page'=>$page->id])}}" alt="{{$page->name}}">{{$page->name}}</a></td>
                <td>{{$page->alias}}</td>
                <td>{{$page->text}}</td>
                <td>{{$page->created_at}}</td>
                <td>
                    <form action="{{route('pagesEdit', ['page'=>$page->id])}}" class="form-horizontal" method="post">
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif

        <a href="{{route('pagesAdd')}}">Новая страница</a>
</div>
