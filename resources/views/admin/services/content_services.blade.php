<div style="margin: 0 50px;">
    @if($services)
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <td>№</td>
                    <td>Название</td>
                    <td>Описание</td>
                    <td>Иконка</td>
                    <td>Дата создания</td>
                    <td>Удалить</td>
                </tr>
            </thead>
            <tbody>
            @foreach($services as $k => $service)
                <tr>
                    <td>{{$service->id}}</td>
                    <td><a href="{{route('services.edit', ['service' => $service->id])}}">{{$service->name}}</a></td>
                    <td>{{$service->text}}</td>
                    <td>{{$service->icon}}</td>
                    <td>{{$service->updated_at}}</td>
                    <td>
                        <form action="{{route('services.destroy', ['service' => $service->id])}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
    <a href="{{route('services.create')}}">Добавить сервис</a>
</div>
