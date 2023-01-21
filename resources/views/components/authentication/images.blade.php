<div class="authentication__images">
    @php
        $__ImageDisplayManager = new \App\Managers\Image\Display\ImageDisplayManager();
    @endphp
    @foreach ($__ImageDisplayManager->getAuthenticationImages() as $post)
        <x-hover-image :post=$post navigatable="false" hoverable="false" />
    @endforeach
</div>
