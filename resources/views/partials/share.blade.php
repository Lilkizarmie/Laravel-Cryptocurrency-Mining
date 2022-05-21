 @php $slug  = str_slug($post->title); @endphp
<div class="widget w-contacts">
        <ul class="socials socials--white">
            <li  class="social-item"><a class="facebook " href="https://www.facebook.com/sharer.php?u={{url('/')}}/single/{{$post->id}}/{{$slug}}" target="_blank"><i class="fab fa-facebook"></i></a></li>
            <li  class="social-item"><a class="twitter " href="https://twitter.com/intent/tweet?url={{url('/')}}/single/{{$post->id}}/{{$slug}}&text={{$post->title}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li  class="social-item"><a class="google " href="https://plus.google.com/share?url={{url('/')}}/single/{{$post->id}}/{{$slug}}&text={{$post->title}}&hl=english" target="_blank"><i class="fab fa-google-plus"></i></a></li>
            <li  class="social-item"><a class="pinterest " href="https://pinterest.com/pin/create/button/?url={{url('/')}}/single/{{$post->id}}/{{$slug}}" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
        </ul>
</div>