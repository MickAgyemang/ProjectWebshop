<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews Pagina </title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Welkom bij onze Reviews Pagina!</h1><a href="{{ route('login') }}" class="btn">Go to Login</a>
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
            <button type="submit">Verzenden</button>
        </form>
        <h2>Recente Reviews</h2>
        <div id="reviews-list">
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
    <footer>
        <p>&copy; 2024 Reviews Pagina</p>
    </footer>
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
    background-color: #333;
    color: white;
    text-align: center;
    padding: 20px 0;
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
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 10px;
}

button:hover {
    background-color: #218838;
}

.review {
    border-bottom: 1px solid #ddd;
    padding: 10px 0;
}

.review:last-child {
    border-bottom: none;
}

.review .name {
    font-weight: bold;
}

.comment-input {
    width: calc(100% - 20px);
    margin-bottom: 10px;
    padding: 5px;
}

.comment-submit {
    display: block;
    padding: 5px 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.comment-submit:hover {
    background-color: #0056b3;
}

.comment {
    margin-top: 10px;
    padding-left: 10px;
    border-left: 2px solid #007bff;
}
</style>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    const reviewForm = document.getElementById('review-form');
    const reviewsList = document.getElementById('reviews-list');

    reviewForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const name = document.getElementById('name').value;
        const reviewText = document.getElementById('review').value;

        const review = document.createElement('div');
        review.classList.add('review');

        const reviewName = document.createElement('div');
        reviewName.classList.add('name');
        reviewName.textContent = name;

        const reviewContent = document.createElement('div');
        reviewContent.classList.add('content');
        reviewContent.textContent = reviewText;

        const likeButton = document.createElement('button');
        likeButton.textContent = 'Like';
        likeButton.dataset.likes = 0; // Initialiseer het aantal likes op 0
        likeButton.addEventListener('click', () => {
            likeButton.dataset.likes++; // Verhoog het aantal likes bij elke klik
            likeButton.textContent = `Like (${likeButton.dataset.likes})`;
        });

        const commentButton = document.createElement('button');
        commentButton.textContent = 'Comment';
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

        review.appendChild(reviewName);
        review.appendChild(reviewContent);
        review.appendChild(likeButton);
        review.appendChild(commentButton);

        // Voeg de review op een willekeurige positie in
        const randomIndex = Math.floor(Math.random() * (reviewsList.children.length + 1));
        reviewsList.insertBefore(review, reviewsList.children[randomIndex]);

        // Clear the form
        reviewForm.reset();
    });
});
</script>
