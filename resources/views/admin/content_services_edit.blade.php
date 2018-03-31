<div class="wrapper container-fluid">
    {!! Form::open(['url'=>route('servicesEdit',array('services'=>$data['id'])), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::hidden('id', $data['id']) !!}
        {!! Form::label('name','Имя сервиса',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::text('name',$data['name'],['class'=>'form-control','placeholder'=>'Введите название сервиса']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('','Текущая иконка',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8 iconpicker-container">
            <div class="service_icon text-center"><i class="fa {{ $data['icon'] }}"></i></div>
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('icon','Выбрать иконку',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8 iconpicker-container">
            {!! Form::text('icon', $data['icon'],['class'=>'form-control iconpicker inf-icon iconpicker-element iconpicker-input','placeholder'=>'Иконка для сервиса']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('text', 'Текст:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text', $data['text'], ['id'=>'editor','class' => 'form-control','placeholder'=>'Введите текст страницы']) !!}
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Сохранить', ['class' => 'btn btn-primary','type'=>'submit']) !!}
        </div>
    </div>
    
     {!! Form::close() !!}
</div>
