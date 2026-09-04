<form action="{{route('dish.update', $dish->id ) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <input type="text"  name="title" placeholder="title"  value="{{$dish->title }}" class="@error('title') is-invalid @enderror">
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror 
    <br><br>
    <input type="text"  name="body" placeholder="body"  value="{{$dish->body }}" class="@error('body') is-invalid @enderror">
    @error('body')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br><br>
    <div class="mb-3">
        @foreach ($dish ->getMedia('images') as $media)
        <img src="{{asset($media->getUrl())}}" alt="{{ $dish->title }}" width="200">
    </div>
    <input type="file"  name="image[]" placeholder="image"  class="@error('image') is-invalid @enderror">
    @error('image[]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @endforeach
    <br><br>
    <button type="submit">update</button>
</form>