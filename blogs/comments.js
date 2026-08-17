document.addEventListener("DOMContentLoaded", function () {
    // Comment Submission Handler
    document.getElementById('commentForm')?.addEventListener('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        fetch('../submit_comment.php', { // URL for submitting the comment
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Create alert based on response status
            if (data.status === 'success') {
                showAlert(data.message, 'success');
                
                // Create a new comment element
                var newComment = document.createElement('div');
                newComment.classList.add('comment');
                newComment.innerHTML = `
                    <div class="comment-header">
                        <p class="name">${data.newComment.author}</p>
                        <p class="date">${data.newComment.createdAt}</p>
                    </div>
                    <p class="message">${data.newComment.content}</p>
                `;
                
                // Prepend the new comment to the comments section
                document.getElementById('commentsSection').prepend(newComment);
                document.getElementById('commentForm').reset(); // Reset form after submission

                // Update the comment count dynamically after submission
                updateCommentCount(data.commentCount);
            } else {
                showAlert(data.message, 'danger');
            }
        })
        .catch(error => showAlert('Error submitting comment. Please try again.', 'danger'));
    });

    // Function to update the comment count
    function updateCommentCount(count) {
        var commentCountElement = document.querySelector('.comment-count .count');
        if (commentCountElement) {
            commentCountElement.textContent = count; // Update the count dynamically
        }
    }

    // Function to show Bootstrap alert
    function showAlert(message, type) {
        var alertContainer = document.getElementById('alertContainer');
        var alertDiv = document.createElement('div');
        alertDiv.classList.add('alert', `alert-${type}`, 'alert-dismissible', 'fade', 'show');
        alertDiv.setAttribute('role', 'alert');
        alertDiv.innerHTML = `
            <strong>${type === 'success' ? 'Success!' : type === 'danger' ? 'Error!' : 'Notice!'}</strong> ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;
        alertContainer.appendChild(alertDiv);
    }

    // Function to Fetch Comments on Page Load or on Load More
    function fetchComments(offset = 0) {
        var postId = document.getElementById('postId')?.value;
        if (!postId) return; // If there's no post_id, do nothing

        fetch(`../submit_comment.php?action=fetch_comments&post_id=${postId}&offset=${offset}`)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                var commentsSection = document.getElementById('commentsSection');
                
                // Append the comments dynamically
                data.comments.forEach(function(comment) {
                    var commentElement = document.createElement('div');
                    commentElement.classList.add('comment');
                    commentElement.innerHTML = `
                        <div class="comment-header">
                            <p class="name">${comment.author}</p>
                            <p class="date">${comment.createdAt}</p>
                        </div>
                        <p class="message">${comment.content}</p>
                    `;
                    commentsSection.appendChild(commentElement);
                });

                // Check if more comments are available
                var loadMoreButton = document.getElementById('loadMoreButton');
                if (data.loadedCount < data.commentCount) {
                    loadMoreButton.style.display = 'block';
                    loadMoreButton.setAttribute('data-offset', offset + 5); // Set next offset
                } else {
                    loadMoreButton.style.display = 'none'; // Hide "Load More" button if all comments are loaded
                }

                // Update the comment count dynamically on page load
                updateCommentCount(data.commentCount);
            } else {
                showAlert('No comments available', 'warning');
            }
        })
        .catch(error => showAlert('Error fetching comments.', 'danger'));
    }

    // Load more comments when the "Load More" button is clicked
    document.getElementById('loadMoreButton')?.addEventListener('click', function() {
        var offset = parseInt(this.getAttribute('data-offset'));
        fetchComments(offset);
    });

    // Fetch the first 5 comments when the page loads
    fetchComments(0);
});
