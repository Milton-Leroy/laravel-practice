<div class="flex w-full h-full">
    @foreach ($categories as $category)
        <div class="flex flex-column items-center w-80 h-80 shadow">
            <h4>{{ $category->title }}</h4>
            <p>{{ $category->description }}</p>
            <p>{{ $category->category->name }}</p>
        </div>
    @endforeach

</div>
