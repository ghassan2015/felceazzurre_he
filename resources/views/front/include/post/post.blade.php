
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    a{
        text-decoration: none;
    }
</style>
@php($setting=\App\Models\Setting::first())
<ul  data-per="6" class="row" style="    list-style-type: none;">
    @php($posts=\App\Models\Post::get()->take(6))
    <div class="card-container">
        @foreach($posts as $post)
            <div class="col col-lg-4 col-sm-12">

                <div class="card">

                    <a href="{{$post->url}}">
                        <img src="{{asset('assets/images/posts/'.$post->images)}}" alt="Random photo" class="card-img">
                    </a>
                    <div class="card-body">
                        <a href="{{$post->url}}">

                            <p>{{$post->title}}</p>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
<div style="text-align: center;">
    <a class="btn btn-primary" style="text-align: center; background: #06215a ;color: #FFFFFF" href="{{route('profumalatuavita')}}">@lang('lang.Display All Post')</a>
</div>

</ul>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
