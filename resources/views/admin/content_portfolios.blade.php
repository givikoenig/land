<div style="margin:0px 50px 50px 50px;">
    
    @if($portfolios)    
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Фильтр</th>
                <th>Изображение</th>
                <th>Дата создания</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
            @foreach($portfolios as $k => $portfolio)
            <tr>
                <td>{{ $portfolio->id }}</td>
                <td>{!! Html::link(route('portfoliosEdit',['portfolio'=>$portfolio->id]), $portfolio->name, ['alt'=>$portfolio->name]) !!}</td>
                <td>{{ $portfolio->filter }}</td>
                <td>{!! Html::image('assets/img/'.$portfolio->images,'',array('style'=>'width:150px')) !!}</td>
                <td>{{ $portfolio->created_at }}</td>
                <td>
                    {!! Form::open(['url'=>route('portfoliosEdit',['portfolio'=>$portfolio->id]), 'class'=>'form-horizontal', 'method'=>'POST']) !!}
                        {{ method_field('delete') }}
                        {!! Form::button('Удалить', ['class'=>'btn btn-danger','type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>    
    @endif
    {!! Html::link(route('portfoliosAdd'), 'Новая категория') !!}
</div>

