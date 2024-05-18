<div class="form-group row">
    <label class="col-sm-3 col-form-label">{{$label}}</label>
    <div class="col-sm-9">
        <input type="{{$type}}" class="form-control @error($name) is-invalid @enderror" 
        name="{{$name}}" value="{{$value}}"
        {{ $type == "file" ? "accept='image/*'" : "" }}
        >
    </div>
</div>