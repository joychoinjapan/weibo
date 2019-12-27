<form action="{{route('statuses.store')}}" method="post">
    @include('shared._errors')
    {{csrf_field()}}
    <textarea class="form-control" placeholder="最近はどうだった？" name="content" id="" rows="3" >
    {{old('content')}}
    </textarea>
    <div class="text-right">
        <button type="submit" class="btn btn-primary mt-3">投稿</button>
    </div>
</form>
