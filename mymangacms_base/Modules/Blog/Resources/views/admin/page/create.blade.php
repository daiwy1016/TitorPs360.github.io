@extends('base::layouts.default')

@section('head')
<script src="{{asset('js/vendor/ckeditor/ckeditor.js')}}"></script>
@stop

@section('breadcrumbs')
{!!Breadcrumbs::render()!!}
@endsection

@section('content')
{{ Form::open(array('route' => 'admin.pages.store', 'class' => 'js-validate-form')) }}
<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ Lang::get('blog::messages.admin.pages.create') }}</h3>
                <div class="box-tools">
                    {{ link_to_route('admin.pages.index', Lang::get('messages.admin.manga.back'), [], array('class' => 'btn btn-default btn-xs', 'role' => 'button')) }}
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('title', Lang::get('blog::messages.admin.posts.title')) }}
                    {{ Form::text('title', '', array('class' => 'form-control rtl', 'placeholder' => 'Enter title here', 'required'=>'required')) }}
                    {!! $errors->first('title', '<label class="error" for="title">:message</label>') !!}
                </div>
                <div class="form-group">
                    {{Form::textarea('content', '', array('id'=>'content', 'class' => 'form-control'))}}
                    <script>
                        CKEDITOR.replace('content', {
                            filebrowserImageBrowseUrl: "{{route('admin.posts.browseImage')}}",
                        });
                    </script>
                </div>
            </div>
            <div class="box-footer">
                {{ Form::submit(Lang::get('blog::messages.admin.posts.save'), array('class' => 'btn btn-primary pull-right')) }}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ Lang::get('messages.admin.settings.status') }}</h3>
            </div>
            <div class="box-body">
                {{ Form::select('status', [
                '1' => 'Activated',
                '0' => 'Disabled',
                ], old('status'), ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">SEO</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    {{Form::label('keywords', 'Keywords')}}
                    {{Form::text('keywords', '', array('placeholder' => 'comma separated', 'class' => 'form-control'))}}
                </div>
                <div class="form-group">
                    {{Form::label('description', 'Description')}}
                    {{Form::textarea('description', '', array('class' => 'form-control'))}}
                </div>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
@endsection
