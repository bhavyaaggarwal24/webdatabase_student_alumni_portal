<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
// Check if the user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Retrieve the username from the session
    $username = isset($_SESSION['uname']) ? $_SESSION['uname'] : 'Guest';
} else {
    // If not logged in, redirect to the login page
    header('Location: login.html');
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Student Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        main {
            padding: 20px;
            background-color: #fff;
            margin: 20px auto;
            width: 80%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        section {
            margin-bottom: 20px;
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 98%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background-color: #5cb85c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #4cae4c;
        }

        .post {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 0px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .profile {
            position: absolute;
            top: 10px;
            right: 103px;
            text-decoration: none;
            color: #fff;
            background-color: #007BFF;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .signup-link {
            position: absolute;
            top: 10px;
            right: 10px;
            text-decoration: none;
            color: #fff;
            background-color: #007BFF;
            padding: 10px 15px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="student_posting_page.php">Home</a></li>
                <li><a href="alumnidirectory.php">Alumni Directory</a></li>
                <li><a href="posts.php">Post</a></li>
                <li><a href="studentprofile.php">Profile</a></li>
                <li><a href="signout.php">Sign Out</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Welcome <?php echo $username ?> to the Student/Alumni Portal</h2>
            <p>Stay connected with your Alumni and fellow students.</p>
        </section>

        <section>
            <h2>Create a Post</h2>
            <form id="post-form">

                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>

                <label for="content">Content:</label>
                <textarea id="content" name="content" required></textarea>

                <button type="submit">Post</button>
            </form>
        </section>

        <section>
            <h2>Recent Posts</h2>
            <div id="post-list"></div>
        </section>
    </main>

    <footer>
        <p>&copy; Alumni Portal</p>
    </footer>

    <script>
        // JavaScript code to handle post submissions and display recent posts
        document.addEventListener('DOMContentLoaded', function() {
            const postForm = document.getElementById('post-form');
            const postList = document.getElementById('post-list');
            function fetchPosts() {
                fetch('fetchpost.php')
                    .then(response => response.json())
                    .then(posts => {
                        postList.innerHTML = ''; // Clear the existing posts
                        posts.forEach(post => {
                            const postElement = document.createElement('div');
                            postElement.classList.add('post');
                            postElement.innerHTML = `
                                <h3>${post.author_firstname} ${post.author_lastname}(${post.post_usertype})</h3>
                                <h5>${post.title}</h5>
                                <p>${post.content}</p>
                                ${post.replies.length > 0 ?
                                `<div class="replies">
                                <main>
                                <section>
                                <h5>Replies:</h5>
                                ${post.replies.map(reply => `<p><strong>${reply.reply_fname} ${reply.reply_lname}(${reply.usertype}):</strong> ${reply.reply_content}</p>`).join('')}
                                </section>
                                </main>
                                </div>`
                                : '' }
                                <form class="reply-form">
                                    <label for="reply-${post.id}">Reply:</label>
                                    <textarea id="reply-${post.id}" name="reply" required></textarea>
                                    <button type="submit">Reply</button>
                                </form>
                            `;
                            postList.appendChild(postElement);

                            // Add event listener for reply form submission
                            const replyForm = postElement.querySelector('.reply-form');
                            
                            replyForm.addEventListener('submit', function(e) {
                                e.preventDefault();
                                const replyContent = replyForm.querySelector(`#reply-${post.id}`).value;
                                const postid = replyForm.querySelector(`#reply-${post.id}`).value;
                                //console.log(`post_id=${post.id}&replycontent=${encodeURIComponent(replyContent)}`);
                                fetch('create_reply.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/x-www-form-urlencoded',
                                    },
                                    body: `post_id=${post.id}&replycontent=${encodeURIComponent(replyContent)}`,
                                })
                                .then(response => response.text())
                                .then(() => {
                                    // After replying, fetch and display the updated posts
                                    fetchPosts();
                                    // Clear the reply form
                                    replyForm.reset();
                                })
                                .catch(error => console.error('Error creating reply:', error));
                            });
                        });
                    })
                    .catch(error => console.error('Error fetching posts:', error));
            }

            // Initial fetch of posts when the page loads
            fetchPosts();

            postForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const title = document.getElementById('title').value;
                const content = document.getElementById('content').value;

                fetch('create_post.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `title=${encodeURIComponent(title)}&content=${encodeURIComponent(content)}`,
                })
                .then(response => response.text())
                .then(() => {
                    // After posting, fetch and display the updated posts
                    fetchPosts();
                    // Clear the form
                    postForm.reset();
                })
                .catch(error => console.error('Error creating post:', error));
            });
        });
    </script>
</body>

</html>