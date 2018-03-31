<div style="margin:0px 50px 50px 50px;">
    @if($services)
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th class="text-center">Иконка</th>
                <th>Текст</th>
                <th>Дата создания</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $k => $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{!! Html::link(route('servicesEdit',['service'=>$service->id]), $service->name, ['alt'=>$service->name] ) !!}</td>
                <td> <div class="service_icon text-center"><i class="fa {{ $service->icon }}"></i></div> </td>
                <td>{{ $service->text }}</td>
                <td>{{ $service->created_at }}</td>
                <td>
                {!! Form::open(['url'=>route('servicesEdit',['service'=>$service->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
                    {{ method_field('delete') }}
                    {!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}
                {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    {!!Html::link(route('servicesAdd'),'Новый сервис')  !!}
</div>

