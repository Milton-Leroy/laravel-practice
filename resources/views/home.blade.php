<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $app_name }}</title>
</head>
<body>

    <div class="flex w-full h-full">
        <img src="{{ asset('/storage/first_uploaded_image.jpg') }}" alt="img">
        @can('upload')
        <form action="{{ route('user.upload-file', '?auth=1') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="" style="margin-top: 20px">
                <label for="">Upload</label>
                <input type="file" name="image" id="">
            </div>
            <div style="margin:5px">
                <button type="submit">Submit</button>
            </div>
        </form>
        @endcan
    </div>

    <div>
        @foreach ($categories as $ctg)
        <h2>{{ $ctg->title }}</h2>
        <p>{{ $ctg->description }}</p>
        @endforeach
    </div>

</body>
</html>
