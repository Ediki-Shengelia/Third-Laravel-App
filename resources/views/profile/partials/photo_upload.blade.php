<section>
    <form action="{{route('uploadPhoto')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="photo" id="" required>
        <button>Upload</button>
    </form>
</section>