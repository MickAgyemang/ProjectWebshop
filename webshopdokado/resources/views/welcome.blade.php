<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews Pagina</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="/img/logodokado.png" alt="Logo" class="logo">
        </div>
        <h1>DOKADO</h1>
        <a href="{{ route('login') }}" class="btn login-btn">Inloggen</a>
    </header>
    <div class="container">
        <h2>Laat een review achter</h2>
        <form id="review-form">
            <div class="form-group">
                <label for="name">Naam:</label>
                <input type="text" id="name" required>
            </div>
            <div class="form-group">
                <label for="review">Review:</label>
                <textarea id="review" required></textarea>
            </div>
            <div class="form-group">
                <label for="rating">Rating:</label>
                <div class="star-rating">
                    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 star">★</label>
                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 stars">★</label>
                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 stars">★</label>
                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 stars">★</label>
                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 stars">★</label>
                </div>
            <button type="submit">Verzenden</button>
        </form>
        <h2>Recente Reviews</h2>
        <div id="reviews-list" class="reviews-list">
            <!-- Dummy Reviews komen hier -->
            <div class="review">
                <div class="name">John Doe</div>
                <div class="content">Dit is een geweldige website!</div>
                <button class="like-button">Like</button>
                <button class="comment-button">Comment</button>
            </div>
            <div class="review">
                <div class="name">Jane Doe</div>
                <div class="content">Ik ben onder de indruk van de service!</div>
                <button class="like-button">Like</button>
                <button class="comment-button">Comment</button>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
}

header, footer {
    background-color: #00274d; /* Darker blue color */
    color: white;
    text-align: center;
    padding: 20px 0;
    position: relative;

}

.logo-container {
    position: absolute;
    left: 20px;
    top: 50%;
    transform: translateY(-50%);
}

.logo {
    height: 40px; /* Adjust the height as needed */
}

header h1 {
    margin: 0;
    padding: 0 60px; /* Add padding to make space for the logo */
}

header .login-btn {
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
    background-color: #001f3f; /* Matching darker blue for the button */
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    text-decoration: none;
}

header .login-btn:hover {
    background-color: #00142e; /* Even darker blue for the hover state */
}

.container {
    width: 80%;
    margin: 0 auto;
    background-color: white;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
    border-radius: 8px;
}

h2 {
    text-align: center;
    color: #333;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input, .form-group textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

button {
    display: block;
    width: 100px;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 10px;
}

button:hover {
    background-color: #0056b3;
}

.reviews-list {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: center;
}

.review {
    border: 1px solid #ddd;
    padding: 10px;
    flex: 1 1 calc(33.333% - 20px); /* Three reviews per row, with space between */
    box-sizing: border-box;
    border-radius: 4px;
    background-color: #f9f9f9;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.comment {
    margin-top: 10px;
    padding-left: 10px;
    border-left: 2px  #00274d;
}

.star-rating {
    display: flex;
    justify-content: space-between;
    width: 250px;
    flex-direction: row-reverse;
    justify-content: flex-end;
}

.star-rating label {
    cursor: pointer;
    text-align: center;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 24px;
    color: #ccc;
    order: 1;
}

.star-rating input[type="radio"] {
    opacity: 0;
    width: 0;
    height: 0;
}

.star-rating input[type="radio"]:checked ~ label {
    color: #FFD700;
}


</style>

<script>
   document.addEventListener('DOMContentLoaded', () => {
    const reviewForm = document.getElementById('review-form');
    const reviewsList = document.getElementById('reviews-list');

    reviewForm.addEventListener('submit', (e) => {
        e.preventDefault();
        e.stopPropagation();

        const name = document.getElementById('name').value;
        const reviewText = document.getElementById('review').value;
        const rating = document.querySelector('input[name="rating"]:checked').value;

        const review = document.createElement('div');
        review.classList.add('review');

        const reviewRating = document.createElement('div');
        reviewRating.classList.add('rating');
        reviewRating.textContent = `Rating: ${rating} stars`;

        const reviewName = document.createElement('div');
        reviewName.classList.add('name');
        reviewName.textContent = name;

        const reviewContent = document.createElement('div');
        reviewContent.classList.add('content');
        reviewContent.textContent = reviewText;

        const likeButton = document.createElement('button');
        likeButton.textContent = 'Like';
        likeButton.classList.add('like-button');
        likeButton.dataset.likes = 0; // Initialiseer het aantal likes op 0
        likeButton.addEventListener('click', () => {
            likeButton.dataset.likes++; // Verhoog het aantal likes bij elke klik
            likeButton.textContent = `Like (${likeButton.dataset.likes})`;
        });

        const commentButton = document.createElement('button');
        commentButton.textContent = 'Comment';
        commentButton.classList.add('comment-button');
        commentButton.addEventListener('click', () => {
            const commentInput = document.createElement('textarea');
            commentInput.placeholder = 'Plaats een opmerking...';
            commentInput.classList.add('comment-input');

            const commentSubmit = document.createElement('button');
            commentSubmit.textContent = 'Plaats';
            commentSubmit.classList.add('comment-submit');
            commentSubmit.addEventListener('click', () => {
                const commentContent = commentInput.value;
                if (commentContent.trim() !== '') {
                    const comment = document.createElement('div');
                    comment.classList.add('comment');
                    comment.textContent = `${name}: ${commentContent}`;

                    review.appendChild(comment);
                    commentInput.value = '';
                }
            });

            review.appendChild(commentInput);
            review.appendChild(commentSubmit);
        });

        review.appendChild(reviewRating);
        review.appendChild(reviewName);
        review.appendChild(reviewContent);
        review.appendChild(likeButton);
        review.appendChild(commentButton);

        reviewsList.appendChild(review);

        // Clear the form
        reviewForm.reset();
    });
});


    </script>
