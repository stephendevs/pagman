<?php
  @if (count($layouts))
    @foreach ($layouts as $layout)
    @php
        $file = pathinfo($layout);
    @endphp
        <div>
            {{ $file['filename'] }}
        </div>
    @endforeach
  @endif