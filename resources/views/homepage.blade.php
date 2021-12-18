@extends('layouts.master')
@section('content')
    <div id="main">

        <!-- Featured Post -->
        <article class="post featured">
            <header class="major">
                <span class="date">April 25, 2017</span>
                <h2><a href="#">And this is a<br />
                        massive headline</a></h2>
                <p>Aenean ornare velit lacus varius enim ullamcorper proin aliquam<br />
                    facilisis ante sed etiam magna interdum congue. Lorem ipsum dolor<br />
                    amet nullam sed etiam veroeros.</p>
            </header>
            <a href="#" class="image main"><img src="images/pic01.jpg" alt="" /></a>
            <ul class="actions special">
                <li><a href="#" class="button large">Full Story</a></li>
            </ul>
        </article>

        <!-- Posts -->
        <section class="posts">
            @foreach($articles as $article)
            <article>
                <header>
                    <span class="date">{{$article->created_at}} |
                    @foreach($article->getCategories as $category)
                        <a href="">{{$category->category_name}}</a>
                        <span>&bullet;</span>
                    @endforeach
                    </span>
                    <h2><a href="#">{{$article->title}}</a></h2>
                </header>
                <a href="#" class="image fit">
                    <img src="{{asset('uploads/'.$article->image)}}" alt="" />
                </a>
                <p>
                    {{$article->desc}}
                </p>
                <ul class="actions special">
                    <li><a href="#" class="button">Full Story</a></li>
                </ul>
            </article>
            @endforeach
        </section>

        <!-- Footer -->
        <footer>
            <div class="pagination">
                {{$articles->links()}}
            </div>
        </footer>

    </div>
@endsection
