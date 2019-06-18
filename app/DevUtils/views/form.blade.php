

    @foreach($field_form as $field)
        @php
        $attributes = explode(':', $field);
        $title = Arr::first($attributes);

        @endphp
        <div class="form-group  row">
            <label class="col-sm-2 col-form-label">{{ ucfirst($title) }}</label>

            <div class="col-sm-10"><input type="text" class="form-control"></div>
        </div>

        <div class="hr-line-dashed"></div>
    @endforeach