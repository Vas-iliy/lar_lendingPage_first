<div style="margin: 0 50px;">
    @if($portfolio)
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <td>№</td>
                    <td>Имя</td>
                    <td>Файл</td>
                    <td>Категория</td>
                    <td>Дата создания</td>
                    <td>удалить</td>
                </tr>
            </thead>
            <tbody>
            @foreach($portfolio as $k => $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td><a href="{{route('portfolios.edit', ['portfolio' => $p->id])}}">{{$p->name}}</a></td>
                    <td>{{$p->images}}</td>
                    <td>{{$p->filter}}</td>
                    <td>{{$p->created_at}}</td>
                    <td>
                        <form action="{{route('portfolios.destroy', ['portfolio' => $p->id])}}" class="form-horizontal" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
