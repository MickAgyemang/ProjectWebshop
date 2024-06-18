@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Laat een review achter</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form id="review-form" action="{{ route('reviews.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Naam:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="review">Review:</label>
            <textarea id="review" name="review" required></textarea>
        </div>
        <div class="form-group">
            <label for="rating">Rating:</label>
            <div class="star-rating">
                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 stars">★</label>
                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 stars">★</label>
                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 stars">★</label>
                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 stars">★</label>
                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star">★</label>
            </div>
        </div>
        <button type="submit">Verzenden</button>
    </form>

    <h2>Recente Reviews</h2>
    <div id="reviews-list" class="reviews-list">
        @foreach($reviews as $review)
            <div class="review">
                <div class="rating">{{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}</div>
                <div class="name">{{ $review->name }}</div>
                <div class="content">{{ $review->review }}</div>
            </div>
        @endforeach
    </div>
</div>
@endsection
