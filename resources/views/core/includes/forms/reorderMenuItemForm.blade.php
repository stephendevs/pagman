<form action="">
    <select name="" id="" class="form-control">
      @for ($i = 0; $i < 20; $i++)
        @if ($i == $itemOrder)
          <option value="{{ $i }}" selected>{{ $i }}</option>
        @else
          <option value="0">{{ $i }}</option>
        @endif
      @endfor
    </select>
</form>