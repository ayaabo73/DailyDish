<form action="{{route('dish.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text"  name="title" placeholder="title"  class="@error('title') is-invalid @enderror">
    @error('title')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br><br>
    <input type="text"  name="body" placeholder="body"  class="@error('body') is-invalid @enderror">
    @error('body')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br><br>
    <input type="file"  name="image" placeholder="image"  class="@error('image') is-invalid @enderror">
    @error('image')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br><br>
    <button type="submit">save</button>
</form>

<table class="table">
    <thead>
        <tr>
            <th>Dishes</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($dishes as $dish)
      <tr>
        <td scope="title">{{ $dish->title}}</td>
        <td scope="body">{{ $dish->body}}</td>
        <td> <img src="{{asset($dish->getFirstMediaUrl('images'))}}" alt="{{ $dish->title }}" width="70" ></td>
        <td>
          <a href="{{ route('dish.edit',"$dish->id") }}" class="btn btn-primary btn-sm">update</a>
          <form action="{{route('dish.destroy',$dish->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">delete</button>
          </form>
        </td>
      </tr>
    @endforeach
    </tbody>
</table>
