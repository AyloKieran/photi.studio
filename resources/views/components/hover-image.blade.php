@props(['hoverable' => true, 'navigatable' => true, 'showUser' => true])

@php
    $id = rand(0, 200);
    $width = rand(300, 900);
    $height = rand(300, 900);
    $image = "https://picsum.photos/$width/$height";
    $color = 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.1);';
@endphp

@php
    use App\Models\User;
    $user = User::where('username', '@AyloKieran')->first();
@endphp

<script>
    function navigateToPost(id) { // TO DO: move this to global js
        window.location.href = "{{ route('post') }}/" + id;
    }
</script>

<div {{ $navigatable == 'true' ? 'onclick=navigateToPost(' . $id . ')' : '' }} class="hoverImage"
    style="--background-colour: {{ $color }}">
    <img class="hoverImage__image" src="{{ $image }}" width="{{ $width }}px" height="{{ $height }}px"
        loading="lazy" decoding="async" />
    @if ($hoverable == 'true')
        <div class="hoverImage__image--overlay">
            <div class="hoverImage__image--controls">
                @if ($showUser)
                    <a class="control control__actionable" href="{{ route('profile', ['user' => $user]) }}">
                        <img src="{{ $user->avatar }}" alt="{{ $user->name }}" loading="lazy" decoding="async">
                    </a>
                @endif
                @auth
                    <div class="control control__actionable control__actionable--active">
                        <i class="icon fa fa-thumbs-up"></i>
                    </div>
                    <div class="control control__actionable">
                        <i class="icon fa fa-thumbs-down"></i>
                    </div>
                @endauth
            </div>
        </div>
    @endif
</div>
