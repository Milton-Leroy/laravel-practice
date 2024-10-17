<div class="flex w-full h-full">
   <form action="{{ route('upload-file') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="" style="margin-top: 20px">
            <label for="">Upload</label>
            <input type="file" name="image" id="">
        </div>
        <div style="margin:5px">
            <button type="submit">Submit</button>
        </div>
   </form>

</div>
