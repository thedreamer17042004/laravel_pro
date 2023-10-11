@extends('layouts.website')
<style>
    .bi-heart {
        cursor: pointer;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
@section('content')
<div class="container py-4">
    <div class="row" style="">
        <div class="col-md-6">
            <img width="100%" src="http://localhost:8000/website/images/image_3.jpg" alt="">
        </div>
        <div class="col-md-6">
            <small>Category: loai 1</small>
            <h2>Product 1</h2>
            <p>
                <span style="text-decoration: line-through;">$45.00</span>
                <span>$30.00</span>
            </p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates sunt quam tenetur totam similique, sint rem dignissimos, cumque accusamus ut dolorum debitis doloremque voluptatum natus deserunt quibusdam ullam, sequi quasi.</p>
            <div class="are_add">
                <input type="text" value="1" style="width: 40px;outline: none;">

                <button type="button" class="btn btn-danger"><i class="bi-cart-fill me-1" style="padding-right: 4px;"></i>Add to cart</button>
                <i class="bi bi-heart"></i>

            </div>
        </div>
    </div>
    <h2 style="margin-top: 30px;margin-bottom: 30px;">Relate Product</h2>
    <div class="row">
            <div class="col-md-3">
                <div class="card text-left">
                  <img class="card-img-top" src="http://localhost:8000/website/images/pizza-1.jpg" alt="">
                  <div class="card-body">
                    <h4 class="card-title text-dark">Product 1</h4>
                    <p class="card-text">
                <span style="text-decoration: line-through;">$45.00</span>

                        <span>$100.000</span>
                    </p>
                    
                    <div class="d-flex" style="justify-content: space-between;align-items: center;">
               <button type="button" class="btn btn-danger"><i class="bi-cart-fill me-1" style="padding-right: 4px;"></i>Add to cart</button>
                <i class="bi bi-heart"></i>
               </div>
                  </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-left">
                  <img class="card-img-top" src="http://localhost:8000/website/images/pizza-2.jpg" alt="">
                  <div class="card-body">
                    <h4 class="card-title text-dark">Product 2</h4>
                    <p class="card-text">
                <span style="text-decoration: line-through;">$45.00</span>

                        <span>$50.00</span>
                    </p>
                    <div class="d-flex" style="justify-content: space-between;align-items: center;">
               <button type="button" class="btn btn-danger"><i class="bi-cart-fill me-1" style="padding-right: 4px;"></i>Add to cart</button>
                <i class="bi bi-heart"></i>
               </div>
                  </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-left">
                  <img class="card-img-top" src="http://localhost:8000/website/images/pizza-3.jpg" alt="">
                  <div class="card-body">
                    <h4 class="card-title text-dark">Product 3</h4>
                    <p class="card-text">
                <span style="text-decoration: line-through;">$45.00</span>

                        <span>$99.00</span>
                    </p>
                    <div class="d-flex" style="justify-content: space-between;align-items: center;">
               <button type="button" class="btn btn-danger"><i class="bi-cart-fill me-1" style="padding-right: 4px;"></i>Add to cart</button>
                <i class="bi bi-heart"></i>
               </div>

                  </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-left">
                  <img class="card-img-top" src="http://localhost:8000/website/images/pizza-5.jpg" alt="">
                  <div class="card-body">
                    <h4 class="card-title text-dark">Product 4</h4>
                    <p class="card-text">
                <span style="text-decoration: line-through;">$45.00</span>

                        <span>$89.00</span>
                    </p>
               <div class="d-flex" style="justify-content: space-between;align-items: center;">
               <button type="button" class="btn btn-danger"><i class="bi-cart-fill me-1" style="padding-right: 4px;"></i>Add to cart</button>
                <i class="bi bi-heart"></i>
               </div>
                  </div>
                </div>
            </div>
    </div>
</div>
@stop