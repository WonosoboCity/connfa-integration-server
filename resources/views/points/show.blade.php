@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="pull-left">
                {!! Breadcrumbs::render('breadcrumbs', [['label'=> trans('Points'), 'route' => 'points.index', 'params' => ['conference_alias' => $conference->alias]], ['label'=> trans('Point'), 'route' => 'points.index', 'params' => ['conference_alias' => $conference->alias]]]) !!}
            </div>
            {!! Form::open([route('points.destroy', ['id' => $data->id, 'conference_alias' => $conference->alias]), 'method' => 'POST', 'class' => 'pull-right']) !!}
                {{ method_field('DELETE') }}
                {{ Form::button("<i class='fa fa-trash-o'></i> Delete", ['onclick' => 'deleteItem(this)', 'class' => 'btn btn-danger']) }}
            {!! Form::close() !!}
            <a href="{{ route('points.edit', ['id' => $data->id, 'conference_alias' => $conference->alias]) }}" class="btn btn-info pull-right"><i class="fa fa-pencil"></i> {{ trans('Edit') }}</a>
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ trans('Point') }}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p>
                        <strong>{{ trans('Name') }}:</strong> {{ $data->name }}<br>
                    </p>
                    <p>
                        <strong>{{ trans('Order') }}:</strong> {{ $data->order }}<br>
                    </p>
                    <p>
                        <strong>{{ trans('Details url') }}:</strong> {{ $data->details_url }}<br>
                    </p>
                    <p>
                        <strong>{{ trans('Description') }}:</strong>
                        @if($data->description)
                            <pre><code>{!! $data->description !!}</code></pre>
                        @endif
                    </p>
                    <p>
                        <strong>{{ trans('Image') }}:</strong><br>
                        @if(!empty($data->image))
                            {{ Html::image($data->image, $data->name, ['class' => 'img-thumbnail img-responsive']) }}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
