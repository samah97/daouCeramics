@extends('layout.web')

@section('content')
    <div class="category-collections">

        <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                Newest Collections  <span class="caret"></span>
            </button>
            <div class="dropdown-menu">
                <ul class="nav">
                    @foreach($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('products',['category'=>$category->encrypted_id])}}">
                                {{$category->title}}
                            </a>
                        </li>
                    @endforeach


{{--                    <li class="nav-item">
                        <a class="nav-link" href="#">Pans</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pitchers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pots</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Plates</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Vases</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Other</a>
                    </li>--}}
                </ul>
            </div>
        </div>
    </div>

    <div class="productlist-container" id="product-list">
        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-4 col-sm-6 spacing">
                <div class="single-product-item">
                    <figure>
                        <a href="{{route('show-product',['id'=>$product->product_id])}}">  <img onerror="onImageError(this);" src="{{asset('storage/'.$product->thumbnail)}}"></a>
                    </figure>
                    <div class="product-text">
                        <h4>{{$product->title}}</h4>
                        <div class="product-price">{{$product->price}}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')

@endsection
