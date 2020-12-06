<form action="{{route('category.import')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" class="form-control">
    <button type="submit" class="btn btn-primary btn-sm">
        <i class="fa fa-dot-circle-o"></i> Yükle
    </button>
</form>
