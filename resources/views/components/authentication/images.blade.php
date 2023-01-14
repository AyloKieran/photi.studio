<div class="authentication__images">
    @foreach (\App\Models\Post::inRandomOrder()->take(75)->get() as $post)
        <x-hover-image :post=$post navigatable="false" hoverable="false" />
    @endforeach
</div>
