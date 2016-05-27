@extends('layouts.app')

@section('title', 'IdeaSpace')

@section('content')

    {!! Form::open(array('route' => 'themes', 'method' => 'POST', 'autocomplete' => 'false')) !!}

    <?php $i=0; ?>
    @foreach ($themes as $theme)
    <?php if ($i % 3 == 0) { ?>
      <?php if ($i != 0) { ?>
      </div> <!-- end row //-->
      <?php } ?>
    <div class="row">
    <?php } ?>
        <div class="col-md-4 text-center">
            <input type="hidden" name="id-{{ $theme['id'] }}" value="{{ $theme['id'] }}">
            <div class="thumbnail" style="padding-top:20px">
                <img width="470" src="{{ $theme['screenshot'] }}" class="img-responsive" alt="{{ $theme['theme-name'] }}">
                <div class="caption">
                    <h3>{{ $theme['theme-name'] }}</h3>
                    <h5><strong>Version:</strong> {{ $theme['theme-version'] }}</h5>
                    <h5><strong>Author:</strong> {{ $theme['theme-author-name'] }}</h5>
                    <h5><a href="{{ $theme['theme-homepage'] }}" target="_blank">{{ $theme['theme-homepage'] }}</a></h5>
                    <p>{{ $theme['theme-description'] }}</p>
                    @foreach ($theme['theme-compatibility'] as $theme_comp)
                    <span class="label label-success">{{ $theme_comp }}</span>
                    @endforeach
                    <p style="margin-top:20px"><button type="button" class="theme-btn btn btn-primary {{ $theme['status_class'] }}" data-toggle="button" aria-pressed="{{ $theme['status_aria_pressed'] }}" autocomplete="off">{{ $theme['status_text'] }}</button></p>
                </div>
            </div>
        </div>
    <?php $i++; ?>
    @endforeach
    </div> <!-- end row //-->

    {!! Form::close() !!}

@endsection
